

<div class="uk-container uk-container-center">
    <div class="info">
        <ul class="uk-breadcrumb">
            <li><a href="/">Главная</a></li>
            <?php if($article->section != 3):?><li><a href="<?=$sectionlink?>"><?=$section?></a></li><?php endif;?>
            <li class="uk-active"><span><?=$article->title?></span></li>
        </ul>
        
        <h1><?=$article->title?></h1>


        <div class="ob_ob_box">
            <div class="uk-grid">

                <div class="uk-width-1-1 uk-width-medium-1-1 uk-width-small-1-1 uk-margin-top">

                    <?php if($article->section != 3):?>
                        <div class="uk-float-left uk-text-muted">
                            <?=$article->date?>
                        </div>
                    <?php endif;?>

                    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="//yastatic.net/share2/share.js"></script>
                    <div class="ya-share2 uk-margin-top uk-text-right" data-image="/image/page_image?file=<?=$article->preview?>&w=350" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,skype,telegram"></div>


                    <?php if($article->preview):?>
                        <img src="/image/page_image?file=<?=$article->preview?>&w=350" class="uk-float-left uk-margin-right uk-margin-top">
                    <?php endif;?>

                    <?php if($article->full):?>
                        <?=$article->full?>
                    <?php endif;?>

                    <?php if($article->section != 3):?>
                        <div class="">
                            <a href="/pages?section=<?=$article->section?>" class="link_ob">назад</a>
                        </div>
                    <?php endif;?>

                </div>
            </div>
        </div>

        <?php if($hot):?>
            <div class="uk-container uk-container-center back_4 uk-margin-top">

                <div class="uk-clearfix">
                    <h2 class="uk-float-left">Другие статьи</h2>
                    <a class="uk-float-right" href="/pages?section=1" >Посмотреть все</a>
                </div>

                <h2></h2>

                <div class="uk-grid uk-grid-width-xlarge-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-1">

                    <?php foreach($hot as $a):?>
                        <a href="/pages/<?=$a->alias?>" class="uk-link-reset">
                            <div><img src="/image/page_image?file=<?=$a->preview?>&w=250&h=190&mode=fitout"></div>
                            <div><strong><?=$a->title?></strong>
                                <p><?= ShortArticleText(140,$a->full) ?></p></div>
                        </a>
                    <?php endforeach;?>
                </div>
            </div>
        <?php endif;?>

    </div>
</div>

