# 🚀 Deployment Guide - Ideation BMC Generator

## 📋 Prerequisites

### Server Requirements:
- **PHP 8.2+** (Recommended: PHP 8.3)
- **Composer** (Latest version)
- **MySQL 8.0+** atau **MariaDB 10.4+**
- **Apache** atau **Nginx**
- **SSL Certificate** (Recommended)
- **Domain name**

### PHP Extensions Required:
```bash
php-mysql
php-mbstring
php-xml
php-curl
php-zip
php-gd
php-intl
php-bcmath
```

## 🛠️ Deployment Steps

### 1. Upload Files to Server
```bash
# Upload all project files to your server
# Make sure to upload to the correct directory (usually public_html or www)
```

### 2. Set File Permissions
```bash
# Linux/Mac
chmod -R 755 storage bootstrap/cache
chmod -R 644 storage/logs
chmod 644 .env

# Windows (if using WSL or Git Bash)
chmod -R 755 storage bootstrap/cache
```

### 3. Configure Environment
```bash
# Copy environment file
cp env.example .env

# Edit .env file with your settings
nano .env
```

**Important .env settings:**
```env
APP_NAME="Ideation"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Run Deployment Script

**For Linux/Mac:**
```bash
chmod +x deploy.sh
./deploy.sh
```

**For Windows:**
```cmd
deploy.bat
```

**Manual deployment (if scripts don't work):**
```bash
# Install dependencies
composer install --optimize-autoloader --no-dev

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate --force

# Create admin user
php artisan db:seed --class=AdminSeeder --force

# Clear and cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 5. Download CDN Dependencies (Fallback)
```bash
# Create directories
mkdir -p public/assets/css public/assets/js

# Download dependencies
curl -o public/assets/css/bootstrap.min.css https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
curl -o public/assets/css/fontawesome.min.css https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css
curl -o public/assets/js/bootstrap.bundle.min.js https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js
curl -o public/assets/js/html2canvas.min.js https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js
curl -o public/assets/js/jspdf.umd.min.js https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js
```

## 🔧 Troubleshooting

### Common Issues:

#### 1. **Permission Denied**
```bash
# Fix storage permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

#### 2. **Database Connection Failed**
- Check database credentials in `.env`
- Ensure database exists
- Verify MySQL service is running

#### 3. **CDN Not Loading**
- Check internet connection
- Verify fallback files are downloaded
- Check browser console for errors

#### 4. **500 Internal Server Error**
```bash
# Check Laravel logs
tail -f storage/logs/laravel.log

# Clear cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

#### 5. **CSS/JS Not Loading**
- Check file permissions
- Verify `.htaccess` is present in public directory
- Check web server configuration

### Performance Optimization:

#### 1. **Enable OPcache**
```ini
# In php.ini
opcache.enable=1
opcache.memory_consumption=128
opcache.max_accelerated_files=4000
opcache.revalidate_freq=2
```

#### 2. **Enable Gzip Compression**
```apache
# In .htaccess
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>
```

## 🔒 Security Checklist

- [ ] Set `APP_DEBUG=false` in production
- [ ] Use strong database passwords
- [ ] Enable SSL/HTTPS
- [ ] Set proper file permissions
- [ ] Regular backups
- [ ] Update dependencies regularly

## 📊 Monitoring

### Check Application Status:
```bash
# Check Laravel status
php artisan about

# Check database connection
php artisan tinker
>>> DB::connection()->getPdo();
```

### Log Files:
- **Laravel Logs:** `storage/logs/laravel.log`
- **Web Server Logs:** Check your web server configuration
- **Error Logs:** Check PHP error logs

## 🆘 Support

If you encounter issues:
1. Check the troubleshooting section above
2. Review Laravel logs
3. Verify server requirements
4. Check file permissions
5. Ensure database connectivity

## 📞 Admin Access

After successful deployment:
- **URL:** `https://yourdomain.com/admin`
- **Email:** `admin@ideation.com`
- **Password:** `admin123`

**⚠️ Important:** Change the admin password after first login!
