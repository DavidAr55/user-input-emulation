#include <iostream>

using namespace std;

int main() {
    int i = 0;

    while (true)
    {
        cout << "Count: " << i << endl;
        i++;  // This line will cause a runtime error
    }
    
    return 0;
} 