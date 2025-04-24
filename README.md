# 📚 Book Review

A full-featured book review platform built with Laravel and Tailwind CSS.

## 📝 Overview

This application allows users to:

- Browse a curated collection of books.
- Submit reviews and ratings for books.
- View average ratings and community feedback.
- Manage book entries (add, edit, delete).

## 🚀 Features

- **Review System**: Users can add, edit, and delete their reviews.
- **Rating Aggregation**: Displays average ratings for each book.
- **Responsive Design**: Built with Tailwind CSS.

## 🛠️ Tech Stack

- **Backend**: Laravel
- **Frontend**: Blade + Tailwind CSS
- **Database**: MySQL, PostgreSQL
- **Package Managers**: Composer, NPM


## ⚙️ Installation

1. Clone the repository:

```bash
git clone https://github.com/ALBaraa2/book-review.git
cd book-review
```
2. Install PHP dependencies:
```bash
composer install
```
3. Install JavaScript dependencies:
```bash
npm install
```
4. Set up the environment file:
```bash
cp .env.example .env
```
--> Then edit the **.env** file with your database credentials.

5. Generate application key:
```bash
php artisan key:generate
```
6. Run database migrations and seeders:
```bash
php artisan migrate --seed
```
7. Start the development server:
```bash
php artisan serve
```
8. Compile frontend assets:
```bash
npm run dev
```

--> **Now, open http://localhost:8000 in your browser to see the app.**
