const { spawn } = require('child_process');
const path = require('path');

// Array of inputs
const inputs = ["Hector", 23, 171.32, "H", "I am a guy", 80, "+52 33 0000 1111"];

// Programming language extension
const extension = 'cpp';
// const extension = 'py';

// Convert inputs to a string that simulates standard input (stdin)
const inputString = inputs.join('\n');

// Command to execute the program
const command = path.join(__dirname, 'src', extension, 'program');

// Spawn the child process
const child = spawn(command, {
    stdio: ['pipe', 'pipe', 'pipe']
});

// Write the inputs to the process's stdin
child.stdin.write(inputString);
child.stdin.end(); // Close the input after writing the data

// Read the output from the process
let output = '';
child.stdout.on('data', (data) => {
    output += data.toString();
});

// Read any errors from the process (if any)
let error = '';
child.stderr.on('data', (data) => {
    error += data.toString();
});

// Handle the close event
child.on('close', (returnValue) => {
    // Display the output and any errors (if any)
    console.log(output);
    if (error) {
        console.error('Error:', error);
    }
});
