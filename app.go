package main

import (
	"bytes"
	"fmt"
	"log"
	"os/exec"
	"strings"
)

func main() {
	// Define the programming language extension
	extension := "cpp"
	// extension := "py"

	// Inputs simulating what you would pass in PHP
	inputs := []string{"Hector", "23", "171.32", "H", "I am a guy", "80", "+52 33 0000 1111"}

	// Convert the inputs into a string that simulates standard input
	inputString := strings.Join(inputs, "\n")

	// Create the command to execute the compiled C++ program (main.exe)
	cmd := exec.Command(fmt.Sprintf("./src/%s/program", extension))

	// Redirect stdin, stdout, and stderr
	var stdout, stderr bytes.Buffer
	cmd.Stdout = &stdout // Capture standard output
	cmd.Stderr = &stderr // Capture errors

	// Redirect standard input to simulate user data
	stdinPipe, err := cmd.StdinPipe()
	if err != nil {
		log.Fatal(err)
	}

	// Start the command
	if err := cmd.Start(); err != nil {
		log.Fatal(err)
	}

	// Write the simulated inputs to the program's standard input
	stdinPipe.Write([]byte(inputString))
	stdinPipe.Close()

	// Wait for the command to finish
	if err := cmd.Wait(); err != nil {
		log.Fatalf("Error during execution: %s", err)
	}

	// Print the program's standard output
	fmt.Printf("Output: %s\n", stdout.String())

	// Print any errors from the program, if any
	if stderr.Len() > 0 {
		fmt.Printf("Errors: %s\n", stderr.String())
	}
}
