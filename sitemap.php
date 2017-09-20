
<?php 

 $pageOne = "page"; //@replace
 $page     = Get("page", 1);
    $per_page = Get("per_page", 300);
    $from     = $per_page * ($page - 1);

  $articleModel = new ArticleModel();

    $filter = array();
    $filter["section_id"] = SECTION_ARTICLES; //@replace
    //$filter["lang_id"]    = $g_arrLangs[LANG]['lang_id']; // Раскоментируйте если хотите видеть список только на текущем языке
    $filter["is_removed"] = 0;

    $ids   = $articleModel->filter->Filter($filter, $per_page * ($page - 1), $per_page, "date", true);
    $total = $articleModel->filter->FilterTotal($filter);

    $all = array();
    foreach($ids as $id)
    {
         $all[] = new ArticleModel($id);
		
    }
	
	?>

<?='<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'?>
	
<?php foreach ($all as $a): ?>

<?='<url><loc>http://quantunn.tk/page/' . $a->article_id . "-" . translit($a->available_title) . '</loc>
<lastmod>' . date("Y-m-d", $a->date) . '</lastmod>
<changefreq>weekly</changefreq>
<priority>0.7</priority>
</url>'?>

<?php endforeach;?>

<?='</urlset>'?>

!-- /Pop Up files -->



<table width="800" cellpadding="0" cellspacing="10">
    <tr>
        <td><A href="/livadiya-sky/" class="h2">О комплексе</a></td>
        <td><A href="/livadiya-sky/vizualnyy_vybor/" class="h2">Визуальный  выбор</a></td>
        <td><A href="/livadiya-sky/poisk_po_parametram/" class="h2">Выберите себе квартиру</a></td>
    </tr>
</table>


<div style="position:relative">


    <a href="/livadiya-sky/5/34">
        <div class="visualPoint_sold" style="width:130px; height:134px; top:107px; left:300px; ">
									<span>
										Квартира №34
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/35">
        <div class="visualPoint_sold" style="width:132px; height:134px; top:107px; left:168px; ">
									<span>
										Квартира №35
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/36">
        <div class="visualPoint_sold" style="width:140px; height:125px; top:107px; left:27px; ">
									<span>
										Квартира №36
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/37">
        <div class="visualPoint_sold" style="width:140px; height:175px; top:236px; left:27px; ">
									<span>
										Квартира №37
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/38">
        <div class="visualPoint_sold" style="width:135px; height:144px; top:267px; left:167px; ">
									<span>
										Квартира №38
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/39">
        <div class="visualPoint_sold" style="width:191px; height:144px; top:267px; left:303px; ">
									<span>
										Квартира №39
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/40">
        <div class="visualPoint_sold" style="width:194px; height:144px; top:267px; left:499px; ">
									<span>
										Квартира №40
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/41">
        <div class="visualPoint_sold" style="width:131px; height:144px; top:267px; left:696px; ">
									<span>
										Квартира №41
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/42">
        <div class="visualPoint_sold" style="width:136px; height:141px; top:270px; left:829px; ">
									<span>
										Квартира №42
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/43">
        <div class="visualPoint_sold" style="width:136px; height:165px; top:104px; left:829px; ">
									<span>
										Квартира №43
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/44">
        <div class="visualPoint_sold" style="width:134px; height:139px; top:104px; left:695px; ">
									<span>
										Квартира №44
										<br>(Продано)										<br>
									</span>
        </div>
    </a>
    <a href="/livadiya-sky/5/45">
        <div class="visualPoint_sold" style="width:130px; height:139px; top:104px; left:565px; ">
									<span>
										Квартира №45
										<br>(Продано)										<br>
									</span>
        </div>
    </a>												<div class="floorPlan"><img src="/i/image/_0004096_plan.jpg"></div>
</div>

<div style="margin-top:20px; text-align:center; padding-right:90px;">
    <table align="center"><tr><td width="50">&nbsp;</td>
            <td align="center" width="250"><img src="/i/image/visualPointSold.png" width="20" height="20" border="0" class="b-img-radius"> <br> Продано</td>
            <td align="center" width="250"><img src="/i/image/visualPointOrdered.png" width="20" height="20" border="0" class="b-img-radius"> <br> Предварительная бронь</td>
            <td align="center" width="250"><img src="/i/image/visualPointFree.png" width="20" height="20" border="0" class="b-img-radius"> <br> Свободно</td>
    </table>
</div>