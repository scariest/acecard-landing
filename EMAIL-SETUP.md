# Email Setup Instructions

## Current Setup (Local Development)
Your contact form is currently configured to save emails to files instead of sending them. This is perfect for local development and testing.

### How it works:
- Form submissions are saved to `backend/emails/` folder
- Each submission creates an HTML file with the formatted email
- A summary.txt file keeps a simple log of all submissions

### Files created:
- `backend/emails/contact_YYYY-MM-DD_HH-mm-ss_FirstName_LastName.html`
- `backend/emails/summary.txt`

## For Production (Real Email Sending)

### Option 1: Use OACEC Email Server (Recommended)
1. Get the password for noreply@oacec.com from your hosting provider
2. Update `backend/config.php`:
```php
define('SAVE_TO_FILE', false);
define('USE_SMTP', true);
define('SMTP_HOST', 'mail.oacec.com');
define('SMTP_PORT', 465);
define('SMTP_USERNAME', 'noreply@oacec.com');
define('SMTP_PASSWORD', 'your-actual-password');
define('SMTP_ENCRYPTION', 'ssl');
```

### Option 2: Use Gmail SMTP (Alternative)
1. Go to your Google Account settings
2. Enable 2-Factor Authentication
3. Generate an App Password for "Mail"
4. Update `backend/config.php`:
```php
define('SAVE_TO_FILE', false);
define('USE_SMTP', true);
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-16-character-app-password');
define('SMTP_ENCRYPTION', 'tls');
```

### Option 3: Configure XAMPP for Local Email Testing
1. Install a local SMTP server like hMailServer
2. Configure php.ini in XAMPP
3. Set `SAVE_TO_FILE` to false

## Testing
1. Fill out the contact form
2. Check the `backend/emails/` folder for saved submissions
3. Or check your email inbox if using SMTP

## Current Configuration
- Emails saved to file: **ENABLED** (good for development)
- SMTP sending: **DISABLED** (change for production)
- reCAPTCHA: **ENABLED** (bot protection active)
