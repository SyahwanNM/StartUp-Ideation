@echo off
echo 🚀 Starting deployment process...

REM 1. Install/Update Composer dependencies
echo 📦 Installing Composer dependencies...
composer install --optimize-autoloader --no-dev

REM 2. Generate application key if not exists
if not exist .env (
    echo ⚙️ Creating .env file...
    copy env.example .env
    php artisan key:generate
    echo ⚠️ Please configure your database settings in .env file
)

REM 3. Run database migrations
echo 🗄️ Running database migrations...
php artisan migrate --force

REM 4. Seed admin user
echo 👤 Creating admin user...
php artisan db:seed --class=AdminSeeder --force

REM 5. Clear and cache configurations
echo 🧹 Clearing and caching configurations...
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache

REM 6. Download CDN dependencies as fallback
echo 📥 Downloading CDN dependencies as fallback...
if not exist public\assets\css mkdir public\assets\css
if not exist public\assets\js mkdir public\assets\js

REM Download dependencies using PowerShell
powershell -Command "Invoke-WebRequest -Uri 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' -OutFile 'public\assets\css\bootstrap.min.css'"
powershell -Command "Invoke-WebRequest -Uri 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' -OutFile 'public\assets\css\fontawesome.min.css'"
powershell -Command "Invoke-WebRequest -Uri 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' -OutFile 'public\assets\js\bootstrap.bundle.min.js'"
powershell -Command "Invoke-WebRequest -Uri 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js' -OutFile 'public\assets\js\html2canvas.min.js'"
powershell -Command "Invoke-WebRequest -Uri 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js' -OutFile 'public\assets\js\jspdf.umd.min.js'"

echo ✅ Deployment completed successfully!
echo 🌐 Your application should now be accessible
echo 👤 Admin login: admin@ideation.com / admin123
echo ⚠️ Remember to configure your database settings in .env file
pause
