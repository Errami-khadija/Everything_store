# EveryThing-Store

Everything Store is a **full-stack Laravel e-commerce application** designed to demonstrate modern web development practices, including secure authentication, database management, and responsive UI. The platform allows users to browse products, filter by categories, and interact with an admin-managed storefront.

---

## Features

- User Functionality
> Browse and search products
View detailed product pages with related items
Filter products by category
Responsive design for mobile and desktop
Contact form to communicate with admin

- Admin Panel

> Secure admin authentication
Dashboard overview of products, categories, and orders
CRUD operations for products and categories
Order and message management
Status management (active/inactive) for products

---

## Technologies Used

- Backend: **Laravel 12** (PHP)
- Frontend: Blade templates, HTML5, CSS3, Bootstrap
- Database: MySQL
- ORM: Eloquent
- Notifications: Toastr.js
- Version Control: Git & GitHub

---

## Installation

Follow these steps to run Everything-store locally:

### 1. Clone the repository
```bash
git clone https://github.com/Errami-khadija/Everything_store.git

cd Everything_store

```

### 2. Install dependencies
```bash
composer install
npm install
npm run build
```
### 3. Environment setup
```bash
cp .env.example .env
```

Edit .env and add your database credentials.

### 4. Generate app key
```bash
php artisan key:generate
```

### 5. Run migrations
```bash
php artisan migrate
```

### 6. Start the development server
```bash
php artisan serve
```

## Purpose

- Demonstrates full-stack development skills using Laravel
- Implements secure authentication and CRUD operations
- Showcases ability to create a responsive and functional e-commerce platform
- Highlights knowledge of database design, admin panels, and user management

## Author

Khadija Errami
- Laravel Developer

## License

This project is open-source and available under the MIT License.

## Thanks

Thanks for checking out Everything_Store! If you find this project useful, feel free to ⭐ star the repo and share your feedback 