<?php
// Check if file is uploaded
if(isset($_FILES["image"]["name"]) && $_FILES["image"]["error"] == 0) {

    $target_dir = "./";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    
    // If everything is ok, try to upload file
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        chmod($target_file, 0644); // Set permissions to 0644 (read/write for owner, read for others)

        copy($target_file, $target_dir .'temp.jpg');


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "No file uploaded or an error occurred during upload.";
}

?>