<?php
/**
 * Simple Contact Form Handler - Sends emails only
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
function sendViaSMTP($to, $subject, $body, $fromName, $fromLastName, $replyTo) {
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
        if (defined('SMTP_USERNAME') && SMTP_USERNAME) {
            fputs($smtp, "AUTH LOGIN\r\n");
            fgets($smtp, 512);
            fputs($smtp, base64_encode(SMTP_USERNAME) . "\r\n");
            fgets($smtp, 512);
            fputs($smtp, base64_encode(SMTP_PASSWORD) . "\r\n");
            fgets($smtp, 512);
        }
        
        // Send email
        fputs($smtp, "MAIL FROM: <" . FROM_EMAIL . ">\r\n");
        fgets($smtp, 512);
        fputs($smtp, "RCPT TO: <$to>\r\n");
        fgets($smtp, 512);
        fputs($smtp, "DATA\r\n");
        fgets($smtp, 512);
        
        // Email headers and body
        $headers = "From: " . FROM_NAME . " <" . FROM_EMAIL . ">\r\n";
        $headers .= "Reply-To: $fromName $fromLastName <$replyTo>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "Subject: $subject\r\n\r\n";
        
        fputs($smtp, $headers . $body . "\r\n.\r\n");
        fgets($smtp, 512);
        fputs($smtp, "QUIT\r\n");
        
        fclose($smtp);
        return true;
        
    } catch (Exception $e) {
        return false;
    }
}

try {
    // Get form data
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $recaptchaToken = $_POST['recaptcha_token'] ?? '';
    $recaptchaAction = $_POST['recaptcha_action'] ?? '';

    // Basic validation
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($message)) {
        throw new Exception('All fields are required');
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email address');
    }

    // Message length validation
    if (strlen($message) < MIN_MESSAGE_LENGTH) {
        throw new Exception('Message is too short');
    }
    if (strlen($message) > MAX_MESSAGE_LENGTH) {
        throw new Exception('Message is too long');
    }

    // Verify reCAPTCHA v3
    if (!empty($recaptchaToken) && RECAPTCHA_SECRET_KEY !== 'YOUR_RECAPTCHA_SECRET_KEY') {
        $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptchaData = [
            'secret' => RECAPTCHA_SECRET_KEY,
            'response' => $recaptchaToken,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];

        $recaptchaOptions = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($recaptchaData)
            ]
        ];

        $recaptchaContext = stream_context_create($recaptchaOptions);
        $recaptchaResult = file_get_contents($recaptchaUrl, false, $recaptchaContext);
        $recaptchaResponse = json_decode($recaptchaResult);

        if (!$recaptchaResponse->success) {
            throw new Exception('reCAPTCHA verification failed');
        }

        // Check reCAPTCHA v3 score (0.0 = bot, 1.0 = human)
        if (isset($recaptchaResponse->score) && $recaptchaResponse->score < 0.5) {
            throw new Exception('Security check failed. Please try again.');
        }

        // Verify action matches
        if (isset($recaptchaResponse->action) && $recaptchaResponse->action !== $recaptchaAction) {
            throw new Exception('Invalid form submission');
        }
    }

    // Prepare email content
    $subject = 'New Contact Form Submission - OACEC Website';
    
    $emailBody = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #007bff; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; background: #f8f9fa; }
            .field { margin-bottom: 15px; }
            .field strong { color: #007bff; }
            .message-box { background: white; padding: 15px; border-left: 4px solid #007bff; margin-top: 10px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
                <p>OACEC Website</p>
            </div>
            <div class='content'>
                <div class='field'>
                    <strong>Name:</strong> {$firstName} {$lastName}
                </div>
                <div class='field'>
                    <strong>Email:</strong> {$email}
                </div>
                <div class='field'>
                    <strong>Phone:</strong> {$phone}
                </div>
                <div class='field'>
                    <strong>Submitted:</strong> " . date('Y-m-d H:i:s') . "
                </div>
                <div class='field'>
                    <strong>IP Address:</strong> " . $_SERVER['REMOTE_ADDR'] . "
                </div>
                <div class='field'>
                    <strong>Message:</strong>
                    <div class='message-box'>" . nl2br(htmlspecialchars($message)) . "</div>
                </div>
            </div>
        </div>
    </body>
    </html>";

    // Email headers
    $headers = [
        'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>',
        'Reply-To: ' . $firstName . ' ' . $lastName . ' <' . $email . '>',
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion()
    ];

    // Send email
    $emailSent = false;
    
    if (SAVE_TO_FILE) {
        // For local development - save to file
        $filename = 'emails/contact_' . date('Y-m-d_H-i-s') . '_' . $firstName . '_' . $lastName . '.html';
        $dir = dirname(__FILE__) . '/emails/';
        
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        
        $emailSent = file_put_contents($dir . basename($filename), $emailBody) !== false;
        
        if ($emailSent) {
            // Also create a simple text summary
            $summary = "Contact Form Submission\n";
            $summary .= "Date: " . date('Y-m-d H:i:s') . "\n";
            $summary .= "Name: $firstName $lastName\n";
            $summary .= "Email: $email\n";
            $summary .= "Phone: $phone\n";
            $summary .= "Message: $message\n\n";
            
            file_put_contents($dir . 'summary.txt', $summary, FILE_APPEND | LOCK_EX);
        }
    } else if (USE_SMTP && defined('SMTP_HOST') && SMTP_HOST !== 'mail.oacec.com') {
        // Use SMTP
        $emailSent = sendViaSMTP(ADMIN_EMAIL, $subject, $emailBody, $firstName, $lastName, $email);
    } else {
        // Use PHP mail() function
        $headers = [
            'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>',
            'Reply-To: ' . $firstName . ' ' . $lastName . ' <' . $email . '>',
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion()
        ];
        
        $emailSent = mail(ADMIN_EMAIL, $subject, $emailBody, implode("\r\n", $headers));
    }

    if (!$emailSent) {
        if (SAVE_TO_FILE) {
            throw new Exception('Failed to save message. Please try again.');
        } else {
            throw new Exception('Failed to send email. Please contact us directly at ' . ADMIN_EMAIL);
        }
    }

    // Success response
    $successMessage = 'Thank you for your message! We will get back to you soon.';
    
    if (SAVE_TO_FILE) {
        $successMessage = 'Thank you for your message! (Saved locally for development)';
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
