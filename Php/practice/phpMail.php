<?php
require '../DesignPattern/PHPMailer-master/PHPMailerAutoload.php';

function sendMail($to, $content)
{
    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host     = 'smtp.sina.cn';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'wangbenjun8@sina.cn';                 // SMTP username
    $mail->CharSet  = "UTF-8";
    $mail->Password = 'wBDEewp6dg';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    //$mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('wangbenjun8@sina.cn', 'JWang');
    $mail->addAddress($to, 'Jun');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('wangbenjun8@sina.cn', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $content;
    //    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

$link = mysqli_connect("localhost", "root", "123456", "blog");
while (true) {
    $sql      = "SELECT * FROM task_list WHERE status = 0 ORDER BY task_id ASC";
    $mailList = [];
    $res      = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $mailList[] = $row;
    }
    if (empty($mailList)) {
        echo "邮件发送完毕,暂无新邮件！\n";
        break;
    } else {
        foreach ($mailList as $key => $item) {
            if (sendMail($item['user_mail'], $key . "Test")) {
                echo $item['user_mail'] . "+++邮件发送成功！\n";
                $sql = "UPDATE task_list SET status = 1 WHERE task_id = {$item['task_id']}";
                mysqli_query($link, $sql);
            } else {
                echo $item['user_mail'] . "+++邮件发送失败!\n";
            }
        }
    }
}
