<?php

namespace IP;

require "../../DesignPattern/PHPMailer-master/PHPMailerAutoload.php";

class MyIp
{
    protected $url;

    protected $mailTo;

    protected $sql_conn;

    protected $ip;

    public function __construct($url)
    {
        $this->url = $url;
        try {
            $this->sql_conn = mysqli_connect("localhost", 'root', '123456', 'blog', 3306);
        } catch (\Exception $e) {
            print_r($e->errorMessage());
        }
    }

    public function run()
    {
        $this->getMyIp();
        if ($this->isIpChange()) {
            $this->mailToAdmin();
        }
        $this->saveIp();
    }

    public function setMailTo($mailTo)
    {
        $this->mailTo = $mailTo;
    }

    public function getMyIp()
    {
        $res      = $this->curl();
        $res      = json_decode(substr($res, strpos($res, '=') + 2, -1));
        $this->ip = $res->cip;
    }

    public function mailToAdmin()
    {
        $mail = new \PHPMailer();
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host       = 'smtp.163.com';                           // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                               // Enable SMTP authentication
            $mail->Username   = 'wangbenjun8@163.com';                 // SMTP username
            $mail->Password   = '********';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to
            $mail->CharSet    = 'utf-8';
            //Recipients
            $mail->setFrom('wangbenjun8@163.com', 'jwang');
            $mail->addAddress($this->mailTo, 'jwang');     // Add a recipient
            $mail->addReplyTo('wangbenjun8@163.com', 'jwang');
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = '当前的IP地址';
            $mail->Body    = "<p>当前外网IP地址为：</p>" . $this->ip;
            $mail->send();
            echo "Message has been sent\n";
        } catch (\Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }


    public function curl()
    {
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $this->url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, false);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);

        //显示获得的数据
        return $data;
    }

    public function saveIp()
    {
        $now = date("Y-m-d H:i:s", time());
        $sql = "insert into ip(updated_at,ip) VALUES ('$now', '$this->ip')";

        return mysqli_query($this->sql_conn, $sql);
    }

    public function isIpChange()
    {
        $sql   = "SELECT ip FROM ip WHERE STATUS = 0 ORDER BY id DESC LIMIT 1";
        $query = mysqli_query($this->sql_conn, $sql);
        $res   = mysqli_fetch_assoc($query);
        if ($res['ip'] == $this->ip) {
            return false;
        }

        return true;
    }
}
