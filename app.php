<?php
// Array of inputs
$inputs = ["Hector", 23, 171.32, "H", "I am a guy", 80, "+52 33 0000 1111"];

// Programming language extension
$extension = "cpp";
# $extension = "py";

// Convert inputs to a string that simulates standard input (stdin)
$input_string = implode("\n", $inputs);

// Command to execute the program
$command = __DIR__ . "/src/$extension/program";

// Process descriptors to handle stdin, stdout, and stderr
$descriptorspec = array(
    0 => array("pipe", "r"),  // stdin
    1 => array("pipe", "w"),  // stdout
    2 => array("pipe", "w")   // stderr
);

// Open the process
$process = proc_open($command, $descriptorspec, $pipes);

if (is_resource($process)) {
    // Write the inputs to the process's stdin
    fwrite($pipes[0], $input_string);
    fclose($pipes[0]); // Close the input after writing the data

    // Read the output from the process
    $output = stream_get_contents($pipes[1]);
    fclose($pipes[1]);

    // Read any errors from the process (if any)
    $error = stream_get_contents($pipes[2]);
    fclose($pipes[2]);

    // Close the process
    $return_value = proc_close($process);

    // Display the output and any errors (if any)
    echo $output;
    if (!empty($error)) {
        echo "Error: " . $error;
    }
}
?>
