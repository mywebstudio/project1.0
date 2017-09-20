<?php
$ret = array();

if(!Post("phone")) {
    $ret["status"] = 'ERROR';
    $ret["msg"] = "Не указан номер";
    echo json_encode($ret);
}


else {

//error_reporting(E_ALL);
    error_reporting(E_STRICT);

    date_default_timezone_set('msk');


//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

    $mail = new PHPMailer();
    $mail->CharSet = "KOI8-R";

    $body = 'Поступила заявка на обратный звонок с сайта архитек: ' . Post("phone");
    $body = mb_convert_encoding($body, "KOI8-R", "auto");

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

$mail->SetFrom('info@arhitek-group.ru', 'arhitek-group.ru');

$mail->AddReplyTo("info@arhitek-group.ru", "arhitek-group.ru");

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);
$address1 = "info@arhitek-group.ru";
$mail->AddAddress($address1);

$res = $mail->Send();
if($res) {
    $ret["status"] = 'OK';
    $ret["msg"] = $res;
}
echo json_encode($ret);
    
}

?>
