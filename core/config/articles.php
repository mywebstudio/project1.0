<?php

if (is_file(BASEPATH . 'core/config/browserdatacache.php'))
{
    require_once BASEPATH . 'core/config/browserdatacache.php';
    $g_config['browserdatacache_allow_dirs'][] = BASEPATH . 'tmp/articles_preview/';
}

require_once BASEPATH . 'core/config/main.php';

// Массив секций/разделов. Нужен для админки и фильтрации




$g_config['news'] = array();

define("News", 1);
$g_config['news'][News] = "Новости";


define("Articles", 2);
$g_config['news'][Articles] = "Услуги";

define("PAGES", 3);
$g_config['news'][PAGES] = "Cтраницы";



$g_config['realty'] = array();

define("KVA1", 1);
$g_config['realty'][KVA1] = "1 комнатные квартиры";
define("KVA2", 2);
$g_config['realty'][KVA2] = "2х комнатные квартиры";
define("KVA3", 3);
$g_config['realty'][KVA3] = "3х комнатные квартиры";
define("KVA4", 4);
$g_config['realty'][KVA4] = "4х комнатные квартиры";


define("UCH", 5);
$g_config['realty'][UCH] = "Участки";


define("DOMA", 6);
$g_config['realty'][DOMA] = "Дома";


define("DOMAN", 7);
$g_config['realty'][DOMAN] = "Недострой";

define("COM", 8);
$g_config['realty'][COM] = "Коммерческая недвижимость";



?>