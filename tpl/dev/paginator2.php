<ul class="uk-pagination">
    <?php if (empty($arrowLeft)):?>
        <li class="uk-disabled">
            <a href="#"><i class="uk-icon-angle-double-left"></i></a>
        </li>
    <?php else:?>
        <li class="prev-btn">
            <a href="#"><i class="uk-icon-angle-double-left"></i></a>
        </li>
    <?php endif;?>

    <?php foreach($pagesLeft as $p):?>
        <li><a href="<?= $p["href"]?>" title="Go to page <?= $p["page"]?>"><?= $p["page"]?></a></li>
    <?php endforeach;?>

    <?php if (!empty($pagesLeft)):?>
        <li><span>..</span></li>
    <?php endif;?>


    <?php foreach($pagesCenter as $p):?>
        <?php if ($p["is_active"]):?>
            <li class="uk-active"><span title="Current page is <?= $p["page"]?>"><?= $p["page"]?></span></li>
        <?php else:?>
            <li><a href="<?= $p["href"]?>" title="Go to page <?= $p["page"]?>"><?= $p["page"]?></a></li>
        <?php endif;?>
    <?php endforeach;?>


    <?php if (!empty($pagesRight)):?>
        <li><span>..</span></li>
    <?php endif;?>

    <?php foreach($pagesRight as $p):?>
        <li><a href="<?= $p["href"]?>" title="Go to page <?= $p["page"]?>"><?= $p["page"]?></a></li>
    <?php endforeach;?>

    <?php if (empty($arrowRight)):?>
        <li class="uk-disabled">
            <a href="#"><i class="uk-icon-angle-double-right"></i></a>
        </li>
    <?php else:?>
        <li class="next-btn">
            <a href="#"><i class="uk-icon-angle-double-right"></i></a>
        </li>
    <?php endif;?>
</ul>
