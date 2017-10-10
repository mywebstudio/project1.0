<?php



$new = new PagesModel();

$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;

$ids   = $new->filter->Filter($filer, 0, 999, 'sort', false);

$pages = array();
foreach($ids as $id) {
    $pages[] = new PagesModel($id);
}




?>