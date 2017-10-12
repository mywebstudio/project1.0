<?php

if (is_file(BASEPATH . 'core/config/browserdatacache.php'))
{
    require_once BASEPATH . 'core/config/browserdatacache.php';
    $g_config['browserdatacache_allow_dirs'][] = BASEPATH . 'tmp/articles_preview/';
}

require_once BASEPATH . 'core/config/main.php';

// Массив секций/разделов. Нужен для админки и фильтрации



$g_config['article'] = array();

define("actions", 1);
$g_config['article'][actions] = "Акции";

define("articles", 2);
$g_config['article'][articles] = "Статьи";

define("useful", 3);
$g_config['article'][useful] = "Полезное";

define("about", 4);
$g_config['article'][about] = "О нас";


$g_config['print'] = array();

define("digit", 1);
$g_config['print'][digit] = "Цифровая";

define("ofset", 2);
$g_config['print'][ofset] = "Офсетная";

define("trafa", 3);
$g_config['print'][trafa] = "Трафаретная";

define("interno", 4);
$g_config['print'][interno] = "Интерьерная";

define("shiro", 5);
$g_config['print'][shiro] = "Широкоформатная";

define("flexo", 6);
$g_config['print'][flexo] = "Флексопечать";

define("tampo", 7);
$g_config['print'][tampo] = "Тампопечать";

define("disk", 8);
$g_config['print'][disk] = "Печать на дисках";

define("sublim", 9);
$g_config['print'][sublim] = "Сублимационная";


$g_config['prod'] = array();

define("polig", 1);
$g_config['prod'][polig] = "Полиграфия";

define("narug", 2);
$g_config['prod'][narug] = "Наружная реклама";

define("trafa", 3);
$g_config['prod'][trafa] = "Сувенирная продукция";

define("cards", 4);
$g_config['prod'][cards] = "Пластиковые карты";

define("paket", 5);
$g_config['prod'][paket] = "Пакеты полиэтилен";

define("bumaga", 6);
$g_config['prod'][bumaga] = "Пакеты бумажные";

define("karton", 7);
$g_config['prod'][karton] = "Коробки из картона";

define("gofra", 8);
$g_config['prod'][gofra] = "Гофротара";

define("flags", 9);
$g_config['prod'][flags] = "Флаги";

define("vimp", 10);
$g_config['prod'][vimp] = "Вымпелы";

define("diski", 11);
$g_config['prod'][diski] = "Печать на дисках";

define("upakdisk", 12);
$g_config['prod'][upakdisk] = "Упаковки под диски";

define("rolup", 13);
$g_config['prod'][rolup] = "Промостойки и roll up";


?>