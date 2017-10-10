<?php if(strpos(GetCurUrl(), 'processor')):?><?=$content?><?php else: ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>

    <link rel="stylesheet" href="/i/css/common.css">

    <link rel="stylesheet" href="/i/js/ajax/basket.css">

    <link rel="shortcut icon" type="image/x-icon" href="/i/image/favicon.png" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php if (!empty($description)):?><meta name="description" content="<?= $description?>" /><?php endif?>

    <?php if (!empty($keyWords)):?><meta name="keywords" content="<?= $keyWords?>" /><?php endif?>


    <title><?= $title ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="/i/js/jquery-1.8.2.min.js"></script>
    <script src="/i/js/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
    <script src="/i/js/ajax/basket.js"></script>
    <script src="/i/js/core.js"></script>
    <script src="/i/js/modal.js"></script>
    <script src="/i/js/notify.js"></script>
    <script src="/i/js/utility.js"></script>
    <script type="text/javascript" src="/i/js/jscrollpane/jquery.jscrollpane.min.js"></script>


    <link href="/i/js/main/core/css/core.css@1479980028" type="text/css" rel="stylesheet" />
    <link href="/i/components/bitrix/news.list/scavolini-main-page/style.css@1467699452" type="text/css" rel="stylesheet" />
    <link href="/i/styles.css" type="text/css" rel="stylesheet" />
    <link href="/i/css/uikit.css" type="text/css" rel="stylesheet" />
    <link href="/i/css/notify.almost-flat.css" type="text/css" rel="stylesheet" />
    <link href="/i/template_styles.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="/i/js/main/core/core.js@1479980200"></script>
    <script type="text/javascript">(window.BX||top.BX).message({'LANGUAGE_ID':'ru','FORMAT_DATE':'DD.MM.YYYY','FORMAT_DATETIME':'DD.MM.YYYY HH:MI:SS','COOKIE_PREFIX':'BITRIX_SM','USER_ID':'','SERVER_TIME':'1506501238','SERVER_TZ_OFFSET':'10800','USER_TZ_OFFSET':'0','USER_TZ_AUTO':'Y','bitrix_sessid':'0a412930fd02226eb3e2182924711482','SITE_ID':'s1'});(window.BX||top.BX).message({'JS_CORE_LOADING':'Загрузка...','JS_CORE_NO_DATA':'- Нет данных -','JS_CORE_WINDOW_CLOSE':'Закрыть','JS_CORE_WINDOW_EXPAND':'Развернуть','JS_CORE_WINDOW_NARROW':'Свернуть в окно','JS_CORE_WINDOW_SAVE':'Сохранить','JS_CORE_WINDOW_CANCEL':'Отменить','JS_CORE_H':'ч','JS_CORE_M':'м','JS_CORE_S':'с','JSADM_AI_HIDE_EXTRA':'Скрыть лишние','JSADM_AI_ALL_NOTIF':'Показать все','JSADM_AUTH_REQ':'Требуется авторизация!','JS_CORE_WINDOW_AUTH':'Войти','JS_CORE_IMAGE_FULL':'Полный размер'});</script>
    <script type="text/javascript" src="/i/js/main/core/core_ajax.js@1479980382"></script>
    <script type="text/javascript" src="/i/js/main/session.js@1479980304"></script>
    <script type="text/javascript">
        bxSession.Expand(1440, '0a412930fd02226eb3e2182924711482', false, 'f3c12a8351b2fb737e22c896f7aa5ab4');
    </script>
    <script type="text/javascript" src="/i/components/bitrix/menu/horizontal_skavolini/script.js@1467699452"></script>

    
    
    <!-- Следущая строчка нужна для обозначения места вставки объеденённых /i/css/js файлов. Её не следует удалять.-->
    <!-- extraPacker -->


</head>

<body>

        <!-- HEADER -->

        <?php IncludeCom('header') ?>

        <!-- //HEADER -->
        
        
        <?= $content ?>

        

        <!-- FOOTER -->

        <?php IncludeCom('footer') ?>

        <!-- //FOOTER -->

        <script src="/i/js/common.js"></script>

        <script src="/i/js/main.js"></script>
</body>

</html>

<?php endif;?>