# Tomorrowland — Backend Eindopdracht

This is my backend project for the course **Backend Development** at EHB (Erasmushogeschool Brussel). I chose Tomorrowland as the theme because it's one of the biggest music festivals in the world and I thought it would be a fun topic to work with.

The application is built with **Laravel 13** and includes a public website, user authentication, a profile page, a contact form and a full admin panel.

---

## What's in the project

**Public pages**
- Home page with hero section and highlights
- News overview and detail page
- FAQ page grouped by category
- Contact form (sends an email)

**Authentication**
- Register, login, logout via Laravel Breeze
- Edit profile: name, username, birthday, bio and avatar upload
- Public profile page per user

**Admin panel** (only accessible with admin account)
- Dashboard with stats
- Manage news articles (create, edit, delete + image upload)
- Manage FAQ categories and FAQ items
- View and manage contact messages
- Manage users

---

## Tech stack

- PHP 8.4 / Laravel 13
- Laravel Breeze (Blade + Alpine.js)
- Tailwind CSS v3
- SQLite (database)
- Laravel Mail for contact emails
- Vite for asset bundling

---

## Installation

> Make sure you have PHP 8.2+, Composer and Node.js installed. I used Laravel Herd locally.

```bash
git clone https://github.com/nisrineaourag1-star/backend-eindopdracht.git
cd backend-eindopdracht

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate:fresh --seed
php artisan storage:link

npm run build
php artisan serve
```

The app will be running at `http://localhost:8000`.

---

## Login credentials

After seeding the database you can log in with the admin account:

| Field    | Value            |
|----------|------------------|
| Email    | admin@ehb.be     |
| Password | Password!321     |

Regular users can register via the register page.

---

## Notes

- The `.env` file is not included in the repo for security reasons. Use `.env.example` as a starting point.
- If you want to test the contact form emails, set `MAIL_MAILER=log` in your `.env` and check `storage/logs/laravel.log`.
- Uploaded files (avatars and news images) go to `storage/app/public` — that's why `storage:link` is needed.
- I had some trouble getting the file upload size limit to work correctly with Laravel Herd, but it's handled gracefully with a validation error if the file is too large.

---

## Project structure

```
app/
  Http/
    Controllers/        ← public + admin controllers
    Middleware/         ← IsAdmin middleware
    Requests/           ← form request validation
  Mail/                 ← ContactFormSubmitted mailable
  Models/               ← User, News, Faq, FaqCategory, Category, ContactMessage
database/
  migrations/
  seeders/
resources/
  views/
    admin/              ← all admin panel views
    pages/              ← public pages
    components/         ← navbar, footer
    layouts/            ← app layout + admin layout
routes/
  web.php
  admin.php
```

---

## Student info

- **Student:** Nisrine Aourag
- **School:** Erasmushogeschool Brussel
- **Course:** Backend Development
- **Academic year:** 2025–2026
