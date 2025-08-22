# OACEC Contact Form Setup Guide

## Quick Setup (Email Only)

### 1. Update Email Configuration
Edit `backend/config.php`:
```php
// Change these to your actual email addresses
define('ADMIN_EMAIL', 'your-email@oacec.com'); // Where you want to receive messages
define('FROM_EMAIL', 'noreply@oacec.com');     // Should be from your domain
```

### 2. Test the Setup
1. Open your website in a browser
2. Go to the contact page
3. Fill out the form and submit
4. Check your email for the message

### 3. Server Requirements
- PHP 5.6 or higher
- PHP `mail()` function enabled
- OR SMTP server configured

### 4. Set up reCAPTCHA v3 (Bot Protection)
1. Go to https://www.google.com/recaptcha/admin/create
2. Choose reCAPTCHA v3
3. Add your domain(s)
4. Get your site key and secret key
5. Update `backend/config.php`:
```php
define('RECAPTCHA_SITE_KEY', 'your-site-key-here');
define('RECAPTCHA_SECRET_KEY', 'your-secret-key-here');
```
6. Update `contact.html` - replace `YOUR_SITE_KEY_HERE` with your actual site key in:
   - The reCAPTCHA script tag in the `<head>` section
   - The JavaScript `grecaptcha.execute()` call

### 5. Troubleshooting
- If emails aren't sending, check your server's PHP mail configuration
- Check browser console for JavaScript errors
- Ensure the `backend/` folder has proper permissions
- Test with a simple PHP mail script first

### 6. Going Live
- Change `DEBUG_MODE` to `false` in `config.php`
- Use a proper email service (like SendGrid, Mailgun) for better deliverability
- Add SSL certificate to your domain

## Files Included
- `contact.html` - Updated contact form with JavaScript
- `backend/config.php` - Simple configuration
- `backend/contact-handler.php` - Email sending handler

That's it! Your contact form will now send emails directly to your inbox.
