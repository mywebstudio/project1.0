<?php
$article_id = new ProjectModel();

$alias = Get("alias");

If ($article_id->Getidfromalias($alias))

    $id = $article_id->Getidfromalias($alias);

else {
    header("http/1.1 404 not found");
    header("Location: " . SiteRoot("404"));
    exit(0);
}


$article  = new ProjectModel($id);


if ($article->is_removed) {
    header("http/1.1 404 not found");
    header("Location: " . SiteRoot("404"));
    exit(0);
}

//счетчик просмотров
$article->counteradd();

$article->initSEO();


$section = $g_config['realty'][$article->section];
$sectionlink = "/items?section=$article->section";

$slides = array();
if($article->gallery) $slides = json_decode($article->gallery);



$articleModel = new ProjectModel();
$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;

if($article->section) $filer["section"] = $article->section;

$ids   = $articleModel->filter->Filter($filer, 0, 4, 'date', true);

$hot = array();
foreach($ids as $id)
{
    $hot[] = new ProjectModel($id);
}
?>