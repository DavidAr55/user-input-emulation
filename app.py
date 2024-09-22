import subprocess
import os
import time

# Array of inputs
inputs = ["Hector", 23, 171.32, "H", "I am a guy", 80, "+52 33 0000 1111"]

# Programming language extension
extension = 'cpp'  # Cambiar a 'py' si es necesario

# Convert inputs to a string that simulates standard input (stdin)
input_string = "\n".join(map(str, inputs))

# Command to execute the program
command = os.path.join(os.path.dirname(__file__), 'src', extension, 'program')

# Set a maximum time limit (in seconds)
timeout = 5  # Limitar la ejecución a 5 segundos

# Start the process
process = subprocess.Popen(
    command,
    stdin=subprocess.PIPE,
    stdout=subprocess.PIPE,
    stderr=subprocess.PIPE,
    text=True
)

# Write the inputs to the process's stdin
try:
    output, error = process.communicate(input=input_string, timeout=timeout)
except subprocess.TimeoutExpired:
    process.terminate()
    output = "Error: Execution time exceeded the allowed limit of {} seconds.".format(timeout)
    error = ''
else:
    if error:
        error = "Error: " + error

# Display the output and any errors (if any)
print(output)
if error:
    print(error)
