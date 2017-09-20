<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.12.2016
 * Time: 22:30
 */

$today = date("Y-m-d");
$eventmodel = new EventModel();



$list = '';
$newslist = '';
$bloglist = '';
$reportlist = '';
$poetrylist = '';
$body = '';

$articlemodel = new ServiceModel();
$filter = array();
$filter['is_removed'] = 0;
$filter['is_sent'] = 0;
$filter['published'] = 1;
$ids   = $articlemodel->filter->Filter($filter, 0, 999, "date", true);
$total = $articlemodel->filter->FilterTotal($filter);

foreach ($ids as $id) {
    $a = new ServiceModel($id);
    $list = $list . "<li><a href='https://ayfaar.ru/articles/$a->alias' target='_blank'><strong>$a->title</strong></a></li>";
    $a->is_sent = 1;
    $a->Flush();
}


$body0 = "
<h2>Доброго времени суток! </h2>
<h3>За последнее время на сайте архитек появились следующие обновления:  </h3>";

$body1 = "
<h3>Новые статьи:</h3>
<ul>
    $list
</ul>";


$bodyfooter =  "";




if ($list ) {

//    $save = new SubscrModel();

    $title = "Новости сайта архитек {$today}";

    $emailmodel = new EmailModel();
    $filter2 = array();
    $filter2['is_removed'] = 0;
//    $filter2['article_id'] = 1; 
    $ids2 = $emailmodel->filter->Filter($filter2, 0, 999, "article_id", true);
    $total2 = $emailmodel->filter->FilterTotal($filter2);

    $body1 = $list ? $body1 : "";

    $body = $body0 . $body1 .  $bodyfooter;

//    $save->body = $body;
//    $save->counter = $total2;
//    $resivers = array();

    foreach ($ids2 as $id) {
        $email1 = new EmailModel($id);
        $email1->md5 = md5($email1->article_id);
        $email1->Flush();
        $id = md5($id);
        $uns = "Если вы не хотите в дальнейшем получать рассылку новостей с нашего сайта, пожалуйста, перейдите по этой <a href=''>ссылке.</a>";
        echo $email1->sendEMAIL($email1->email, $title, $body . $uns);
        $uns = "";
//        $resivers[] = $email1->email;
    }
//    $save->receiver = serialize($resivers);
//    $save->is_received = 1;
//    $save->date = date("Y-m-d");
//    $save->Flush();

    //$emailmodel = new EmailModel();
}

?>