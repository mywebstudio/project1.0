<?php

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('msk');


//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
if(Post("name") and Post("adress") and Post("phone") and Post("datet")) {

    $mail = new PHPMailer();
    $mail->CharSet = "UTF8";

    $body = 'Поступила заявка с сайта от человека по имени ' . Post("name") . ' <br>Его номер: ' . Post("phone") . ' и адресс ' . Post("adress") .
        ' <br>Заказал вызов: ' . Post("date1");
    $body = mb_convert_encoding($body, "UTF8", "auto");

    $mail->IsSMTP(); // telling the class to use SMTP

    $mail->Host = "smtp.xn----9sbhbsgdm3avd0b3c8b.xn--p1ai"; // SMTP server

    $mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->Host = "smtp.xn----9sbhbsgdm3avd0b3c8b.xn--p1ai"; // sets the SMTP server
    $mail->Port = 25;                    // set the SMTP port for the GMAIL server
    $mail->Username = "order@xn----9sbhbsgdm3avd0b3c8b.xn--p1ai"; // SMTP account username
    $mail->Password = "YOOnK2ll";        // SMTP account password

    $mail->SetFrom('stuurgurs@yandex.ru', 'korvet.net');

    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

//    $mail->Subject('Thanks for registering.');
    $mail->MsgHTML($body);
    $address1 = "stuurgurs@yandex.ru";
    $mail->AddAddress($address1);

    $res = $mail->Send();
}


if($res) {
    $ret["status"] = 'OK';
    $ret["msg"] = $res;
} else {
    $ret["status"] = 'ERROR';
    $ret["msg"] = $mail->Send();

}
echo json_encode($ret);

?>

