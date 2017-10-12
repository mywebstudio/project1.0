<?php

$today = date("Y-m-d");

$article_id = intval(Get("article_id"));
$article = new ProdModel($article_id);



$gallery = array();
if ($article_id) {
    $gallery = json_decode($article->gallery, true);
    if(!is_array($gallery)) { $gallery = array(); $gallery[] = json_decode($article->gallery, true); }
}


?>
