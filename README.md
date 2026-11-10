Educational Platform | LMS Backend

A Learning Management System (LMS) backend built with Laravel 12 and PHP 8.2.

The platform is designed to organize educational content, manage users with different access levels, and provide a structured backend architecture with a focus on maintainability, security, and scalability.

---

 Tech Stack

- Language: PHP 8.2
- Framework: Laravel 12
- Database: MySQL
- Authentication: Laravel Multi-Guard Authentication
- Authorization: Laravel Policies
- Validation: Laravel Form Requests
- Architecture: Service Layer Architecture

---

Educational Structure

The platform organizes educational content through a hierarchical structure:

Academic Years
      │
      ▼
   Subjects
      │
      ▼
    Courses
      │
      ▼
    Lessons

---

Authentication & Authorization

The application implements Multi-Guard Authentication to manage different user types and control access to platform resources.

Guard| User Type| Permissions
"web"| Student| View educational content
"teacher"| Teacher| Manage own courses and lessons
"manager"| Manager| Manage teachers and oversee the platform

Laravel Policies are used to handle authorization and ensure that users can only access and manage resources according to their permissions.

---

Backend Architecture

The project follows a structured approach to separate responsibilities and keep the code organized and maintainable.

Component| Responsibility
Models| Represent database entities and relationships
Migrations| Define and manage database structure
Controllers| Handle incoming requests and responses
Services| Handle business logic and application operations
Form Requests| Handle request validation
Policies| Control authorization and access permissions
Traits| Provide reusable methods for handling file operations, including uploading and storing images and videos

---

Implemented Features

- Multi-Guard Authentication.
- Access control for students, teachers, and managers.
- Policy-based authorization.
- Educational content organization.
- Course and lesson management.
- Teacher management by managers.
- Form Request validation.
- Service-based business logic.
- Database management using Laravel Migrations and Eloquent Models.
- Reusable file handling functionality through Traits, with separate methods for uploading and storing images and videos.

---

Getting Started

1. Clone the Repository

git clone YOUR_REPOSITORY_URL
cd educational-platform

2. Install Dependencies

composer install

3. Configure Environment

cp .env.example .env

Update your database configuration in the ".env" file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

4. Generate Application Key

php artisan key:generate

5. Run Database Migrations

php artisan migrate

6. Create Initial Manager Account

php artisan db:seed --class=ManagerSeeder

7. Link Storage

php artisan storage:link

8. Start Development Server

php artisan serve

The application will be available at:

"http://127.0.0.1:8000"

---

Initial Manager Account

The "ManagerSeeder" creates an initial manager account:

- Email: "manager@example.com"

Important: Change the initial account password after the first login through the profile page.

---

Future Improvements

The following features are planned for future development:

- Repository Pattern: Introduce the Repository Pattern to organize data access and improve separation of concerns.
- RESTful APIs: Develop REST APIs to allow external applications and frontend clients to communicate with the platform.
- Dashboard Statistics: Add dynamic statistics to help managers monitor platform activities.
- Notification System: Implement notifications for important platform activities.
- Advanced Reporting: Add reports to track educational content and platform performance.

These features are planned and have not been implemented yet.

---

Developer

Nourhan Habib

Backend Developer | PHP & Laravel
