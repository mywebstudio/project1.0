<head>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</head>

<div class="uk-container uk-container-center">
    <div class="info">
        <ul class="uk-breadcrumb">
            <li><a href="/">Главная</a></li>
            <?php if($article->section != 3):?><li><a href="<?=$sectionlink?>"><?=$section?></a></li><?php endif;?>
            <li class="uk-active"><span><?=$article->title?></span></li>
        </ul>
        
        <h1><?= $article->title ?></h1>


        <p class="uk-text-right">
            <?php foreach ($g_config['realty'] as $key => $l): ?>
            <a href="/items?section=<?= $key ?>"><?= $l ?></a> |
            <?php endforeach; ?>
        </p>

        <div class="ob_ob_box">
            <div class="uk-grid">
                <div class="uk-width-2-5 uk-width-medium-1-2 uk-width-small-1-1">

                    <div class="uk-grid img_ob">
                        <div class="uk-width-1-1">
                            <a href="/image/page_image?file=<?= $article->preview ?>&w=900"
                               data-uk-lightbox="{group:'my-group'}" data-lightbox-type="image">
                                <img src="/image/page_image?file=<?= $article->preview ?>&w=500&h=360&mode=fitout">
                            </a>
                        </div>

                        <?php foreach ($slides as $s): ?>
                            <?php if ($s != $article->preview): ?>
                                <div class="uk-width-1-2">
                                    <a href="/image/page_image?file=<?= $s ?>&w=900"
                                       data-uk-lightbox="{group:'my-group'}" data-lightbox-type="image">
                                        <img src="/image/page_image?file=<?= $s ?>&w=230&h=175&mode=fitout">
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                </div>
                <div class="uk-width-3-5 uk-width-medium-1-2 uk-width-small-1-1">

                    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="//yastatic.net/share2/share.js"></script>
                    <div class="ya-share2  uk-margin-top uk-text-right" data-image="/image/page_image?file=<?=$article->preview?>&w=350"  data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,skype,telegram"></div>

                    <?php if ($article->full): ?>
                        <?= $article->full ?>
                    <?php endif; ?>

                    <?php if ($article->price): ?>
                        <p>Стоимость: <strong><?= $article->price ?></strong></p>
                    <?php endif; ?>

                    <p>
                        +7 (978) 845 74 70 Елена <a href="mailto:mormyl@mail.ru">mormyl@mail.ru</a>
                    </p>


                    <h2>Делати объекта:</h2>

                    <div class="ob_info_mar">
                        <div class="uk-grid uk-grid-width-1-2 ob_info2">
                            <?php if ($article->oblast): ?>
                                <div>Область</div>
                                <div><?= $article->oblast ?></div>
                            <?php endif; ?>

                            <?php if ($article->city): ?>
                                <div>Город</div>
                                <div><?= $article->city ?></div>
                            <?php endif; ?>

                            <?php if ($article->rayon): ?>
                                <div>Район</div>
                                <div><?= $article->rayon ?></div>
                            <?php endif; ?>

                            <?php if ($article->adress): ?>
                                <div>Адрес</div>
                                <div><?= $article->adress ?></div>
                            <?php endif; ?>

                            <?php if ($article->typeofowner): ?>
                                <div>Тип собственности</div>
                                <div><?= $article->typeofowner ?></div>
                            <?php endif; ?>

                            <?php if ($article->square): ?>
                                <div>Общая площать</div>
                                <div><?= $article->square ?></div>
                            <?php endif; ?>

                            <?php if ($article->rooms): ?>
                                <div>Комнат</div>
                                <div><?= $article->rooms ?></div>
                            <?php endif; ?>

                            <?php if ($article->typeofhouse): ?>
                                <div>Тип дома</div>
                                <div><?= $article->typeofhouse ?></div>
                            <?php endif; ?>

                            <?php if ($article->typeofbath): ?>
                                <div>Тип санузла</div>
                                <div><?= $article->typeofbath ?></div>
                            <?php endif; ?>

                            <?php if ($article->heat): ?>
                                <div>Отопление</div>
                                <div><?= $article->heat ?></div>
                            <?php endif; ?>

                            <?php if ($article->floors): ?>
                                <div>Этаж</div>
                                <div><?= $article->floors ?></div>
                            <?php endif; ?>

                            <?php if ($article->comm): ?>
                                <div>Коммуникации</div>
                                <div><?= $article->comm ?></div>
                            <?php endif; ?>


                            <?php if ($article->balkon): ?>
                                <div>Балкон</div>
                                <div><?= $article->balkon ?></div>
                            <?php endif; ?>


                            <?php if ($article->kitchensquare): ?>
                                <div>Площадь кухни</div>
                                <div><?= $article->kitchensquare ?></div>
                            <?php endif; ?>


                        </div>
                    </div>

                    <?php if($article->coord):?>
                        <script>
                            ymaps.ready(init);
                            function init() {

                                var myMap = new ymaps.Map("map", {
                                    center: [<?=$article->coord?>],
                                    zoom: 15
                                }, {
                                    searchControlProvider: 'yandex#search'
                                });

                                myMap.geoObjects
                                    .add(new ymaps.Placemark([<?=$article->coord?>], {
                                        balloonContent: '<?=$article->adress?>',
                                        iconCaption: '<?=$article->title?>'
                                    }, {
                                        preset: 'islands#greenDotIconWithCaption'
                                    }));
                            }
                        </script>
                        <div id="map"></div>
                    <?php endif;?>


                    <div class="">
                        <a href="/items?section=<?=$article->section?>" class="link_ob">назад</a>
                    </div>

                </div>
            </div>
        </div>


        <div class="uk-container uk-container-center back_4 uk-margin-top">
            <div class="uk-clearfix">
                <h2 class="uk-float-left">Другие предложения</h2>
                <a class="uk-float-right" href="/items?section=<?=$article->section?>" >Посмотреть все предложения</a>
            </div>

            <div class="uk-grid uk-grid-width-xlarge-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-1">

                <?php foreach ($hot as $a): ?>
                    <a href="/items/<?= $a->alias ?>" class="uk-link-reset">
                        <div><img src="/image/page_image?file=<?= $a->preview ?>&w=250&h=190&mode=fitout"></div>
                        <div><strong><?= $a->title ?></strong>
                            <p><?= ShortArticleText(140, $a->full) ?></p>
                            <em><?= $a->price ?></em></div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>