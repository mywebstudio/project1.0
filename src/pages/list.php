<?php

$page     = Get("page", 1);
$per_page = Get("per_page", 9);
$from     = $per_page * ($page - 1);

$new = new ProjectModel();

$filer = array();
$filer["is_removed"] = 1;
$filer["published"] = 1;
$section = "Вся недвижимость";

if (Get("search")) {
    $filer["title,full"] = "%" . Get("search") . "%";
}

$s = ["sort" => 'sort', "featured" => 'featured'];
$cur = 1;
if(Get("sort") == 1) {$s['date'] = 'date'; $cur = 1;};
if(Get("sort") == 2) {$s['price'] = 'price'; $cur = 2;};


$ids   = $new->filter->Filter($filer, $per_page * ($page - 1), $per_page, $s, false);
$total = $new->filter->FilterTotal($filer);
$all = array();
foreach($ids as $id) {
    $all[] = new ProjectModel($id);
}

?>