<?php
$article_id = new PagesModel();

$alias = Get("alias");

If ($article_id->Getidfromalias($alias))

    $id = $article_id->Getidfromalias($alias);

else {
    header("http/1.1 404 not found");
    header("Location: " . SiteRoot("404"));
    exit(0);
}


$article  = new PagesModel($id);


if ($article->is_removed) {
    header("http/1.1 404 not found");
    header("Location: " . SiteRoot("404"));
    exit(0);
}

//счетчик просмотров
$article->counteradd();

$article->initSEO();


$slides = array();
if($article->gallery) $slides = json_decode($article->gallery);



$articleModel = new PagesModel();
$filer = array();
$filer["is_removed"] = 0;
$filer["published"] = 1;

$ids   = $articleModel->filter->Filter($filer, 0, 50, 'sort', true);

$hot = array();
foreach($ids as $id)
{
    $hot[] = new PagesModel($id);
}
?>