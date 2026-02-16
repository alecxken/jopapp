# Content Security Policy (CSP) Configuration Guide

## Overview
This guide helps you fix Content Security Policy violations in your Laravel application when hosted on Ubuntu.

## Issues Identified

1. **DataTables eval() error**: Requires 'unsafe-eval'
2. **Inline scripts blocked**: Requires 'unsafe-inline' or nonces
3. **Inline event handlers blocked**: Requires 'unsafe-inline' or 'unsafe-hashes'
4. **Missing script-src directive**: Falls back to restrictive default-src

## Solution Implemented

### 1. Laravel CSP Middleware

**File**: `app/Http/Middleware/ContentSecurityPolicy.php`

This middleware sets proper CSP headers with:
- ✅ 'unsafe-inline' for inline scripts and styles
- ✅ 'unsafe-eval' for DataTables
- ✅ Nonce support for enhanced security
- ✅ CDN allowances (jQuery, Highcharts, Bootstrap, etc.)
- ✅ Proper image, font, and API sources

### 2. Register the Middleware

Add to `app/Http/Kernel.php` in the `$middlewareGroups['web']` array:

```php
protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \App\Http\Middleware\ContentSecurityPolicy::class, // ADD THIS LINE
    ],
];
```

## Ubuntu Server Configuration

### Option 1: Apache Configuration

If using Apache, add to your virtual host configuration:

**File**: `/etc/apache2/sites-available/your-site.conf`

```apache
<VirtualHost *:80>
    ServerName yoursite.com
    DocumentRoot /var/www/jopapp/public

    # Enable headers module (if not already)
    # sudo a2enmod headers

    # Set Content Security Policy
    Header always set Content-Security-Policy "default-src 'self' http: https: data: blob:; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://code.jquery.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://code.highcharts.com https://maxcdn.bootstrapcdn.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://maxcdn.bootstrapcdn.com https://cdnjs.cloudflare.com; img-src 'self' data: https: http:; font-src 'self' data: https://fonts.gstatic.com https://maxcdn.bootstrapcdn.com; connect-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self'; frame-ancestors 'self';"

    <Directory /var/www/jopapp/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

**Reload Apache:**
```bash
sudo systemctl reload apache2
```

### Option 2: Nginx Configuration

If using Nginx:

**File**: `/etc/nginx/sites-available/your-site`

```nginx
server {
    listen 80;
    server_name yoursite.com;
    root /var/www/jopapp/public;

    index index.php index.html;

    # Add CSP headers
    add_header Content-Security-Policy "default-src 'self' http: https: data: blob:; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://code.jquery.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://code.highcharts.com https://maxcdn.bootstrapcdn.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://maxcdn.bootstrapcdn.com https://cdnjs.cloudflare.com; img-src 'self' data: https: http:; font-src 'self' data: https://fonts.gstatic.com https://maxcdn.bootstrapcdn.com; connect-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self'; frame-ancestors 'self';" always;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

**Reload Nginx:**
```bash
sudo systemctl reload nginx
```

## Understanding CSP Directives

### Why 'unsafe-inline' and 'unsafe-eval'?

**Your application uses:**
1. **DataTables**: Requires `'unsafe-eval'` for dynamic code generation
2. **Inline scripts**: Throughout blade templates
3. **Inline event handlers**: onclick, onchange, etc.

**Trade-off:**
- ❌ Less secure (allows inline scripts)
- ✅ Application works without major refactoring

### More Secure Alternative (Future Enhancement)

To remove 'unsafe-inline', you would need to:

1. **Extract all inline scripts** to external .js files
2. **Remove inline event handlers**:
   ```html
   <!-- Bad: Inline handler -->
   <button onclick="doSomething()">Click</button>

   <!-- Good: External handler -->
   <button id="myButton">Click</button>
   <script src="app.js"></script>
   <!-- In app.js: document.getElementById('myButton').addEventListener('click', doSomething); -->
   ```

3. **Use nonces for necessary inline scripts**:
   ```blade
   <script nonce="{{ request()->attributes->get('csp_nonce') }}">
       // Inline script here
   </script>
   ```

## Testing CSP Configuration

### 1. Check Headers

```bash
curl -I https://yoursite.com | grep -i content-security
```

You should see:
```
Content-Security-Policy: default-src 'self' http: https: data: blob:; script-src...
```

### 2. Browser Console

After implementing:
1. Open browser DevTools (F12)
2. Navigate to your application
3. Check Console tab
4. CSP violations should be gone

### 3. Test DataTables

Visit any page with DataTables:
- Should load without errors
- No "unsafe-eval" violations

## Troubleshooting

### Issue: Headers Not Applied

**Apache:**
```bash
# Enable headers module
sudo a2enmod headers
sudo systemctl restart apache2
```

**Nginx:**
```bash
# Check syntax
sudo nginx -t

# Reload
sudo systemctl reload nginx
```

### Issue: Still Getting CSP Errors

1. **Clear browser cache** (Ctrl+Shift+Delete)
2. **Hard refresh** (Ctrl+Shift+R)
3. **Check which policy is active**:
   ```javascript
   // In browser console
   console.log(document.querySelector('meta[http-equiv="Content-Security-Policy"]'));
   ```

### Issue: Specific CDN Blocked

Add the CDN domain to the appropriate directive in the middleware:

```php
// Example: Add another CDN
"script-src 'self' 'unsafe-inline' 'unsafe-eval' https://code.jquery.com https://newcdn.com",
```

## Security Best Practices

### Current Setup (Permissive)
✅ Application works
❌ Less secure (allows inline scripts)

### Recommended for Production (After Refactoring)
```
script-src 'self' 'nonce-{random}' https://trusted-cdn.com
style-src 'self' 'nonce-{random}'
```

### Steps to Harden (Future):
1. Move inline scripts to external files
2. Remove inline event handlers
3. Use nonces for remaining inline scripts
4. Remove 'unsafe-inline' and 'unsafe-eval'
5. Implement strict CSP

## Image 403 Error Fix

The error `GET https://kura.urbanroadssacco.co.ke/images/ 403 (Forbidden)` is not CSP-related.

**Fix options:**

1. **Correct the image path** in your blade templates
2. **Check file permissions**:
   ```bash
   sudo chmod -R 755 /var/www/jopapp/public/images
   sudo chown -R www-data:www-data /var/www/jopapp/public/images
   ```

3. **Apache .htaccess** (if needed):
   ```apache
   <Directory /var/www/jopapp/public/images>
       Options Indexes FollowSymLinks
       AllowOverride All
       Require all granted
   </Directory>
   ```

## Quick Deploy Steps

### On Ubuntu Server:

```bash
# 1. Upload middleware file
scp app/Http/Middleware/ContentSecurityPolicy.php user@server:/var/www/jopapp/app/Http/Middleware/

# 2. Update Kernel.php (manually edit)
nano /var/www/jopapp/app/Http/Kernel.php

# 3. Clear cache
cd /var/www/jopapp
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# 4. Set permissions
sudo chown -R www-data:www-data /var/www/jopapp
sudo chmod -R 775 /var/www/jopapp/storage
sudo chmod -R 775 /var/www/jopapp/bootstrap/cache

# 5. Reload web server
# For Apache:
sudo systemctl reload apache2

# For Nginx:
sudo systemctl reload nginx
```

## Monitoring CSP

### Report-Only Mode (Testing)

Use `Content-Security-Policy-Report-Only` instead during testing:

```php
$response->headers->set('Content-Security-Policy-Report-Only', $csp);
```

This logs violations without blocking anything.

### CSP Violation Reporting

Add to CSP header:
```
report-uri /csp-report-endpoint;
```

Create endpoint to log violations:
```php
Route::post('/csp-report-endpoint', function (Request $request) {
    \Log::warning('CSP Violation', $request->all());
    return response('', 204);
});
```

---

**Implementation Steps:**
1. ✅ Middleware created
2. ⏳ Register middleware in Kernel.php
3. ⏳ Deploy to Ubuntu server
4. ⏳ Configure Apache/Nginx headers
5. ⏳ Test and verify

**Priority**: Implement middleware first, then add server-level headers as backup.
