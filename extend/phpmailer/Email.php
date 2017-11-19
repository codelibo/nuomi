<?php
/**
 * Created by PhpStorm.
 * User: liulu
 * Date: 2017/11/19
 * Time: 18:10
 * 发送邮件类库
 */
namespace phpmailer;
class Email {
    public static function send($to, $title, $content) {
        date_default_timezone_set("PRC");
        try {
            $mail = new PHPMailer(true);
//            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = config("email.host");
            $mail->Port = config("email.port");
            $mail->Username = config("email.username");
            $mail->Password = config("email.password");
//            $mail->SMTPSecure = 'ssl';

            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->msgHTML($content);

            $status = $mail->send();
            if ($status) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
