<?php

$page     = Get("page", 1);
$per_page = Get("per_page", 9);
$from     = $per_page * ($page - 1);

$new = new ArticleModel();

$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;


$ids   = $new->filter->Filter($filer, $per_page * ($page - 1), $per_page, 'sort', false);

$all = array();
foreach($ids as $id) {
    $all[] = new ArticleModel($id);
}

?>