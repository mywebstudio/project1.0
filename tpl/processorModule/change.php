<?php


$new = new NewsModel(1);

$new->title = Post('value');


    $ret["status"] = 'OK';

    echo json_encode($ret);


?>
