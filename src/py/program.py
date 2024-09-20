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
