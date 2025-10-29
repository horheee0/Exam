# 🌾 HarvestHire (Lite)

## 🧾 Description / Overview  
**HarvestHire (Lite)** is a simplified machine rental web system designed to make agricultural machinery booking easy and efficient.  
It provides two main management units:  
1. **Manage Machineries** – where users can add, edit, or delete machinery records.  
2. **Manage Rentals** – where users can create a rental by selecting from the available machineries.  

This system helps reduce manual booking work and allows digital management of both machinery and rental transactions.

---

## 🎯 Objectives  
1. To develop a machine rental system where users can book machinery online without the hassle of going physically to the site.  
2. To practice CRUD (Create, Read, Update, Delete) operations for managing machinery efficiently.  
3. To apply web technologies such as **HTML**, **CSS**, **JavaScript**, **PHP**, and **Laravel** in system development.  

---

## ⚙️ Features / Functionality  
- Add, edit, or delete machinery under **Manage Machineries**.  
- Create and manage machinery rentals under **Manage Rentals**.  
- Select existing machinery for new rentals.  
- Automatic status update when machinery is rented.  
- Simple and user-friendly interface for easy management.  

---

## 🧩 Installation Instructions  
1. Install **XAMPP** or any local web server with PHP and MySQL.  
2. Install **Composer** (for Laravel dependency management).  
3. Open your terminal and run:  
   ```bash
   composer install
4. Set up your database in .env and migrate the tables:
   ```bash
    php artisan migrate
5, Start the Laravel development server:

    php artisan serve
6. Open your browser and go to http://localhost:8000.
