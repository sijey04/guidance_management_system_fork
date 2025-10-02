<?php

return [
    /*
    |--------------------------------------------------------------------------
    | File Upload Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure the file upload limits for your application.
    | These values should match or be lower than your PHP configuration.
    |
    */

    'max_file_size' => env('UPLOAD_MAX_FILE_SIZE', 10240), // 10MB in KB (10 * 1024)
    
    'image_max_size' => env('UPLOAD_IMAGE_MAX_SIZE', 10240), // 10MB in KB
    
    'allowed_image_mimes' => ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp'],
    
    'allowed_document_mimes' => ['pdf', 'doc', 'docx', 'txt'],
    
    'max_files_count' => env('UPLOAD_MAX_FILES', 20),
];