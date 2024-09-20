# User Input Emulation

This repository contains scripts for emulating user input in C++ and Python programs. The scripts allow you to run programs on a server while simulating standard input, making it easier to test or execute code without manual input.

## Overview

The primary purpose of this project is to demonstrate how to execute C++ and Python programs with predefined inputs. It includes example applications that simulate user interaction by providing inputs programmatically.

## Examples

The repository includes the following example applications:

1. **app.go** - A Go application that runs a C++ or Python program with simulated user inputs.
2. **app.js** - A Node.js application for executing the program with simulated inputs.
3. **app.php** - A PHP script that performs the same task.
4. **app.py** - A Python script for executing the C++ or Python program with predefined inputs.

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

### Programs to Execute

The following programs can be executed with the above inputs:

#### `program.cpp`

A simple C++ program that captures user data, including name, age, height, initial, comment, weight, and phone number.

```cpp
#include <iostream>
#include <string>
#include <limits>

int main() {
    // ... (code omitted for brevity)
    return 0;
}
```

#### `program.py`

A Python program that captures the same set of user data as the C++ program.

```python
if __name__ == "__main__":
    # ... (code omitted for brevity)
```

## Usage

To run the examples, follow these steps:

1. **Clone the Repository**
   ```bash
   git clone https://github.com/DavidAr55/user-input-emulation.git
   cd user-input-emulation
   ```

2. **Build the C++ Program**
   If you are using the C++ program, compile it using:
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

## Output

Each application will execute the specified program, providing the predefined inputs, and display the output or any errors that occur during execution.

## Conclusion

This project serves as a helpful tool for emulating user input in C++ and Python applications. It simplifies testing and allows for quick execution of programs without manual input.

For any questions or contributions, feel free to open an issue or submit a pull request!