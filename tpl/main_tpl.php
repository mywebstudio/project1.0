<?php if(strpos(GetCurUrl(), 'processor')):?><?=$content?><?php else: ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php if (!empty($description)):?><meta name="description" content="<?= $description?>" /><?php endif?>

    <?php if (!empty($keyWords)):?><meta name="keywords" content="<?= $keyWords?>" /><?php endif?>


    <title><?= $title ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    
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