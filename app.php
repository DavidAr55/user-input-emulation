<?php
// Array of inputs
$inputs = ["Hector", 23, 171.32, "H", "I am a guy", 80, "+52 33 0000 1111"];

// Programming language extension
$extension = "cpp";
# $extension = "py";

// Convert inputs to a string that simulates standard input (stdin)
$input_string = implode("\n", $inputs);

// Command to execute the program
$command = __DIR__ . "/src/$extension/run_time_error_test";

// Process descriptors to handle stdin, stdout, and stderr
$descriptorspec = array(
    0 => array("pipe", "r"),  // stdin
    1 => array("pipe", "w"),  // stdout
    2 => array("pipe", "w")   // stderr
);

// Open the process
$process = proc_open($command, $descriptorspec, $pipes);

// Set a maximum time limit (in seconds)
$timeout = 5; // Limiting execution to 5 seconds

if (is_resource($process)) {
    // Write the inputs to the process's stdin
    fwrite($pipes[0], $input_string);
    fclose($pipes[0]); // Close the input after writing the data

    // Poll the process for output, applying the timeout
    $start = time();
    $output = '';
    $error = '';

    do {
        $status = proc_get_status($process);
        if (!$status['running']) {
            // Process has finished, read the output and error streams
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            $error = stream_get_contents($pipes[2]);
            fclose($pipes[2]);

            break;
        }

        // Check if timeout has been exceeded
        if ((time() - $start) > $timeout) {
            // Timeout exceeded, terminate the process
            proc_terminate($process);
            $output = "Error: Execution time exceeded the allowed limit of $timeout seconds.";
            break;
        }

        usleep(100000); // Sleep for 100ms before checking again

    } while (true);

    // Close the process
    proc_close($process);

    // Display the output and any errors (if any)
    echo $output;
    if (!empty($error)) {
        echo "Error: " . $error;
    }
}
?>
