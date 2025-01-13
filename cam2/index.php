<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEAPOTS Instrumentation Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
    font-size: 16px; /* Adjust the size as needed */
}

        #header {
            background-color: #333;
            color: #fff;
            padding: 1px;
            text-align: left;
        }
        #menu {
            width: 100px;
            background-color: #f0f0f0;
            float: left;
            height: 100%;
            padding: 20px;
        }
        #content {
            padding: 20px;
            margin-left: 20px;
        }


        #controls {
            padding: 20px;
            margin-left: 100px;
        }

        .menu-item {
            margin-bottom: 10px;
        }
        .menu-item a {
            text-decoration: none;
            color: #333;
        }
        .menu-item a:hover {
            color: #000;
        }

   
        #image-links {
    background-color: #f9f9f9; /* Light gray background */
    padding: 20px; /* Add some padding around the content */
    border-radius: 8px; /* Add rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
}

#image-links h3 {
    margin-top: 0; /* Remove default margin */
    font-size: 1.5rem; /* Larger font size for heading */
    color: #333; /* Dark text color */
}

#image-links ul {
    list-style-type: none; /* Remove default bullet points */
    padding: 0; /* Remove default padding */
}

#image-links li {
    margin-bottom: 10px; /* Add some spacing between list items */
}

#image-links a {
    text-decoration: none; /* Remove underline from links */
    color: #007bff; /* Blue link color */
    transition: color 0.3s; /* Smooth transition for link color change */
}

#image-links a:hover {
    color: #0056b3; /* Darker blue on hover */
}

#controls {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    #controls label {
        margin-bottom: 5px;
    }

    #controls input[type="number"] {
        padding: 8px;
        margin-bottom: 2px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 150px;
        box-sizing: border-box;
    }

    #controls button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        max-width: 180px; /* Limit the maximum width */
    }

    #controls button:hover {
        background-color: #0056b3;
    }

    </style>
</head>
<body>
    <div id="header">
        <h1>TEAPOTS Instrumentation Page</h1>
    </div>
    <div id="menu">
        <div class="menu-item"><a href="#">Home</a></div>
        <div class="menu-item"><a href="#">Contact</a></div>
        <div class="menu-item"><a href="#">Instrumentation</a></div>
    </div>

    <div id="content">

     
    <p> Instrumentation tests... cam t h sensors wifi</p>
    
        <div>
        <img src="img/temp.jpg?<?php echo uniqid(); ?>" alt="Temporary Image" style="width:1000px; height:auto;" id="resultImage">

        </div>
    
        <div id="controls">
    <label for="exposure">Exposure (less than 1500us):</label>
    <input type="number" id="exposure" value="25">
    <label for="gain">Gain(less than 3000?):</label>
    <input type="number" id="gain" value="20">
    <button id="changeButton" onclick="sendValues('change')">Change exp/gain</button>
    <br>
    <button id="shootButton" onclick="sendValues('shoot')">Shoot</button>
</div>



 <?php include "images.php"; ?>
        
        
    </div>



    <script>

            // Function to refresh the image
    function refreshImage() {
        var img = document.getElementById("resultImage");
        // Refresh the image by adding a random query parameter
        img.src = img.src + '?<?php echo uniqid(); ?>';
    }

     // Function to send exposure and gain values
     function sendValues(action) {
        var exposure = document.getElementById("exposure").value;
        var gain = document.getElementById("gain").value;
        var shoot=false;
        if (action=='shoot') shoot=true;

        
        // Example AJAX request to send exposure and gain values to server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("execute2.php?shoot="+shoot+"&exposure=" + exposure + "&gain=" + gain);
                setTimeout(refreshImage, 10000);


            } else {
               // console.error("Error sending exposure and gain values.");
            }
        };
        // Use GET request to send parameters in URL
        xhttp.open("GET", "execute2.php?shoot="+shoot+"&exposure=" + exposure + "&gain=" + gain, true);
        xhttp.send();
    }

</script>


</body>
</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

 // File path for the IP log file
$logFilePath = __DIR__ . '/ips/iplog.txt';


// Get the current timestamp
$timestamp = date('Y-m-d H:i:s');


$visitorIP = $_SERVER['REMOTE_ADDR'];

// Format the log entry with timestamp and IP address-
$logEntry = "$timestamp - $visitorIP\n";

// Append the visitor's IP address to the log file
file_put_contents($logFilePath,  $logEntry, FILE_APPEND);   

//echo "<p> all ok? <p>";

?>
