import subprocess
import os

# Array of inputs
inputs = ["David", 22, 190.5, "D", "This is a comment", 90, "+52 33 3947 2308"]

# Programming language extension
extension = 'py'  # Change to 'cpp' if needed

# Convert inputs to a string that simulates standard input (stdin)
input_string = "\n".join(map(str, inputs))

# Command to execute the program
command = os.path.join(os.path.dirname(__file__), 'src', extension, 'program')

# Open the process
process = subprocess.Popen(
    command,
    stdin=subprocess.PIPE,
    stdout=subprocess.PIPE,
    stderr=subprocess.PIPE,
    text=True
)

# Write the inputs to the process's stdin
output, error = process.communicate(input=input_string)

# Display the output and any errors (if any)
print(output)
if error:
    print("Error:", error)
