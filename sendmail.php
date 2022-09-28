
<?php 

require 'vendor/autoload.php';

use SendGrid\Mail\Mail;


class SendEmail{
    public static function sendMail($to, $subject, $content){

        
        $key = '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';

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("andrew.ahn@hotmail.co.uk", "Andrew Ahn");
        $email ->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/html",$content);

        $sendgrid = new \SendGrid($key);

        try{
            $response = $sendgrid->send($email);
            return $response;
        } catch(Exception $e) {
            echo 'Email exception caught: '. $e->getMessage()."\n";
            return false;
        }
    }
}
