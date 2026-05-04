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
php artisan migrate
php artisan test
