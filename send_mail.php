<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use \SendGrid\Mail\Mail;

$email = new Mail();
// Replace the email address and name with your verified sender
$email->setFrom(
    'test@example.com',
    'Example Recipient'
);
$email->setSubject('Test emmail');
// Replace the email address and name with your recipient
$email->addTo(
    'andrew.ahn@hotmail.co.uk',
    'Test Sender'
);
$email->addContent(
    'text/html',
    '<strong>Test email.</strong>'
);
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    printf("Response status: %d\n\n", $response->statusCode());

    $headers = array_filter($response->headers());
    echo "Response Headers\n\n";
    foreach ($headers as $header) {
        echo '- ' . $header . "\n";
    }
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}