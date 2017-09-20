<?php if(strpos(GetCurUrl(), 'processor')):?><?=$content?><?php else: ?>

<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <?php if (!empty($description)):?><meta name="description" content="<?= $description?>" /><?php endif?>

    <?php if (!empty($keyWords)):?><meta name="keywords" content="<?= $keyWords?>" /><?php endif?>
    

        <meta name="google-site-verification" content="RCpwxVWWa1aOAdgUM6KQMiGUaz7tTtB6hlUNOTqzF1A">

        <title><?= $title ?></title>

        <meta name="description" content="Мы предлагаем профессиональные риэлтерские услуги на рынке недвижимости,ориентированные на постоянное расширение круга клиентов и построение длительных партнерских взаимоотношений. Для нас самая большая награда, когда Вы рекомендуете нас своим друзьям.

Творческий подход к своему делу, высокое качество работы с клиентом и постоянное стремление к совершенству - вот те черты, которые являются визитной карточкой агентства недвижимости «Корвет Крым». ">

        <meta name="keywords" content="купить квартиру в севастополе, купить учаток у моря, недорогой участок в севастополе, участок на фиоленте, купить участок в казачке, участок ижс,видовая квартира, видовой участок, рядом с морем, участки в орловке, дом у моря в севастополе">

        <meta http-equiv="content-type" content="text/html; charset=windows-1251">

        <link rel="stylesheet" href="/i/css/other.css" type="text/css">

        <link rel="stylesheet" href="/i/css/body.css" type="text/css">

        <link rel="stylesheet" href="/i/css/global.css" type="text/css">    
    

    <!-- Следущая строчка нужна для обозначения места вставки объеденённых /i/i/css/js файлов. Её не следует удалять.-->

    <!-- extraPacker -->
    

    <?php IncludeCom('dev/uikit')?>


    <!-- МОЙ ДОПОЛНИТЕЛЬНЫЙ СТИЛЬ -->
<link rel="stylesheet" type="text/css" href="/i/css/style_my.css" />

</head>

<body>

        <!-- HEADER -->

        <?php IncludeCom('header') ?>

        <!-- //HEADER -->
        
        
        <?= $content ?>

        

        <!-- FOOTER -->

        <?php IncludeCom('footer') ?>

        <!-- //FOOTER -->

</body>

</html>

<?php endif;?>