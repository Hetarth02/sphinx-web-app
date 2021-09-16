<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MailerController extends Controller
{
    public function composeEmail(Request $request) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);

        $email = $request->email;
        $username = $request->username;
        $new_password = Str::random(10);
        $crypt_new_password = bcrypt($new_password);

        $check = DB::select('select * from users where username = ? and email = ?', [$username,$email]);

        if (empty($check)) {
            return redirect('/');
        } else {
            $insert = DB::update('update users set password = ?,password_values = ? where email = ? and username = ?', [$crypt_new_password,$new_password,$email,$username]);
            if ($insert) {
                try {

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'sphinxlaravel@gmail.com';
                    $mail->Password = 'sphinx@1234';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('sphinxlaravel@gmail.com', 'Sphinx');
                    $mail->addAddress($email);

                    $mail->Subject = 'Your new Password';
                    $mail->isHTML(true);
                    $mail->Body = 'Here is your new temporary password'.$new_password;

                    if(!$mail->send()){
                        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
                    }else{
                        echo 'Message has been sent.';
                    }

                } catch (Exception $e) {
                    return response()->with('error','Message could not be sent.');
                }
            } else {
                return redirect('/');
            }
        }
    }
}
