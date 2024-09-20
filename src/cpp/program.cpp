#include <iostream> // For cout and cin
#include <string>   // For getline and string
#include <limits>   // For cin.ignore()

int main() {
    // Person's attributes
    std::string name;    // Captured with getline
    int age;             // Captured with cin
    float height;        // Captured with cin
    char initial;        // Captured with cin.get()
    std::string comment; // Captured with getline
    double weight;       // Captured with cin
    std::string phone;   // Captured with getline

    // Method 1: getline() - Capture full name
    std::cout << "Enter your full name: ";
    std::getline(std::cin, name);

    // Method 2: cin - Capture age
    std::cout << "Enter your age: ";
    std::cin >> age;

    // Method 3: scanf() - Capture height
    std::cout << "Enter your height (in meters): ";
    scanf("%f", &height);

    // Clear the buffer before using cin.get() or getline()
    std::cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n');

    // Method 4: cin.get() - Capture initial of name
    std::cout << "Enter the initial of your name: ";
    std::cin.get(initial);

    // Clear the buffer before using getline()
    std::cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n');

    // Method 5: getline() - Capture a comment
    std::cout << "Enter a comment: ";
    std::getline(std::cin, comment);

    // Method 6: cin - Capture weight
    std::cout << "Enter your weight (in kg): ";
    std::cin >> weight;

    // Clear the buffer before using getline()
    std::cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n');

    // Method 7: getline() - Capture phone number
    std::cout << "Enter your phone number: ";
    std::getline(std::cin, phone);

    // Display the captured data
    std::cout << "\n--- Person's Data (C++) ---\n";
    std::cout << "Name: " << name << "\n";
    std::cout << "Age: " << age << "\n";
    std::cout << "Height: " << height << " meters\n";
    std::cout << "Initial of the name: " << initial << "\n";
    std::cout << "Comment: " << comment << "\n";
    std::cout << "Weight: " << weight << " kg\n";
    std::cout << "Phone: " << phone << "\n";

    return 0;
}
