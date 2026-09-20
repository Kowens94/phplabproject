<?php
    // Base-64 encoded images array
    $images = array();
    // Path (absolute) to directory containing images
    $image_directory = realpath('./images');
    // Filter out image types
    $allowedTypes = ['jpg', 'png', 'gif', 'svg'];

    // Read the image directory --> file and directory name(s)
    $directory_listing = scandir($image_directory);
    foreach($directory_listing as $file) {
        // Absolute path to file
        $file_path = $image_directory . DIRECTORY_SEPARATOR . $file;
        // Skip item if it is not a file, i.e., directory
        if(!is_file($file_path))
            continue;
        // Skip file if it is not an image that is allowed
        $extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        if(!in_array($extension, $allowedTypes))
            continue;
        // Get file name
        $filename = pathinfo($file, PATHINFO_FILENAME);
        // Get the MIME type of the image --needed to construct the data:string
        $mime_type = mime_content_type($file_path);
        // Read the image content from the directory
        $file_content = file_get_contents($file_path);
        // Encode the file content to BASE 64 string
        $base64 = base64_encode($file_content);
        // Construct data-string necessary for image src property
        $data_url = "data:$mime_type;base64,$base64";
        // Add image to response array
        $images[] = [$filename, $data_url, $mime_type];
    }
?>