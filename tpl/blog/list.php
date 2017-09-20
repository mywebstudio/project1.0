<div id="path_header">
    <div class="site_center">
        <div class="uk-width-1-1">
            <div class="uk-container uk-container-center uk-grid">

                <?php if(Get('alias') and $section->subsection):?>
                    <h1><?= $g_config['portfolio'][Get('alias')] ?></h1>
                <?php else:?>
                    <h1><?=$section->seotitle ? $section->seotitle : $section->title?></h1>
                <?php endif;?>

                <div id="path" class="uk-hidden-small uk-width-5-10 uk-float-right"
                     style="max-width:50%; line-height: 86px; text-align: right">
                    <a href="/">Главная</a> /
                    <?php if(Get('alias') and $section->subsection):?>
                        <a href="/<?=$section->alias?>"><?= $section->title?></a>
                        / <span><?= $g_config['portfolio'][Get('alias')] ?></span>
                    <?php else:?>
                        <span><?=$section->title?></span>
                    <?php endif;?>

                </div>


            </div>
        </div>
    </div>
</div>

<div id="content" role="main">
<div class="uk-width-1-1">
    <div class="uk-container uk-container-center">



            <div class="uk-grid">
                <?php if(!Get('alias') and $section->subsection):?>
                    <?php $subsection = json_decode($section->subsection);?>
                    <?php  foreach($subsection as $k => $v): $s = new ServiceModel(); $img = $s->getSubsectionImg($k); ?>

                        <article class="item uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3">
                            <h2 class="uk-text-center"><a href="/<?=$k?>">
                                    <?=$v?>
                                    <img src="/image/page_image?file=<?=$img?>&w=300&h=200$mode=fitout" class="border" alt="<?=$v?>" style="max-width:300px; width: 100% margin: 10px">
                                </a></h2>
                        </article>
                    <?php endforeach;?>

                    <?php else:?>

                    <?php foreach($all as $a):?>
                        <article class="item uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3">
                            <h2 class="uk-text-center"><a href="/<?=$a->alias?>"><?=$a->title?></a></h2>
                            <?php if ($a->preview):?>
                                <a href="/<?=$a->alias?>" title="<?=$a->title?>" class="uk-align-center uk-text-center uk-width-1-1">
                                    <img src="/image/page_image?file=<?=$a->preview?>&w=300&h=200$mode=fitout" class="border" alt="<?=$a->title?>" style="max-width:300px; width: 100% margin: 10px">
                                </a>
                            <?php endif;?>
                        </article>
                    <?endforeach;?>
                <?php endif;?>
            </div>



    </div>
    <?php if($total > 20 and !$subsectionflag):?>

                <?php IncludeCom("dev/paginator", array
                (
                    "pageUrl"      => GetCurUrl('page=' . M_PAGINATOR_PAGE),
                    "firstPageUrl" => GetCurUrl('page=' . M_DELETE_PARAM),
                    "total"        => $total,
                    "perPage"      => $per_page,
                    "curPage"      => $page
                ))?>
                <!--Pagination Listed End-->
    <?php endif;?>

</div>
</div>


<?php if(strpos(GetCurUrl(),'articles')):?>

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
