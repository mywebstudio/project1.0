<?php

$new = new ArticleModel();

$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;
$filer["featured"] = 1;

$ids   = $new->filter->Filter($filer, 0, 6, 'sort', true);

$sides = array();
foreach($ids as $id) {
    $sides[] = new ArticleModel($id);
}


?>