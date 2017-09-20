<?php

$page     = Get("page", 1);
$per_page = Get("per_page", 20);
$from     = $per_page * ($page - 1);

$realty = new ServiceModel();

$filter = array();
$filter["is_removed"] = 0;
$filter["published"] = 1;
if(Get('section')) {
    $filter["section"] = Get('section');
    $section = new SectionsModel(Get('section'));
    if($section->subsection) $subsectionflag = 1;
}
if(Get('alias')) {
    $subsection = Get('alias');
    $filter["subsection"] = "%$subsection%";
    if($subsection) $subsectionflag = 0;
}

$ids   = $realty->filter->Filter($filter,  $per_page * ($page - 1), $per_page, "sort", true);
$total = $realty->filter->FilterTotal($filter);

$all = array();
foreach($ids as $id)
{
    $all[] = new ServiceModel($id);
}


?>