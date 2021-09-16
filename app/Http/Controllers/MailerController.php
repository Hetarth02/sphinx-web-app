<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends Controller
{
    public function composeEmail(Request $request) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);

        try {
            //$mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sphinxlaravel@gmail.com';
            $mail->Password = 'sphinx@1234';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('sphinxlaravel@gmail.com', 'Sphinx');
            $mail->addAddress('hetarth02@gmail.com');
            $mail->Subject = 'PHPMailer GMail SMTP test';
            $mail->isHTML(true);
            $mail->Body = 'This is a plain-text message body';
            if(!$mail->send()){
                echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
            }else{
                echo 'Message has been sent.';
            }
        } catch (Exception $e) {
            return response()->with('error','Message could not be sent.');
        }
    }
}
