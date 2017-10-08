<?php

$today = date("Y-m-d");

$article_id = intval(Get("article_id"));
$article = new ArticleModel($article_id);



$gallery = array();
if ($article_id) {
    $gallery = json_decode($article->gallery, true);
    if(!is_array($gallery)) { $gallery = array(); $gallery[] = json_decode($article->gallery, true); }
}

$new = new ArticleModel();

$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;

$ids = $new->filter->Filter($filer, 0, 100, 'sort', false);

$all = array();
foreach($ids as $id) {
    $all[] = new ArticleModel($id);
}


?>
