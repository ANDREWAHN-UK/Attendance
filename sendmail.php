
<?php 

require 'vendor/autoload.php';

use SendGrid\Mail\Mail;


class SendEmail{
    public static function sendMail($to, $subject, $content){

        
        $key = //try this page again when an env file is created

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
