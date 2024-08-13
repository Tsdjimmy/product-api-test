# Product API

Welcome to the Product API documentation! This API provides endpoints for managing products, including creation, updating, and retrieving product information. The API is built with Laravel 11 and uses Docker for containerization.

## Table of Contents

- [Project Overview](#project-overview)
- [Getting Started](#getting-started)
- [API Endpoints](#api-endpoints)
- [Database Seeding](#database-seeding)
- [Testing](#testing)
- [Docker Setup](#docker-setup)
- [Contributing](#contributing)
- [License](#license)

## Project Overview

The Product API allows you to:

- Create new products
- Update existing products
- Retrieve product details
- Delete products

The API supports images and variants for products. Images are stored as URLs, and variants can be added or updated as needed.

## Getting Started

### Prerequisites

- [PHP 8.3](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Docker](https://www.docker.com/)
- [Postman](https://www.postman.com/) for API testing and documentation

### Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/Tsdjimmy/product-api-test
   cd product-api
   ```

2. **Install Dependencies**

   ```bash
   composer install
   ```

3. **Set Up Environment**

   Copy the `.env.example` file to `.env` and configure the database and other environment variables.

   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

## API Endpoints

For detailed API documentation, visit the [Postman Documentation](https://documenter.getpostman.com/view/10059500/2sA3s6E9Lk).

## Database Seeding

To seed the database with sample categories, use the following command:

```bash
php artisan db:seed --class=CategoriesTableSeeder
```

## Testing

Run the tests using PHPUnit:

```bash
php artisan test
```

Run the app without docker?:

```bash
php artisan migrate
```

```bash
php artisan serve
```

## Docker Setup

1. **Build Docker Containers**

   ```bash
   docker-compose build
   ```

2. **Start Docker Containers**

   ```bash
   docker-compose up -d
   ```

3. **Run Migrations and Seeders**

   ```bash
   docker-compose exec app php artisan migrate --seed
   ```

4. **Stop Docker Containers**

   ```bash
   docker-compose down
   ```

## Contributing

We welcome contributions to improve the Product API. Please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Submit a pull request with a description of the changes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Feel free to modify or add more details as needed for your specific project!