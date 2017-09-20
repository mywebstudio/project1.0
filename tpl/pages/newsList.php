
<div class="uk-container uk-container-center">
    <div class="info">
        <h1><?=$section?></h1>

        <div class="ob_ob_box_no_back">


            <?php foreach($all as $a):?>
                <div class="uk-grid  uk-grid-collapse ob_ob_box">
                    <div class="uk-width-1-3 uk-width-medium-1-3 uk-width-small-1-1 img_100">
                        <a href="/pages/<?=$a->alias?>?section=<?=Get("section")?>">
                            <img src="/image/page_image?file=<?=$a->preview?>&w=300&h=220&mode=fitout">
                        </a>
                    </div>
                    <div class="uk-width-2-3 uk-width-medium-2-3 uk-width-small-1-1">
                        <div class="ob_margin_left">
                            <h2><?=$a->title?></h2>
                            <div class="uk-grid uk-grid-width-1-2 ob_info">
                                <div class="uk-text-muted uk-width-1-1"><?=$a->date?></div>
                                <?php if($a->short):?>
                                    <?=$a->short?>
                                <?php endif;?>

                                <div class="uk-width-1-1 no_border">
                                    <a href="/pages/<?=$a->alias?>?section=<?=Get("section")?>" class="link_ob">читать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>



        </div>

        <?php IncludeCom("dev/paginator2", array
        (
            "pageUrl"      => GetCurUrl('page=' . M_PAGINATOR_PAGE),
            "firstPageUrl" => GetCurUrl('page=' . M_DELETE_PARAM),
            "total"        => $total,
            "perPage"      => $per_page,
            "curPage"      => $page
        ))?>
        <!--Pagination Listed End-->


    </div>

</div>


