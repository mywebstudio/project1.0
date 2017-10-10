<footer>
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-6 foot-info">
                <div class="foot-info__logo"></div>

                <div class="foot-info__text">Официальный дилер фабрики Atlas Lux в Севастополе</div>
                <a href="tel:+74957489519" class="foot-info__phone" >+7 (978) 207-07-67</a> 	<a href="mailto:info@scavolini-shop.ru" class="foot-info__mail" >atlaslux-sev@mail.ru</a>
                <div class="foot-info__text">Отрадная 15/1 (возле ТЦ Новацентр) </div>
                <a href="/pages-kontakty" class="foot-info__mail" style="text-decoration: underline" >Схема проезда</a> </div>


            <nav class="col-md-3 col-sm-6 foot-nav">
                <ul>
                    <li><a href="/catalog/#classic" >Кухни КЛАССИКА</a></li>

                    <li><a href="/catalog/#modern" >Кухни МОДЕРН</a></li>

                </ul>
            </nav> <nav class="col-md-3 col-sm-6 foot-nav">
                <ul>

                    <?php foreach($pages as $p):?>
                        <li><a href="/pages-<?=$p->alias?>"title="<?=$p->title?>"><?=$p->title?></a></li>
                    <?php endforeach;?>

                </ul>
            </nav>		</div>
    </div>
</footer>