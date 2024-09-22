# User Input Emulation

This repository contains scripts for emulating user input in C++ and Python programs. The scripts allow you to run programs on a server while simulating standard input, making it easier to test and execute code without manual input.

## Purpose of the Project

The main goal of this project is to enable the execution of C++ and Python programs that require user input, without the need for manual entry. This is particularly useful for testing and development environments where automation is key. Currently, I am developing an application to compile code in real time on my server, and this input emulation approach has been crucial for its success.

## Example Usage

### app.php

Here’s an example of how `app.php` works, simulating user input for a Python program:

```php
<?php
$inputs = ["Hector", 23, 171.32, "H", "I am a guy", 80, "+52 33 0000 1111"];
$extension = "cpp";

$input_string = implode("\n", $inputs);
$command = __DIR__ . "/src/$extension/run_time_error_test";

$descriptorspec = array(
    0 => array("pipe", "r"),  // stdin
    1 => array("pipe", "w"),  // stdout
    2 => array("pipe", "w")   // stderr
);

$process = proc_open($command, $descriptorspec, $pipes);
$timeout = 5;

if (is_resource($process)) {
    fwrite($pipes[0], $input_string);
    fclose($pipes[0]);

    $start = time();
    $output = '';
    $error = '';

    do {
        $status = proc_get_status($process);
        if (!$status['running']) {
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            $error = stream_get_contents($pipes[2]);
            fclose($pipes[2]);
            break;
        }

        if ((time() - $start) > $timeout) {
            proc_terminate($process);
            $output = "Error: Execution time exceeded the allowed limit of $timeout seconds.";
            break;
        }

        usleep(100000);

    } while (true);

    proc_close($process);

    echo $output;
    if (!empty($error)) {
        echo "Error: " . $error;
    }
}
?>
```

### Input Simulation

The input data used in the examples is:

```plaintext
Hector
23
171.32
H
I am a guy
80
+52 33 0000 1111
```

### Example Python Program

The `program.py` captures the same inputs:

```python
if __name__ == "__main__":
    # Person's attributes
    name = input("Enter your full name: ")
    age = int(input("Enter your age: "))
    height = float(input("Enter your height (in meters): "))
    initial = input("Enter the initial of your name: ")[0]
    comment = input("Enter a comment: ")
    weight = float(input("Enter your weight (in kg): "))
    phone = input("Enter your phone number: ")

    # Display the captured data
    print("\n--- Person's Data (Python) ---")
    print(f"Name: {name}")
    print(f"Age: {age}")
    print(f"Height: {height} meters")
    print(f"Initial of the name: {initial}")
    print(f"Comment: {comment}")
    print(f"Weight: {weight} kg")
    print(f"Phone: {phone}")
```

### Output expected

```plaintext
Enter your full name: Enter your age: Enter your height (in meters): Enter the initial of your name: Enter a comment: Enter your weight (in kg): Enter your phone number: 
--- Person's Data (Python) ---
Name: Hector
Age: 23
Height: 171.32 meters
Initial of the name: H
Comment: I am a guy
Weight: 80.0 kg
Phone: +52 33 0000 1111
```

## Included Examples

This repository includes examples in different languages:

1. **app.go** - A Go application that runs a C++ or Python program with simulated user inputs.
2. **app.js** - A Node.js application for executing the program with simulated inputs.
3. **app.php** - A PHP script that performs the same task.
4. **app.py** - A Python script for executing the C++ or Python program with predefined inputs.

## Usage

To run the examples, follow these steps:

1. **Clone the Repository**
   ```bash
   git clone https://github.com/DavidAr55/user-input-emulation.git
   cd user-input-emulation
   ```

2. **Build the C++ Program**
   For example, if you are using the C++ program, compile it using:
   ```bash
   g++ -o src/cpp/program src/cpp/program.cpp
   ```

3. **Run the Scripts**
   Depending on the language you want to execute, run one of the following commands:

   - **Go**
     ```bash
     go run app.go
     ```

   - **Node.js**
     ```bash
     node app.js
     ```

   - **PHP**
     ```bash
     php app.php
     ```

   - **Python**
     ```bash
     python app.py
     ```

## Conclusion

This project serves as a helpful tool for emulating user input in C++ and Python applications. It simplifies testing and allows for quick execution of programs without manual input.

For any questions or contributions, feel free to open an issue or submit a pull request!