<?php
$string = GetCurUrl();


$cur = 1;
if(strpos($string, 'pages/list') or strpos($string, 'pages/item'))
    $cur = 2;

if(strpos($string, 'section=1') )
    $cur = 3;

if(strpos($string, 'section=2') )
    $cur = 4;

if(strpos($string, 'alias=about') )
    $cur = 5;

if(strpos($string, 'alias=kontakty') )
    $cur = 6;


$new = new PagesModel();

$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;

$ids   = $new->filter->Filter($filer, 0, 999, 'sort', false);

$pages = array();
foreach($ids as $id) {
    $pages[] = new PagesModel($id);
}




$articleModel = new ArticleModel();
$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;

$ids   = $articleModel->filter->Filter($filer, 0, 50, 'sort', true);

$hot = array();
foreach($ids as $id)
{
    $hot[] = new ArticleModel($id);
}

?>