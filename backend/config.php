<?php
/**
 * Simple configuration for contact form email sending
 */

// Email configuration
define('ADMIN_EMAIL', 'hello@oacec.com'); 
define('FROM_EMAIL', 'noreply@oacec.com'); 
define('FROM_NAME', 'OACEC Website Contact Form');

// SMTP Configuration (using OACEC email server)
define('USE_SMTP', true);
define('SMTP_HOST', 'mail.oacec.com'); 
define('SMTP_PORT', 465); 
define('SMTP_USERNAME', 'noreply@oacec.com'); 
define('SMTP_PASSWORD', 'pM7497.W9_L@'); 
define('SMTP_ENCRYPTION', 'ssl'); 

// For local development - save to file instead of sending email
define('SAVE_TO_FILE', false); // Set to false in production

// reCAPTCHA v3 configuration (get keys from https://www.google.com/recaptcha/)
define('RECAPTCHA_SITE_KEY', '6Le8Aa0rAAAAAIRKHEfNSkoQN4cTHKy8SFRwcHvD'); 
define('RECAPTCHA_SECRET_KEY', '6Le8Aa0rAAAAAKnQP4TdkPPyeSSAXOeGL8RQ2Shk'); 

// Security settings
define('MAX_MESSAGE_LENGTH', 2000);
define('MIN_MESSAGE_LENGTH', 10);

// Error reporting (set to false in production)
define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
?>
