# Educational Platform

An educational platform built with Laravel 12 and PHP 8.2.

## Educational Structure

Academic Years → Subjects → Courses → Lessons

## Roles (Multi-guard Auth)

| Guard | User | Permissions |
|-------|------|-------------|
| `web` | Student | Views content |
| `teacher` | Teacher | Manages own courses and lessons |
| `manager` | Manager | Adds teachers and manages everything |

## Architecture

- **Controllers**: thin, only receive requests and return responses
- **Services**: hold the business logic
- **Form Requests**: handle validation
- **Policies**: handle authorization
- **Traits**: handle file uploads (images)

## Getting Started

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=ManagerSeeder
php artisan storage:link
php artisan serve
```

## First Manager

The seeder creates an initial manager account (`manager@example.com`). Change the password after the first login from the profile page.
