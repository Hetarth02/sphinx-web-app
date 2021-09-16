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
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sphinxlaravel@gmail.com';
            $mail->Password = 'sphinx@1234';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            //$mail->setFrom('sender-from-email', 'sender-from-name');
            $mail->addAddress('hetarth02@gmail.com', 'Hetarth Shah');
            $mail->isHTML(true);
            $mail->Subject = 'PHPMailer GMail SMTP test';
            $mail->AltBody = 'This is a plain-text message body';
            if( !$mail->send() ) {
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            } else {
                return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }
    }
}
