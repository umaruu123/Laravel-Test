# Laravel User Management System

This project is a User Management System built with Laravel and MySQL. It includes basic CRUD operations for user management and a RESTful API that allows for the creation, reading, updating, and deletion of users.

## Project Setup

Follow these steps to set up the project on your local machine:

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL
- Laravel (latest stable version)

### Step 1: Clone the repository

```bash
git clone https://github.com/umaruu123/Laravel-Test.git
cd Laravel-Test


Step 2: Install dependencies
Run the following command to install the required dependencies:

bash
Copy
Edit
composer install
Step 3: Set up the environment
Copy the .env.example file to .env and configure your database connection:


Update the .env file with your database credentials:

ini
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password


Step 6: Run the application
Start the Laravel development server:

bash
Copy
Edit
php artisan serve
Visit http://127.0.0.1:8000 to access the application.

API Endpoints
The following API endpoints are available for interacting with users:

1. Create User
Endpoint: POST /api/users
Data: { "name": "John Doe", "email": "johndoe@example.com", "phone_number": "1234567890", "password": "secret", "status": "active" }

2. Get User List
Endpoint: GET /api/users
Query Params:

status (optional)

page (optional, for pagination)

3. Get User Detail
Endpoint: GET /api/users/{id}
Response: { "id": 1, "name": "John Doe", "email": "johndoe@example.com", "phone_number": "1234567890", "status": "active" }

4. Update User
Endpoint: PUT /api/users/{id}
Data: { "email": "newemail@example.com", "phone_number": "0987654321" }

5. Delete User
Endpoint: DELETE /api/users/{id}

6. Bulk Delete Users
Endpoint: DELETE /api/users/bulk-delete
Data: { "ids": [1, 2, 3] }

Testing
Run Tests
You can run the tests using the following command:

bash
Copy
Edit
php artisan test
This will run all the feature and unit tests, including the basic CRUD operations and user management functionality.

Known Issues
API documentation (Swagger) is not fully functional due to a bug.

Some advanced features like Excel export are not yet implemented.

Future Improvements
Complete the API documentation using Swagger.

Implement Excel export functionality for user data.

Add more advanced validation using Laravel Form Requests.
