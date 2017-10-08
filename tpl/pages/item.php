
<div class="header-height"></div>
<ul class="breadcrumb-navigation"><li><a href="/" title="Главная">Главная</a></li><li><span>&nbsp;&nbsp;&nbsp;&gt;&nbsp;&nbsp;&nbsp;</span></li>
    <li><a href="/catalog" title="Каталог">Каталог</a></li><li><span>&nbsp;&nbsp;&nbsp;&gt;&nbsp;&nbsp;&nbsp;</span></li>
    <li><?=$article->title?></li>
</ul>


<main class="content">
    <div class="container product_remove">
        <h1><?=$article->title?></h1>

        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="slider-min">

                        <div class="slider-min__slider">
                            <?php foreach($slides as $a):?>
                            <figure data-thumb="/image/page_image?w=77&h=77&mode=fitout&file=<?=$a?>" data-src="/image/page_image?file=<?=$a?>">
                                <img src="/image/page_image?w=860&h=585&mode=fitout&file=<?=$a?>">
                            </figure>
                            <?php endforeach;?>

                        </div>

                    </div>
                </div>
                <div class="col-md-3">

                    <div class="under-slider-btns">
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="#modal-calc" class="under-slider-btns__item add_to_cart_button" id="add_to_cart_button" data-uk-modal>
                                    <i class="fa fa-calculator"></i>
                                    <span>Онлайн расчёт</span>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#modal-vizov" class="under-slider-btns__item" data-uk-modal>

                                    <span>Вызов замерщика</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <b><span>Стоимость: </span><?=$article->price?></b>

                    <?=$article->short?>
                </div>
            </div>


        </div>

        <div class="container"> <!-- Описание -->
            <h2>Описание:</h2>
            <?=$article->full ?>

        </div>
    </div>

    <!-- This is the modal -->
    <div id="modal-calc" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-width-1-1 uk-modal-container">

                <h2 class="uk-margin">Заявка на рассчёт</h2>

                <div class="uk-width-1-1">


                    <div class="uk-form-select uk-width-1-1" data-uk-form-select>
                        <span></span>
                        <select class=" uk-width-1-1" id="mod">
                            <option value="">Выбрать модель кухни</option>
                            <?php foreach ($hot as $a):?>
                                <option value="<?=$a->title?>" ><?=$a->title?></option>
                            <?php endforeach;?>
                        </select>
                    </div>


                    <p class="uk-text-center uk-text-bold uk-h4 uk-width-1-1  uk-margin-large-top">Стиль</p>
                    <form class="uk-form">
                        <fieldset data-uk-margin>
                            <label><input type="radio" name="sty" value="Классический"> Классический</label>
                            <label class="uk-margin-large-left" ><input type="radio" name="sty" value="Современный"> Современный</label>
                        </fieldset>
                    </form>


                    <p class="uk-text-center uk-text-bold uk-h4 uk-width-1-1  uk-margin-large-top">Расположение кухни</p>
                    <form class="uk-form">
                        <fieldset data-uk-margin>
                            <label><input type="radio" name="rasp" value="a">  <img src="/i/image/1.png" class="uk-margin-left uk-margin-top"></label>
                            <label class="uk-margin-large-left"><input type="radio" name="rasp" value="b"> <img src="/i/image/2.png" class="uk-margin-left uk-margin-top"></label>
                            <br>

                            <label><input type="radio" name="rasp" value="c"> <img src="/i/image/3.png" class="uk-margin-left uk-margin-top"></label>
                            <label class="uk-margin-large-left"><input type="radio" name="rasp" value="d"> Другая</label>
                        </fieldset>
                    </form>

                    <p class="uk-text-center uk-text-bold uk-h4 uk-width-1-1  uk-margin-large-top">Контактная информация</p>

                    <div class="uk-form-row uk-form-icon   uk-width-1-1">
                        <input id="name" class="uk-width-1-1 required" placeholder="Ваше Имя"  type="text">
                    </div>

                    <div class="uk-form-row uk-form-icon   uk-width-1-1">
                        <input id="phone" class="uk-width-1-1 required" placeholder="Ваш телефон" type="text">
                    </div>

                    <div class="uk-form-row uk-form-icon   uk-width-1-1">
                        <input name="email" id="email" class="uk-width-1-1" placeholder="Ваш Email" type="text">
                    </div>

                    <div class="uk-form-row uk-form-icon   uk-width-1-1">
                        <textarea rows="7" id="coment" class="uk-width-1-1" >Комментарии, размеры помещения и прочее</textarea>
                    </div>
                    
                </div>
            </div>

            <div class="uk-width-1-1 uk-flex uk-flex-center">
                <a class="under-slider-btns__item" id="mail1">Отправить</a>
            </div>
        </div>
    </div>

    <!-- This is the modal -->
    <div id="modal-vizov" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-width-1-1 uk-modal-container">

                <h2 class="">Вызов замерщика</h2>

                <div class="uk-width-1-1">
                    <div class="uk-form-row uk-form-icon   uk-width-1-1">
                        <input name="name2" id="name2" class="uk-width-1-1" required="required" type="text" placeholder="Ваше Имя">
                    </div>

                    <div class="uk-form-row uk-form-icon   uk-width-1-1">
                        <input name="phone2" id="phone2" class="uk-width-1-1 required" required="required" type="text" placeholder="Телефон">

                    </div>

                    <div class="uk-form-row uk-form-icon   uk-width-1-1">
                        <input name="adres2" id="adres2" class="uk-width-1-1" type="text" placeholder="Адрес">
                    </div>

                    <div class="uk-form-row">
                        <input  id="datet" type="date">
                    </div>

                </div>
            </div>

            <div class="uk-width-1-1 uk-flex uk-flex-center">
                <a class="under-slider-btns__item" id="mail2">Отправить</a>
            </div>
        </div>
    </div>

    <script>
        $('#mail1').click(function () {
            var modal = UIkit.modal("#modal-calc");
            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var coment = $('#coment').val();
            var mod = $('#mod').val();
            var style = $('input:radio[name=sty]:checked').val();
            var rasp = $('input:radio[name=rasp]:checked').val();

            
            if(name && phone && email && mod && style && rasp)
                $.ajax({
                    url: "/processorModule/mail1",
                    type: "POST",
                    datatype: 'json',
                    data: {
                        name: name,
                        phone: phone,
                        email: email,
                        coment: coment,
                        mod: mod,
                        style: style,
                        rasp: rasp
                    },

                    success: function (jsondata) {
                        console.log(jsondata);
                        var res = JSON.parse(jsondata);

                        if (res.status == 'ERROR') {
                            UIkit.notify("Сообщение не отправлено " , {status:'error'});
                            modal.hide();
                        }
                        if (res.status == 'OK') {
                            UIkit.notify("Сообщение отправлено", {status:'success'});
                            modal.hide();
                        }
                    }
                });
            else
                UIkit.notify("Сообщение не отправлено, не заполнены обязательные поля - имя, телефон, email", {status:'error'});
        });
    </script>

    <script>
        $('#mail2').click(function () {
            var modal = UIkit.modal("#modal-vizov");
            var name = $('#name2').val();
            var phone = $('#phone2').val();
            var adres = $('#adres2').val();
            var datet = $('#datet').val();


            if(name && phone && adres && datet)
                $.ajax({
                    url: "/processorModule/mail2",
                    type: "POST",
                    datatype: 'json',
                    data: {
                        name: name,
                        phone: phone,
                        adress: adres,
                        datet: datet
                    },

                    success: function (jsondata) {
                        console.log(jsondata);
                        var res = JSON.parse(jsondata);

                        if (res.status == 'ERROR') {
                            UIkit.notify("Сообщение не отправлено " , {status:'error'});
                            modal.hide();
                        }
                        if (res.status == 'OK') {
                            UIkit.notify("Сообщение отправлено", {status:'success'});
                            modal.hide();
                        }
                    }
                });
            else
                UIkit.notify("Сообщение не отправлено, не заполнены обязательные поля - имя, адрес, email", {status:'error'});
        });
    </script>

</main>