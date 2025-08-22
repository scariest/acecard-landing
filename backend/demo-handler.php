<?php
/**
 * Demo Booking Form Handler - Sends emails to demo@oacec.com
 */

// Turn off output buffering to prevent extra characters
ob_clean();

// Include configuration
require_once 'config.php';

// Set content type to JSON
header('Content-Type: application/json');

// Disable error output to prevent breaking JSON response
if (!DEBUG_MODE) {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Handle CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// SMTP email function
function sendViaSMTP($to, $subject, $body, $fromName, $replyTo) {
    try {
        // Create SMTP connection
        $smtp = fsockopen(SMTP_HOST, SMTP_PORT, $errno, $errstr, 30);
        if (!$smtp) {
            return false;
        }
        
        // Read server response
        fgets($smtp, 512);
        
        // Send HELO
        fputs($smtp, "HELO " . $_SERVER['HTTP_HOST'] . "\r\n");
        fgets($smtp, 512);
        
        // Start TLS if needed
        if (SMTP_ENCRYPTION === 'tls') {
            fputs($smtp, "STARTTLS\r\n");
            fgets($smtp, 512);
            stream_socket_enable_crypto($smtp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
        }
        
        // Authentication
        fputs($smtp, "AUTH LOGIN\r\n");
        fgets($smtp, 512);
        fputs($smtp, base64_encode(SMTP_USERNAME) . "\r\n");
        fgets($smtp, 512);
        fputs($smtp, base64_encode(SMTP_PASSWORD) . "\r\n");
        fgets($smtp, 512);
        
        // Send email
        fputs($smtp, "MAIL FROM: <" . FROM_EMAIL . ">\r\n");
        fgets($smtp, 512);
        fputs($smtp, "RCPT TO: <" . $to . ">\r\n");
        fgets($smtp, 512);
        fputs($smtp, "DATA\r\n");
        fgets($smtp, 512);
        
        // Email headers and body
        $email = "From: " . $fromName . " <" . FROM_EMAIL . ">\r\n";
        $email .= "Reply-To: " . $replyTo . "\r\n";
        $email .= "Subject: " . $subject . "\r\n";
        $email .= "MIME-Version: 1.0\r\n";
        $email .= "Content-Type: text/html; charset=UTF-8\r\n";
        $email .= "\r\n";
        $email .= $body . "\r\n";
        $email .= ".\r\n";
        
        fputs($smtp, $email);
        fgets($smtp, 512);
        
        // Quit
        fputs($smtp, "QUIT\r\n");
        fclose($smtp);
        
        return true;
    } catch (Exception $e) {
        return false;
    }
}

try {
    // Get form data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $preferredDate = trim($_POST['preferred_date'] ?? '');
    $preferredTime = trim($_POST['preferred_time'] ?? '');

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($preferredDate) || empty($preferredTime)) {
        throw new Exception('All fields are required');
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email address');
    }

    // Phone validation (basic)
    if (!preg_match('/^[\+]?[1-9][\d]{3,14}$/', preg_replace('/[\s\-\(\)]/', '', $phone))) {
        throw new Exception('Invalid phone number');
    }

    // Date validation
    $dateObj = DateTime::createFromFormat('Y-m-d', $preferredDate);
    if (!$dateObj || $dateObj->format('Y-m-d') !== $preferredDate) {
        throw new Exception('Invalid date format');
    }

    // Check if date is not in the past
    $today = new DateTime();
    if ($dateObj < $today) {
        throw new Exception('Please select a future date');
    }

    // Time validation
    if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $preferredTime)) {
        throw new Exception('Invalid time format');
    }

    // Prepare email content
    $subject = 'New Demo Booking Request - ' . $name;
    
    $emailBody = "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background-color: #007bff; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; background-color: #f8f9fa; }
            .info-row { margin: 10px 0; padding: 10px; background-color: white; border-left: 4px solid #007bff; }
            .label { font-weight: bold; color: #007bff; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Demo Booking Request</h2>
            </div>
            <div class='content'>
                <p>A new demo booking request has been submitted through the OACEC website.</p>
                
                <div class='info-row'>
                    <div class='label'>Name:</div>
                    <div>$name</div>
                </div>
                
                <div class='info-row'>
                    <div class='label'>Email:</div>
                    <div>$email</div>
                </div>
                
                <div class='info-row'>
                    <div class='label'>Phone:</div>
                    <div>$phone</div>
                </div>
                
                <div class='info-row'>
                    <div class='label'>Preferred Date:</div>
                    <div>" . date('l, F j, Y', strtotime($preferredDate)) . "</div>
                </div>
                
                <div class='info-row'>
                    <div class='label'>Preferred Time:</div>
                    <div>$preferredTime</div>
                </div>
                
                <div style='margin-top: 20px; padding: 15px; background-color: #e9ecef; border-radius: 5px;'>
                    <strong>Next Steps:</strong><br>
                    Please reach out to the client within 24 hours to confirm the demo appointment and provide further details.
                </div>
            </div>
        </div>
    </body>
    </html>";

    // Demo email address
    $demoEmail = 'demo@oacec.com';

    // Send email
    $emailSent = false;
    
    if (SAVE_TO_FILE) {
        // For local development - save to file
        $filename = 'emails/demo_' . date('Y-m-d_H-i-s') . '_' . preg_replace('/[^a-zA-Z0-9]/', '_', $name) . '.html';
        $dir = dirname(__FILE__) . '/emails/';
        
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        
        $emailSent = file_put_contents($dir . basename($filename), $emailBody) !== false;
        
        if ($emailSent) {
            // Also create a simple text summary
            $summary = "Demo Booking Request\n";
            $summary .= "Date: " . date('Y-m-d H:i:s') . "\n";
            $summary .= "Name: $name\n";
            $summary .= "Email: $email\n";
            $summary .= "Phone: $phone\n";
            $summary .= "Preferred Date: $preferredDate\n";
            $summary .= "Preferred Time: $preferredTime\n\n";
            
            file_put_contents($dir . 'demo_summary.txt', $summary, FILE_APPEND | LOCK_EX);
        }
    } else if (USE_SMTP && defined('SMTP_HOST') && SMTP_HOST !== 'mail.oacec.com') {
        // Use SMTP
        $emailSent = sendViaSMTP($demoEmail, $subject, $emailBody, FROM_NAME, $email);
    } else {
        // Use PHP mail() function
        $headers = [
            'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>',
            'Reply-To: ' . $name . ' <' . $email . '>',
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion()
        ];
        
        $emailSent = mail($demoEmail, $subject, $emailBody, implode("\r\n", $headers));
    }

    if (!$emailSent) {
        if (SAVE_TO_FILE) {
            throw new Exception('Failed to save demo request. Please try again.');
        } else {
            throw new Exception('Failed to send demo request. Please contact us directly at ' . $demoEmail);
        }
    }

    // Success response
    $successMessage = 'Thank you for booking a demo! We will contact you within 24 hours to confirm your appointment.';
    
    if (SAVE_TO_FILE) {
        $successMessage = 'Thank you for booking a demo! (Saved locally for development)';
    }
    
    echo json_encode([
        'success' => true,
        'message' => $successMessage
    ]);

} catch (Exception $e) {
    // Error response
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>
