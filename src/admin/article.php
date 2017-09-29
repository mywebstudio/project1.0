<?php

$today = date("Y-m-d");

$article_id = intval(Get("article_id"));
$article = new ArticleModel($article_id);



$gallery = array();
if ($article_id) {
    $gallery = json_decode($article->gallery, true);
    if(!is_array($gallery)) { $gallery = array(); $gallery[] = json_decode($article->gallery, true); }
}


?>
