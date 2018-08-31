<?php 
namespace email;
require('../vendor/autoload.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
class Mail
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function sendMail($to, $subject, $content)
    {
        // Passing `true` enables exceptions
        try {
            //Server settings
            $this->mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $this->mail->isSMTP();                                      // Set mailer to use SMTP
            $this->mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
            $this->mail->Username = 'phuocbuivan1802@gmail.com';                 // SMTP username
            $this->mail->Password = 'Foryou18021994';                           // SMTP password
            $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $this->mail->setFrom('phuocbuivan1802@gmail.com', 'Mailer');
            $this->mail->addAddress($to);     // Name is optional
            //Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body = $content;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
