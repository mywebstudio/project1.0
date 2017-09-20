<?php

$article_id = new ServiceModel();
$alias = Get("alias");
If ($article_id->Getidfromalias($alias))

    $id = $article_id->Getidfromalias($alias);
else $id = 1;



$article = new ServiceModel($id);

// Подтягиваем галлерею
$slides = json_decode($article->gallery);

if (!$article->IsExists() || $article->is_removed) {
    header("http/1.1 404 not found");
    header("Location: " . SiteRoot("404"));
    exit(0);
}

$section = new SectionsModel($article->section);

$realty = new ServiceModel();

$filter = array();
$filter["is_removed"] = 0;
$filter["published"] = 1;
$filter["section"] = $article->section;

$ids   = $realty->filter->Filter($filter,  0, 20, "sort", false);

$submenu = array();
foreach($ids as $id)
{
    $submenu[] = new ServiceModel($id);
}

?>




