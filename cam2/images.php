<div id="image-links">
    <h3>Image Links:</h3>
    <ul>
        <!-- PHP code to add links to images starting with out*.jpg -->
        <?php
        // Directory where the images are located
        $directory = './img';
        
        // Get all files in the directory
        $files = scandir($directory);
        
        // Filter files that start with "out" and end with ".jpg"
        $filteredFiles = array_filter($files, function($file) {
            return strpos($file, 'out') === 0 && substr($file, -4) === '.jpg';
        });
        
        // Sort files in inverse alphabetical order
        rsort($filteredFiles);
        
        // Loop through each file and generate HTML code for the image link
        foreach ($filteredFiles as $file) {
            echo '<li><a href="img/' . $file . '" target="_blank">' . $file . '</a></li>';
        }
        ?>
    </ul>
</div>