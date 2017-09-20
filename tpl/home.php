<div class="uk-container uk-container-center">
    <div class="info">
        <div class="uk-slidenav-position uk-margin-top" data-uk-slideshow="{autoplay:true, autoplayInterval:5000}">

            <ul class="uk-slideshow" >
                <?php foreach($slider as $a):?>
                    <li style=" height: 500px;"><div class="uk-cover-background uk-position-cover" style="background-image: url(/image/page_image?file=<?=$a->preview?>&w=1000&h=600&mode=fitout);"></div>
                        <canvas width="1000" height="650" style="width: 100%; height: 500px; opacity: 0;"></canvas>
                        <div class="body uk-hidden-small">
                            <div class="title"><?=$a->title?></div>
                            <p><?=ShortArticleText(200,$a->full)?></p>
                            <a href="/items/<?=$a->alias?>" class="uk-button">Подробнее</a>
                        </div>

                        <div class="b2 uk-visible-small">
                            <div class="title"><?=$a->title?></div>
                            <br>
                            <a href="/items/<?=$a->alias?>" class="uk-button">Подробнее</a>
                        </div>
                    </li>
                <?php endforeach;?>
            </ul>

            <a href="" class="uk-link-reset uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
            <a href="" class="uk-link-reset uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>

        </div>

        <h1>Корвет Крым - агенство недвижимости</h1>
        <p class="uk-column-1-2">Мы предлагаем профессиональные риэлтерские услуги на рынке недвижимости,ориентированные на постоянное
            расширение круга клиентов и построение длительных партнерских взаимоотношений. Для нас самая большая
            награда, когда Вы рекомендуете нас своим друзьям.
            Творческий подход к своему делу, высокое качество работы с клиентом и постоянное стремление к совершенству -
            вот те черты, которые являются визитной карточкой агентства недвижимости «Корвет Крым».
            <br><strong>Наш адрес: генерала Петрова 10</strong>
        </p>


        <div class="uk-container uk-container-center back_4 uk-margin-top">

            <div class="uk-clearfix">
                <h2 class="uk-float-left">Последние предложения</h2>
                <a class="uk-float-right" href="/items" >Посмотреть все предложения</a>
            </div>

            <div class="uk-grid uk-grid-width-xlarge-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-1">

                <?php foreach($hot as $a):?>
                <a href="/items/<?=$a->alias?>" class="uk-link-reset">
                    <div><img src="/image/page_image?file=<?=$a->preview?>&w=250&h=190&mode=fitout"></div>
                    <div><strong><?=$a->title?></strong>
                        <p><?= ShortArticleText(140,$a->full) ?></p>
                        <em><?= $a->price ?></em>
                    </div>
                </a>
                <?php endforeach;?>
            </div>
        </div>

    </div>
</div>



<div class="uk-container uk-container-center">
    <div class="info">
        <div class="uk-clearfix">
            <h2 class="uk-float-left">Последние новости</h2>
            <a class="uk-float-right" href="/pages?section=1" >Посмотреть все</a>
        </div>
        
        <div class="uk-grid uk-grid-width-xlarge-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-1">

            <?php foreach($news as $a):?>
                <a href="/pages/<?=$a->alias?>" class="uk-link-reset">
                    <div><img src="/image/page_image?file=<?=$a->preview?>&w=250&h=190&mode=fitout"></div>
                    <div><strong><?=$a->title?></strong>
                        <p><?= ShortArticleText(140,$a->full) ?></p></div>
                </a>
            <?php endforeach;?>
        </div>
    </div>

</div>



<!--Форма отправки заявок-->
<div class="uk-container uk-container-center">
    <div class="info back_2">


        <div class="uk-grid uk-grid-width-xlarge-1-2 uk-grid-width-medium-1-1 uk-grid-width-small-1-1 no_margin">


            <div>
                <h2>Форма заявки на покупку/аренду недвижимости в Крыму</h2>
                <p>Здесь можно оставить заявку, если вам нужно продать, купить или арендовать недвижимость. Наши
                    специалисты подберут для вас интересные предложения и свяжутся по телефону или эл. почте
                </p>

                <div class="box_form">
                    <form class="uk-form uk-form-horizontal">


                        <div class="uk-grid uk-grid-width-1-2 margin_bot">
                            <div>

                                <div class="uk-grid uk-grid-width-1-2">
                                    <div>Имя:</div><div><input type="text" id="form-h-it" placeholder="Text input"></div>
                                    <div>Телефон:</div><div><input type="text" id="form-h-it" placeholder="Text input"></div>
                                    <div>Эл. почта:</div><div><input type="text" id="form-h-it" placeholder="Text input"></div>
                                </div>

                            </div><div>


                                <div class="uk-grid uk-grid-width-1-2">
                                    <div>Площадь:</div><div><input type="text" id="form-h-it" placeholder="Text input"></div>
                                    <div>Будем:</div><div><select id="form-h-s">
                                            <option>покупать</option>
                                            <option>арендовать</option>
                                        </select></div>
                                    <div>Что:</div><div><select id="form-h-s">
                                            <option>участок</option>
                                            <option>дом</option>
                                        </select></div>

                                </div>

                            </div><div>

                                Для примечаний:

                            </div>
                            <div><textarea id="form-h-t" cols="30" rows="5" placeholder="Textarea text"></textarea></div>


                        </div>




                        <div class="uk-form-row">
                            <button class="uk-button">Отправить</button>
                        </div>

                    </form>
                </div>
            </div>


            <div>
                <h2>Задать вопрос</h2>
                <p></p>

                <div class="box_form">
                    <form class="uk-form uk-form-horizontal">




                        <div class="uk-grid uk-grid-width-1-2  margin_bot">

                            <div>Имя:</div><div><input type="text" id="form-h-it" placeholder="Text input"></div>
                            <div>Телефон:</div><div><input type="text" id="form-h-it" placeholder="Text input"></div>
                            <div>выбор специалиста</div><div><select id="form-h-s">
                                    <option>---</option>
                                    <option>---</option>
                                </select></div>
                            <div>Что:</div><div><select id="form-h-s">
                                    <option>участок</option>
                                    <option>дом</option>
                                </select>
                            </div>
                            <div>Площадь:</div><div><input type="text" id="form-h-it" placeholder="Text input"></div>
                            <div>Для примечаний:</div><div><textarea id="form-h-t" cols="30" rows="5" placeholder="Textarea text"></textarea></div>




                        </div>


                        <div class="uk-form-row">
                            <button class="uk-button">Отправить</button>
                        </div>

                    </form>
                </div>
            </div>



        </div>
    </div>

</div>

