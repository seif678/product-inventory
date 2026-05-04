# 📦 Product Inventory Microservice

A Dockerized Laravel-based Product Inventory Management System using PostgreSQL, Redis, and Nginx.

This project provides a scalable backend foundation for managing products and inventory using a real-world Docker development environment.

---

## 🚀 Tech Stack

Laravel 11 (or 10), PHP 8.2 (FPM), PostgreSQL 15, Redis, Nginx, Docker & Docker Compose.

---

## ⚙️ Setup Instructions

Clone the repository:
```bash
git clone https://github.com/seif678/product-inventory.git
cd product-inventory
cp .env.example .env
docker-compose up -d --build
docker exec -it product_inventory_app bash
composer install
php artisan key:generate
php artisan key:generate
