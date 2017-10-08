<div class="header-height"></div>
<ul class="breadcrumb-navigation">
    <li><a href="/" title="Главная">Главная</a></li>
    <li><span>&nbsp;&nbsp;&nbsp;&gt;&nbsp;&nbsp;&nbsp;</span></li>
    <li><a href="/catalog" title="Каталог">Каталог</a></li>
</ul>


<main class="content">
    <div class="container product_remove">

        <a name="classic"></a>
        <span style="font-family: Roboto, sans-serif; font-size: 14px;"> </span></h1>

        <h2>Кухни AtlasLux в классическом стиле</h2>

        <div class="cat-items">
            <div class="row">

                <?php foreach($classic as $a): ?>
                    <div class="col-md-4 col-sm-6" itemscope itemtype="http://schema.org/Product">

                        <a title="<?=$a->title?>" href="/catalog/<?=$a->alias?>" class="cat-items__item">
                            <figure>
                                <img itemprop="image" class="item_img" border="0"
                                     src="/image/page_image?w=384&h=384&mode=scale&file=<?=$a->preview?>"
                                     width="384" height="384" alt="<?=$a->title?>" title="<?=$a->title?>"/>

                                <figcaption>
                                    <div class="ci-name"><?=$a->title?></div>

                                    <div class="ci-price">
                                        <div class="price_vert">
                                            <span style="display:none">Цена: </span>
                                            <span class="price"><?=$a->price?></span>
                                        </div>
                                    </div>
                                </figcaption>

                            </figure>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

         <h2>Кухни AtlasLux в современном стиле</h2>

                <div class="cat-items">
                    <div class="row">

                        <?php foreach($modern as $a): ?>
                            <div class="col-md-4 col-sm-6" itemscope itemtype="http://schema.org/Product">

                                <a title="<?=$a->title?>" href="/catalog/<?=$a->alias?>" class="cat-items__item">
                                    <figure>
                                        <img itemprop="image" class="item_img" border="0"
                                             src="/image/page_image?w=384&h=384&mode=scale&file=<?=$a->preview?>"
                                             width="384" height="384" alt="<?=$a->title?>" title="<?=$a->title?>"/>

                                        <figcaption>
                                            <div class="ci-name"><?=$a->title?></div>

                                            <div class="ci-price">
                                                <div class="price_vert">
                                                    <span style="display:none">Цена: </span>
                                                    <span class="price"><?=$a->price?></span>
                                                </div>
                                            </div>
                                        </figcaption>

                                    </figure>
                                </a>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

        <a name="modern"></a>

    </div>
</main>
