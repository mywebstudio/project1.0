<?php
$article_id = new ArticleModel();

$alias = Get("alias");

If ($article_id->Getidfromalias($alias))

    $id = $article_id->Getidfromalias($alias);

else {
    header("http/1.1 404 not found");
    header("Location: " . SiteRoot("404"));
    exit(0);
}


$article  = new ArticleModel($id);


if ($article->is_removed) {
    header("http/1.1 404 not found");
    header("Location: " . SiteRoot("404"));
    exit(0);
}

//счетчик просмотров
$article->counteradd();

$section = $g_config['news'][$article->section];
$sectionlink = "/pages?section=$article->section";

$article->initSEO();

$slides = array();
if($article->gallery) $slides = json_decode($article->gallery);



$articleModel = new ArticleModel();
$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;

$filer["section"] = $article->section;

$ids   = $articleModel->filter->Filter($filer, 0, 4, 'date', true);

$hot = array();
foreach($ids as $id)
{
    if($id != $article->article_id and $article->section != 3 )
    $hot[] = new ArticleModel($id);
}

?>