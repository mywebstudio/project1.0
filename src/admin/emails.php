<?php

    $flashParam = new FlashParam();
    $msg = $flashParam->Get('msg');

    $page     = Get("page", 1);
    $per_page = Get("per_page", 20);
    $from     = $per_page * ($page - 1);


    $articleModel = new EmailModel();

    $filer = array();

    $ids   = $articleModel->filter->Filter($filer, $per_page * ($page - 1), $per_page, 'article_id', true);
    $total = $articleModel->filter->FilterTotal($filer);

    $all = array();
    foreach($ids as $id)
    {
        $all[] = new EmailModel($id);
    }
?>
