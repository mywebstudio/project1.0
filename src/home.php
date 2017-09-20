<?php

$articleModel = new ArticleModel();
$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;
$ids   = $articleModel->filter->Filter($filer, 0, 4, 'date', true);

$hot = array();
foreach($ids as $id)
{
    $news[] = new ArticleModel($id);
}

$articleModel = new ProjectModel();
$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;
$ids   = $articleModel->filter->Filter($filer, 0, 4, 'date', true);

$hot = array();
foreach($ids as $id)
{
    $hot[] = new ProjectModel($id);
}



$articleModel = new ProjectModel();
$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;
$filer["featured"] = 1;
$ids   = $articleModel->filter->Filter($filer, 0, 4, 'sort', true);

$slider = array();
foreach($ids as $id)
{
    $slider[] = new ProjectModel($id);
}


?>