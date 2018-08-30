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

    public function sendMail()
    {
        // Passing `true` enables exceptions
        try {
            //Server settings
            $this->mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $this->mail->isSMTP();                                      // Set mailer to use SMTP
            $this->mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
            $this->mail->Username = 'phuocbuivan1802@gmail.com';                 // SMTP username
            $this->mail->Password = '';                           // SMTP password
            $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $this->mail->setFrom('buivanphuoc1802@gmail.com', 'Mailer');
            $this->mail->addAddress('buivanphuocforyou@gmail.com');     // Name is optional
            //Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = 'Here is the subject';
            $this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
        }
    }
}
