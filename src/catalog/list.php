<?php

$page     = Get("page", 1);
$per_page = Get("per_page", 50);
$from     = $per_page * ($page - 1);

$new = new ArticleModel();

$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;
$filer["section"] = 1;


$ids   = $new->filter->Filter($filer, $per_page * ($page - 1), $per_page, 'sort', false);

$classic = array();
foreach($ids as $id) {
    $classic[] = new ArticleModel($id);
}

$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;
$filer["section"] = 2;


$ids   = $new->filter->Filter($filer, $per_page * ($page - 1), $per_page, 'sort', false);

$modern = array();
foreach($ids as $id) {
    $modern[] = new ArticleModel($id);
}

?>