<?php

$g_config['get_img'] = array();

// Путь к картинке, которая будет показана, если не удалось загрузить оригинальную
$g_config['get_img']['no_image_path'] = BASEPATH . 'i/image/dev/get_img_fail.png';
// Путь для загрузки файлов и картинок
$g_config['get_img']['upl_file_path'] = 'upl/';
// Путь куда сохранять сгенерированные preview изображения
$g_config['get_img']['tmp_file_path'] = 'tmp/';
// Цвет заливки фона
$g_config['get_img']['fill_color']    = array(255, 255, 255);

// Максимально возможная шинира картинки
$g_config['get_img']['max_w'] = 6000;
// Максимально возможная высота картинки
$g_config['get_img']['max_h'] = 5000;

if (is_file(BASEPATH . 'core/config/browserdatacache.php'))
{
    require_once BASEPATH . 'core/config/browserdatacache.php';
    $g_config['browserdatacache_allow_dirs'][] = $g_config['get_img']['upl_file_path'];
    $g_config['browserdatacache_allow_dirs'][] = $g_config['get_img']['tmp_file_path'];
}
?>