<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\StudentProfile;
use App\Models\StudentTransition;
use App\Models\Semester;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $activeSemester = Semester::where('is_current', true)->first();

        if (!$activeSemester) {
            session()->flash('error', 'No active semester set.');
            return;
        }

        DB::beginTransaction();
        try {
            foreach ($rows as $row) {
                // Ensure required fields are present
                if (empty($row['student_id']) || empty($row['first_name']) || empty($row['last_name'])) {
                    continue;
                }

                // Create or update student
                $student = Student::updateOrCreate(
                    ['student_id' => $row['student_id']],
                    [
                        'first_name' => $row['first_name'],
                        'middle_name' => $row['middle_name'] ?? null,
                        'last_name' => $row['last_name'],
                        'suffix' => $row['suffix'] ?? null,
                        'birthday' => $row['birthday'] ?? null,
                        'gender' => $row['gender'] ?? null,
                        'home_address' => $row['home_address'] ?? null,
                        'student_contact' => $row['student_contact'] ?? null,
                        'parent_guardian_name' => $row['parent_guardian_name'] ?? null,
                        'parent_guardian_contact' => $row['parent_guardian_contact'] ?? null,
                        'is_enrolled' => true,
                    ]
                );

                // Create or update profile
                StudentProfile::updateOrCreate(
                    [
                        'student_id' => $student->id,
                        'semester_id' => $activeSemester->id,
                    ],
                    [
                        'course' => $row['course'] ?? null,
                        'year_level' => $row['year_level'] ?? null,
                        'section' => $row['section'] ?? null,
                    ]
                );

                // Optional: Create student transition
                if (!empty($row['transition_type'])) {
                    StudentTransition::create([
                        'student_id' => $student->id,
                        'semester_id' => $activeSemester->id,
                        'transition_type' => $row['transition_type'],
                        'remark' => $row['transition_remark'] ?? null,
                        'transition_date' => now(),
                        'first_name' => $student->first_name,
                        'last_name' => $student->last_name,
                    ]);
                }
            }

            DB::commit();
            session()->flash('success', 'Students imported successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Import failed: ' . $e->getMessage());
        }
    }
}
