<?php
// Path to your bash script
if(isset($_GET['exposure']) && isset($_GET['gain']) && isset($_GET['shoot'])  ) {
    // Get exposure and gain values from URL parameters
    $shoot = $_GET['shoot'];
    $exposure = $_GET['exposure'];
    $gain = $_GET['gain'];

    // Shell script command with exposure and gain as arguments

    $command = "mosquitto_pub -h 176.61.148.59 -p 8885 -u tegiot -P ULN3AHF46ccutHgc -t \"smartteg/dummy2\" -m \"shoot: $shoot, exposure: $exposure, gain: $gain\"";

    // Execute the command
    $output = shell_exec($command);

    // Output the result
    echo $output;
} else {
    // If exposure and gain parameters are not set
    echo "Exposure and/or gain parameters missing.";
}

 
?>
