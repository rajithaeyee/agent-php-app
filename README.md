# PHP Example for Convox

A PHP web application with Apache ready to deploy on Convox.

This example demonstrates how to deploy a dynamic PHP application on Convox. It showcases server-side rendering, API endpoints, environment variable usage, and includes common PHP extensions for database connectivity.

Deploy to Convox Cloud for a fully-managed platform experience, or to your own Convox Rack for complete control over your infrastructure. Either way, you'll get automatic SSL, load balancing, and zero-downtime deployments out of the box.

## Deploy to Convox Cloud

1. **Create a Cloud Machine** at [console.convox.com](https://console.convox.com)

2. **Create the app**:
```bash
convox cloud apps create php -i your-machine-name
```

3. **Deploy the app**:
```bash
convox cloud deploy -a php -i your-machine-name
```

4. **View your app**:
```bash
convox cloud services -a php -i your-machine-name
```

Visit your URL to see the PHP application!

## Deploy to Convox Rack

1. **Create the app**:
```bash
convox apps create php
```

2. **Deploy the app**:
```bash
convox deploy -a php
```

3. **View your app**:
```bash
convox services -a php
```

Visit your URL to see the PHP application!

## Features

- **PHP 8.3** with Apache web server
- **Dynamic Routing** - Simple PHP router for multiple pages
- **API Endpoints** - JSON API examples at `/api/status` and `/api/time`
- **Environment Variables** - Access Convox environment variables
- **Database Ready** - PDO and MySQLi extensions pre-installed
- **Modern UI** - Responsive design with Convox branding

## Project Structure

```
.
├── Dockerfile           # PHP 8.3 with Apache
├── convox.yml          # Convox configuration
└── public/             # Web root
    ├── index.php       # Main router
    ├── style.css       # Styles
    ├── .htaccess       # Apache routing rules
    └── pages/          # Page templates
        ├── home.php
        ├── info.php
        ├── api_status.php
        └── api_time.php
```

## Available Routes

- `/` - Homepage with server information
- `/info` - PHP configuration details (phpinfo)
- `/api/status` - JSON API endpoint with system status
- `/api/time` - JSON API endpoint with current time
- Any other route - 404 page

## Adding Database Support

This example includes PDO and MySQLi extensions. To add a database:

### Add to convox.yml:
```yaml
resources:
  database:
    type: mysql
    options:
      storage: 10

services:
  web:
    resources:
      - database
```

### Access in PHP:
```php
// Database URL is automatically provided
$db_url = getenv('DATABASE_URL');
// Parse and connect using PDO or MySQLi
```

## Environment Variables

The application can access Convox-provided environment variables:

- `APP` - Application name
- `RACK` - Rack name  
- `SERVICE` - Service name
- `BUILD` - Build ID
- `RELEASE` - Release ID

## Scaling

### Convox Cloud
```bash
convox cloud scale web --count 2 --cpu 500 --memory 1024 -a php -i your-machine-name
```

### Convox Rack
```bash
convox scale web --count 2 --cpu 500 --memory 1024 -a php
```

## Common Commands

### View logs

Cloud:
```bash
convox cloud logs -a php -i your-machine-name
```

Rack:
```bash
convox logs -a php
```

### Run PHP commands

Cloud:
```bash
convox cloud run web "php -m" -a php -i your-machine-name
```

Rack:
```bash
convox run web "php -m" -a php
```

### Access shell

Cloud:
```bash
convox cloud run web bash -a php -i your-machine-name
```

Rack:
```bash
convox run web bash -a php
```

## Customization

### Adding Composer

To add Composer dependencies, update the Dockerfile:

```dockerfile
FROM php:8.3-apache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Rest of Dockerfile...
```

### Adding More PHP Extensions

Add to Dockerfile:
```dockerfile
RUN docker-php-ext-install opcache gd zip
RUN pecl install redis && docker-php-ext-enable redis
```

### Using Framework

This example uses vanilla PHP. To use a framework like Laravel or Symfony:

1. Copy your framework files to the project
2. Update the document root in Dockerfile if needed
3. Ensure `.env` files are properly configured
4. Add any required PHP extensions

## Performance Tips

- Enable OPcache for production
- Use PHP-FPM for better performance under load
- Configure Apache MPM settings for your workload
- Use Redis/Memcached for session storage in scaled deployments