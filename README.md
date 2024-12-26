# Gym Management System

## Introduction

This project is designed to implement a gym management system using PHP with an object-oriented approach. The system includes member management, activity management, and reservation handling, integrating key principles of object-oriented programming (OOP) and using PDO for database interactions.

## Features

### User Stories

**As a Member:**
- I can create an account to access my personal information and reservations.
- I can view the available activities and check their availability.
- I can book an activity and cancel a reservation if needed.
- I can view a summary of my confirmed or canceled reservations.

**As an Administrator:**
- I can view the list of registered members and their reservations.
- I can confirm or cancel reservations made by members.
- I can add, modify, or delete activities in the system.

### Authentication and Role Management:
- A secure login system with password hashing.
- Role management where members manage their own reservations and administrators oversee all reservations.

## Implementation

### Object-Oriented Design

**Classes:**
- `Member`: Manages member information.
- `Activity`: Manages the activities offered.
- `Reservation`: Manages the reservations made by members.
- `User` (Base Class): A base class to be extended by specific classes such as `Member` and `Administrator`.

**Principles:**
- Private/protected properties to ensure encapsulation.
- Getter and setter methods to access and modify properties.
- Constructors to facilitate object initialization.
- Simple methods to manipulate or display data, such as `displayInformation()` for a member or `calculateAvailability()` for an activity.

**Inheritance:**
- A base class (`User`) that can be extended by specific classes (`Member` and `Administrator`).

**Database Interactions:**
- Using PDO for database interactions integrated directly into the classes.

## Project Structure
- /project-root ├── /php-files │ ├── index.php │ ├── membres.php │ ├── activites.php │ ├── reservations.php ├── /classes │ ├── User.php │ ├── Member.php │ ├── Activity.php │ ├── Reservation.php ├── /config │ ├── database.php ├── README.md


## How to Set Up

1. **Set Up XAMPP:**
   - Download and install XAMPP from [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html).
   - Start Apache and MySQL from the XAMPP Control Panel.

2. **Database Configuration:**
   - Create a database in MySQL for the gym management system.
   - Update the database configuration in `/config/database.php` with your database credentials.

3. **Project Setup:**
   - Place the project files in the `htdocs` directory of your XAMPP installation.
   - Ensure the file structure matches the structure outlined above.

4. **Run the Application:**
   - Open your web browser and navigate to `http://localhost/project-root`.

## Usage

### Member Operations:
- **Register:** Create a new account to access the system.
- **Login:** Secure login to access personal information and manage reservations.
- **View Activities:** Browse available activities and check their availability.
- **Make Reservation:** Book an activity.
- **Cancel Reservation:** Cancel an existing reservation.
- **View Reservations:** See a summary of confirmed or canceled reservations.

### Administrator Operations:
- **Manage Members:** View the list of registered members and their reservations.
- **Manage Reservations:** Confirm or cancel reservations made by members.
- **Manage Activities:** Add, modify, or delete activities in the system.

## Security
- Passwords are hashed to ensure secure storage.
- Role-based access control to ensure appropriate access for members and administrators.

## Future Enhancements
- Extend the role management system to include more roles.
- Improve the user interface with modern front-end technologies.
- Implement more advanced features such as activity recommendations based on user preferences.

## Contributing
- Contributions are welcome. Please fork the repository and submit a pull request.

## License
- This project is licensed under the MIT License.

---

For more details, refer to the project documentation in the `/docs` directory.
