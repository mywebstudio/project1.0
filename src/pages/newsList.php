<?php

$page     = Get("page", 1);
$per_page = Get("per_page", 9);
$from     = $per_page * ($page - 1);

$new = new ArticleModel();

$filer = array();
$filer["is_removed"] = 1;
$filer["published"] = 1;
$section = "Статьи";

if (Get("search")) {
    $filer["title,short,full"] = "%" . Get("search") . "%";
}
if (Get("section")) {
    $section = $g_config['news'][Get("section")];
    $filer["section"] = Get("section");
}
if (Get("square")) {
    $filer["square"] = Get("square");
}
if (Get("city")) {
    $filer["city"] = Get("city");
}
if (Get("featured")) {
    $filer["featured"] = '1';
}
if (Get("minprice") || Get("maxprice"))
{
    Get("minprice") ? $minprice =  Get("minprice") : $minprice = 0;
    Get("maxprice") ? $maxprice =  Get("maxprice") : $maxprice = 10000000000 ;
    $filer["price"] = array("min" => $minprice, "max" => $maxprice);
}

if (Get("square"))
{
    $filer["square"] = array("min" => 0, "max" => Get("square"));
}

$s = ["sort" => 'sort', "featured" => 'featured'];
$cur = 1;
if(Get("sort") == 1) {$s['date'] = 'date'; $cur = 1;};
if(Get("sort") == 2) {$s['price'] = 'price'; $cur = 2;};


$ids   = $new->filter->Filter($filer, $per_page * ($page - 1), $per_page, $s, false);
$total = $new->filter->FilterTotal($filer);
$all = array();
foreach($ids as $id) {
    $all[] = new ArticleModel($id);
}

?>