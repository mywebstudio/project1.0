
    <div class="listalka">
        <?php if (empty($arrowLeft)):?>
            <a class="uk-disabled"><i class="uk-icon-angle-double-left"></i></a>
        <?php else:?>
            <a><a href="<?= $arrowLeft?>" title="Previous page"><i class="uk-icon-angle-double-left"></i></a></a>
        <?php endif;?>

        <?php foreach($pagesLeft as $p):?>
            <a><a href="<?= $p["href"]?>" title="Go to page <?= $p["page"]?>"><?= $p["page"]?></a></a>
        <?php endforeach;?>

        <?php if (!empty($pagesLeft)):?>
            <a><span>..</span></a>
        <?php endif;?>


        <?php foreach($pagesCenter as $p):?>
            <?php if ($p["is_active"]):?>
                <a class="active"><span title="Current page is <?= $p["page"]?>"><?= $p["page"]?></span></a>
            <?php else:?>
                <a><a href="<?= $p["href"]?>" title="Go to page <?= $p["page"]?>"><?= $p["page"]?></a></a>
            <?php endif;?>
        <?php endforeach;?>


        <?php if (!empty($pagesRight)):?>
            <a><span>..</span></a>
        <?php endif;?>

        <?php foreach($pagesRight as $p):?>
            <a><a href="<?= $p["href"]?>" title="Go to page <?= $p["page"]?>"><?= $p["page"]?></a></a>
        <?php endforeach;?>

        <?php if (empty($arrowRight)):?>
            <a class="uk-disabled"><i class="uk-icon-angle-double-right"></i></a>
        <?php else:?>
            <a><a href="<?= $arrowRight?>" title="Next page"><i class="uk-icon-angle-double-right"></i></a></a>
        <?php endif;?>
    </div>
