#!/bin/bash

# Deployment Script for Ideation BMC Generator
# Run this script on your server after uploading files

echo "🚀 Starting deployment process..."

# 1. Set proper permissions
echo "📁 Setting file permissions..."
chmod -R 755 storage bootstrap/cache
chmod -R 644 storage/logs
chmod 644 .env

# 2. Install/Update Composer dependencies
echo "📦 Installing Composer dependencies..."
composer install --optimize-autoloader --no-dev

# 3. Generate application key if not exists
if [ ! -f .env ]; then
    echo "⚙️ Creating .env file..."
    cp env.example .env
    php artisan key:generate
    echo "⚠️ Please configure your database settings in .env file"
fi

# 4. Run database migrations
echo "🗄️ Running database migrations..."
php artisan migrate --force

# 5. Seed admin user
echo "👤 Creating admin user..."
php artisan db:seed --class=AdminSeeder --force

# 6. Clear and cache configurations
echo "🧹 Clearing and caching configurations..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache

# 7. Download CDN dependencies as fallback
echo "📥 Downloading CDN dependencies as fallback..."
mkdir -p public/assets/css public/assets/js

# Download Bootstrap CSS
curl -o public/assets/css/bootstrap.min.css https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css

# Download FontAwesome CSS
curl -o public/assets/css/fontawesome.min.css https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css

# Download Bootstrap JS
curl -o public/assets/js/bootstrap.bundle.min.js https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js

# Download html2canvas
curl -o public/assets/js/html2canvas.min.js https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js

# Download jsPDF
curl -o public/assets/js/jspdf.umd.min.js https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js

# 8. Set final permissions
echo "🔒 Setting final permissions..."
chmod -R 755 public/assets
chmod -R 755 storage bootstrap/cache

echo "✅ Deployment completed successfully!"
echo "🌐 Your application should now be accessible"
echo "👤 Admin login: admin@ideation.com / admin123"
echo "⚠️ Remember to configure your database settings in .env file"
