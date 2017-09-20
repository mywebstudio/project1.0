<?php


$mail = new PHPMailer();

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

(isset($_POST["summa"])) ? $summa = $_POST["summa"] : $summa  = ' - ';
(isset($_POST["tztype"])) ? $tztype = $_POST["tztype"] : $tztype  = ' - ';
(isset($_POST["country"])) ? $country = $_POST["country"] : $country  = ' - ';
(isset($_POST["borndate"])) ? $borndate = $_POST["borndate"] : $borndate  = ' - ';
(isset($_POST["drivers"])) ? $drivers = $_POST["drivers"] : $drivers  = ' - ';
(isset($_POST["driveexp"])) ? $driveexp = $_POST["driveexp"] : $driveexp  = ' - ';
(isset($_POST["drivecond"])) ? $drivecond = $_POST["drivecond"] : $drivecond  = ' - ';
(isset($_POST["repirecond"])) ? $repirecond = $_POST["repirecond"] : $repirecond  = ' - ';
(isset($_POST["amortizationdepend"])) ? $amortizationdepend = $_POST["amortizationdepend"] : $amortizationdepend  = ' - ';
(isset($_POST["paycount"])) ? $paycount = $_POST["paycount"] : $paycount  = ' - ';
(isset($_POST["damagefranch"])) ? $damagefranch = $_POST["damagefranch"] : $damagefranch  = ' - ';
(isset($_POST["stealfrach"])) ? $stealfrach = $_POST["stealfrach"] : $stealfrach  = ' - ';
(isset($_POST["parking"])) ? $parking = $_POST["parking"] : $parking  = ' - ';
(isset($_POST["validarea"])) ? $validarea = $_POST["validarea"] : $validarea  = ' - ';
(isset($_POST["workarea"])) ? $workarea = $_POST["workarea"] : $workarea  = ' - ';
(isset($_POST["gps"])) ? $gps = $_POST["gps"] : $gps  = ' - ';
(isset($_POST["dealperiod"])) ? $dealperiod = $_POST["dealperiod"] : $dealperiod  = ' - ';
(isset($_POST["bonus"])) ? $bonus = $_POST["bonus"] : $bonus  = ' - ';
(isset($_POST["risks"])) ? $risks = $_POST["risks"] : $risks  = ' - ';
(isset($_POST["addcond"])) ? $addcond = $_POST["addcond"] : $addcond  = ' - ';

$body =  '<html><head></head><body>
    <div>
       <div class="val2"><span>Страхова сума (грн.): </span><span>'.$summa.'</span></div>
       <div class="val2"><span>Тип транспортного засобу: </span><span>'.$tztype.'</span></div>
       <div class="val2"><span>Країна виробник: </span><span>'.$country.'</span></div>
       <div class="val2"><span>Рік випуску: </span><span>'.$borndate.'</span></div>
       <div class="val2"><span>Кількість осіб що будуть керувати ТЗ: </span><span>'.$drivers.'</span></div>
       <div class="val2"><span>Водійський стаж : </span><span>'.$driveexp.'</span></div>
       <div class="val2"><span>Умови експлуатації: </span><span>'.$drivecond.'</span></div>
       <div class="val2"><span>Умови по ремонту: </span><span>'.$repirecond.'</span></div>
       <div class="val2"><span>Врахування зносу: </span><span>'.$amortizationdepend.'</span></div>
       <div class="val2"><span>Кількість страхових платежів: </span><span>'.$paycount.'</span></div>
       <div class="val2"><span>Франшиза на ушкодження: </span><span>'.$damagefranch.'</span></div>
       <div class="val2"><span>Франшиза на викрадення: </span><span>'.$stealfrach.'</span></div>
       <div class="val2"><span>Умови зберігання в нічний час: </span><span>'.$parking.'</span></div>
       <div class="val2"><span>Територія дії договору: </span><span>'.$validarea.'</span></div>
       <div class="val2"><span>Регіон переважного використання: </span><span>'.$workarea.'</span></div>
       <div class="val2"><span>Наявність GPS охран.сигн.: </span><span>'.$gps.'</span></div>
       <div class="val2"><span>Термін дії договору: </span><span>'.$dealperiod.'</span></div>
       <div class="val2"><span>Бонус / малус: </span><span>'.$bonus.'</span></div>
       <div class="val2"><span>Набір ризиків: </span><span>'.$risks.'</span></div>
       <div class="val2"><span>Додаткові умови: </span><span>'.$addcond.'</span></div>
       <br>
       <br>
       <br>
       <div class="val2"><span>Выбранный тариф: </span><span>'.$_POST["prog"].'</span></div>
       <div class="val2"><span>Имя: </span><span>'.$_POST["name"].'</span></div>
       <div class="val2"><span>Телефон: </span><span>'.$_POST["tel"].'</span></div>
       <div class="val2"><span>Email: </span><span>'.$_POST["email"].'</span></div>
    </div>


    </body>
</html>';

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

$mail->SetFrom('order@xn----9sbhbsgdm3avd0b3c8b.xn--p1ai', 'Тест');

$mail->AddReplyTo("order@xn----9sbhbsgdm3avd0b3c8b.xn--p1ai", "Тест");

$mail->Subject = 'Результат рассчёта';

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);
$mail->isHtml(true);

$address = "stuurgurs@yandex.ru";
$address2 = $_POST['email'];
$mail->AddAddress($address);
$mail->AddAddress($address2);

    $mail->Send();

// Соединяемся, выбираем базу данных
$time = new DateTime();
$x =  $time->format('Y-m-d');

$link = mysql_connect($g_config['dbSimple']['hos'], $g_config['dbSimple']['log'], $g_config['dbSimple']['psw'])
or die("Could not connect : " . mysql_error());
mysql_select_db($g_config['dbSimple']['log']) or die("Could not select database");
mysql_query("set names utf8");

mysql_insert('emails', array(
    'id' => '',
    'email' => $_POST['email'],
    'link' => $_POST['URL'],
    'date' => $x,
));

mysql_close($link);



?>