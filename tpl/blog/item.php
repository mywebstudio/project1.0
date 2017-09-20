<div id="path_header">
    <div class="site_center">
        <div class="uk-width-1-1">
            <div class="uk-container uk-container-center uk-grid">
                <?php if($section->alias == $article->alias):?>
                    <h1><?= $section->seotitle ? $section->seotitle : $section->title ?></h1>
                <?php else:?>
                    <h1><?= $article->title ?></h1>
                <?php endif;?>
                <div id="path" class="uk-hidden-small uk-width-5-10 uk-float-right"
                     style="max-width:50%; line-height: 86px; text-align: right">
                    <a href="/">Главная</a>
                    <?php if($section->alias == $article->alias):?>
                        / <span><?= $article->title ?></span>
                    <?php else:?>
                        / <a href="/<?=$section->alias?>"><?=$section->title?></a>
                        / <span><?= $article->title ?></span>
                    <?php endif;?>
                </div>


            </div>
        </div>
    </div>
</div>

<div id="content" role="main">
    <div class="uk-width-1-1">
        <div class="uk-container uk-container-center">
            <?php if($section->submenu):?>

                <div class="uk-slidenav-position" data-uk-slider="{infinite: false}">
                    <div class="uk-slider-container"  id="filters">
                        <ul class="uk-slider uk-grid-width-medium-1-4">
                            <?php foreach($submenu as $s):?>
                                <a class="<?= $s->alias == $article->alias ? 'active' : '' ?>" href="/<?=$s->alias?>"><?=$s->title?></a>
                            <?php endforeach;?>
                        </ul>
                    </div>

                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
                </div>


            <?php endif;?>

            <?php if($article->preview and !$section->submenu and ($section->alias != $article->alias)): ?>
                <a href="/image/page_image?file=<?= $article->preview ?>" title="<?= $article->title ?>" data-uk-lightbox="{group:'my-group'}" data-lightbox-type="image" class="cboxElement">
                    <img class="left" src="/image/page_image?file=<?= $article->preview ?>&w=255&h=192&mode=fitout" alt="<?= $article->title ?>">
                </a>
            <?php endif;?>

            <?= $article->full ?>

            <?php if($article->preview): ?>
                <ul class="gallery sep uk-grid uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-4">
                    <?php foreach($slides as $a):?>
                        <li class="clear"><a href="/image/page_image?file=<?=$a?>&w=1600" title="<?=$article->title?>" data-uk-lightbox="{group:'my-group'}" data-lightbox-type="image" class="cboxElement">
                                <img src="/image/page_image?file=<?=$a?>&w=250" class="border" alt="<?=$article->title?>">
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>


            <?php if(strpos(GetCurUrl(),'contacts')) IncludeCom('modules/contacts', array('title' => 'Привет' )) ?>
        </div>
    </div>
</div>


<?php if($section->article_id == 6):?>

    <div id="my-id" class="uk-modal modalSelector">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close" ></a>
            <div class="uk-width-1-1" id="subscribe">
                <div class="uk-panel-space uk-text-center">
                    <div class="">
                        <h1>Подпишитесь на email рассылку статей!</h1>
                    </div>

                    <div class="uk-width-1-1">
                        <div class="uk-margin-top ">
                            <div data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:150}">
                                <input class="uk-form inp uk-width-1-1" required name="email" id="email" type="text" placeholder="Ваш email" maxlength="30">
                            </div>
                        </div>
                        <div class="uk-margin-top">
                            <div data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:450}">
                                <button class="button add">Подписаться</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var modal = UIkit.modal(".modalSelector");
        function get_cookie ( cookie_name )
        {
            var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );

            if ( results )
                return ( unescape ( results[2] ) );
            else
                return null;
        }

        function set_cookie ( name, value, exp_y, exp_m, exp_d, path, domain, secure )
        {
            var cookie_string = name + "=" + escape ( value );

            if ( exp_y )
            {
                var expires = new Date ( exp_y, exp_m, exp_d );
                cookie_string += "; expires=" + expires.toGMTString();
            }

            if ( path )
                cookie_string += "; path=" + escape ( path );

            if ( domain )
                cookie_string += "; domain=" + escape ( domain );

            if ( secure )
                cookie_string += "; secure";

            document.cookie = cookie_string;
        }

        var x = get_cookie ( "email" );

        if (!x) {
            modal.show();
            set_cookie ( "email", "1" );
        }

    </script>

    <script>

        $('.add').click(function () {
            $.ajax({
                url: "/processorModule/email/add",
                type: "POST",
                datatype: 'json',
                data: {
                    email: $('#email').val(),
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>'
                },
                success: function (jsondata) {
                    console.log(jsondata);
                    var res = JSON.parse(jsondata);

                    if (res.status == 'ERROR') {
                        UIkit.notify(res.msg, {status:'danger'});
                    }
                    if (res.status == 'OK') {
                        UIkit.notify("Сообщение отправлено", {status:'success'});
                        location.reload();
                    }
                }
            });
        });
    </script>
<?php endif;?>
