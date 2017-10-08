<?php

if (is_file(BASEPATH . 'core/config/browserdatacache.php'))
{
    require_once BASEPATH . 'core/config/browserdatacache.php';
    $g_config['browserdatacache_allow_dirs'][] = BASEPATH . 'tmp/articles_preview/';
}

require_once BASEPATH . 'core/config/main.php';

// Массив секций/разделов. Нужен для админки и фильтрации



$g_config['catalog'] = array();

define("Classic", 1);
$g_config['catalog'][Classic] = "Кухни Классические";

define("Modern", 2);
$g_config['catalog'][Modern] = "Кухни Современные";


?>