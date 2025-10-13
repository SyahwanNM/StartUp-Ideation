# 🚀 Deployment Checklist

## Pre-Deployment Checks

### 1. Database
- [ ] Run migrations: `php artisan migrate`
- [ ] Check if all tables exist
- [ ] Verify admin user exists
- [ ] Test database connection

### 2. Models & Controllers
- [ ] Check if all models exist and are accessible
- [ ] Verify controller methods work
- [ ] Test all routes
- [ ] Check for missing imports

### 3. Views
- [ ] Verify all views exist
- [ ] Check for undefined variables
- [ ] Test form submissions
- [ ] Verify error handling

### 4. Configuration
- [ ] Clear cache: `php artisan config:clear`
- [ ] Clear route cache: `php artisan route:clear`
- [ ] Clear view cache: `php artisan view:clear`
- [ ] Generate app key if needed: `php artisan key:generate`

## Post-Deployment Checks

### 1. Health Check
```bash
php artisan app:health-check
```

### 2. Manual Testing
```bash
php test_app.php
```

### 3. Monitor Logs
```bash
php monitor.php
```

## Common Issues & Solutions

### Issue: Class not found
**Solution**: Check imports in controllers and models

### Issue: Table doesn't exist
**Solution**: Run migrations

### Issue: Route not found
**Solution**: Clear route cache and check routes

### Issue: View not found
**Solution**: Check view file exists and path is correct

### Issue: Undefined variable
**Solution**: Check controller passes data to view

## Emergency Rollback

If issues occur after deployment:

1. **Revert code changes**
2. **Clear all caches**
3. **Run health check**
4. **Test critical functions**

## Monitoring

- Check logs regularly: `storage/logs/laravel.log`
- Monitor database performance
- Test admin login functionality
- Verify all features work as expected

