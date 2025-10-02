<?php

if (!function_exists('upload_max_size')) {
    /**
     * Get the maximum upload size in KB
     */
    function upload_max_size($type = 'file')
    {
        return config("upload.{$type}_max_size", 2048);
    }
}

if (!function_exists('upload_validation_rule')) {
    /**
     * Get validation rule for file uploads
     */
    function upload_validation_rule($type = 'image', $required = false)
    {
        $rules = [];
        
        if ($required) {
            $rules[] = 'required';
        } else {
            $rules[] = 'nullable';
        }
        
        if ($type === 'image') {
            $rules[] = 'image';
            $mimes = implode(',', config('upload.allowed_image_mimes', ['jpeg', 'png', 'jpg', 'gif']));
            $rules[] = "mimes:{$mimes}";
            $rules[] = 'max:' . config('upload.image_max_size', 2048);
        }
        
        return implode('|', $rules);
    }
}