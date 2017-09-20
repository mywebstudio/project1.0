<?php

require_once BASEPATH . 'core/config/main.php';

// Список mime-типов который используется при отдаче файлов через BrowserDataCache
$g_config['browserdatacache_mime_types'] = array
(
    'aif'  => 'audio/x-aiff',
    'aiff' => 'audio/x-aiff',
    'arc'  => 'application/octet-stream',
    'arj'  => 'application/octet-stream',
    'art'  => 'image/x-jg',
    'asf'  => 'video/x-ms-asf',
    'asx'  => 'video/x-ms-asf',
    'avi'  => 'video/avi',
    'bin'  => 'application/octet-stream',
    'bm'   => 'image/bmp',
    'bmp'  => 'image/bmp',
    'bz2'  => 'application/x-bzip2',
    'css'  => 'text/css',
    'doc'  => 'application/msword',
    'docx' => 'application/msword',
    'dot'  => 'application/msword',
    'dv'   => 'video/x-dv',
    'dvi'  => 'application/x-dvi',
    'eps'  => 'application/postscript',
    'exe'  => 'application/octet-stream',
    'eml'  => 'message/rfc822',
    'gif'  => 'image/gif',
    'gz'   => 'application/x-gzip',
    'gzip' => 'application/x-gzip',
    'htm'  => 'text/html',
    'html' => 'text/html',
    'ico'  => 'image/x-icon',
    'jpe'  => 'image/jpeg',
    'jpg'  => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'js'   => 'application/x-javascript',
    'log'  => 'text/plain',
    'mid'  => 'audio/x-midi',
    'midi' => 'audio/x-midi',
    'mov'  => 'video/quicktime',
    'mpeg' => 'video/mpeg',
    'mpg'  => 'video/mpeg',
    'mpe'  => 'video/mpeg',
    'qt'   => 'video/quicktime',
    'movie'=> 'video/x-sgi-movie',
    'mpga' => 'audio/mpeg',
    'mp2'  => 'audio/mpeg',
    'mp3'  => 'audio/mpeg3',
    'pdf'  => 'aplication/pdf',
    'png'  => 'image/png',
    'rtx'  => 'text/richtext',
    'rtf'  => 'application/rtf',
    'ram'  => 'audio/x-pn-realaudio',
    'rm'   => 'audio/x-pn-realaudio',
    'rpm'  => 'audio/x-pn-realaudio-plugin',
    'ra'   => 'audio/x-realaudio',
    'rv'   => 'video/vnd.rn-realvideo',
    'tar'  => 'application/x-tar',
    'tgz'  => 'application/x-tar',
    'tif'  => 'image/tiff',
    'tiff' => 'image/tiff',
    'txt'  => 'text/plain',
    'text' => 'text/plain',
    'xml'  => 'text/xml',
    'xsl'  => 'text/xml',
    'xl'   => 'application/excel',
    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'swf'  => 'application/x-shockwave-flash',
    'wav'  => 'audio/x-wav',
    'word' => 'application/msword'
);

// Список типо файлов разрешённы для отдачи своего содержимого через BrowserDataCache
$g_config['browserdatacache_allow_filetypes']   = array_keys($g_config['browserdatacache_mime_types']);
$g_config['browserdatacache_allow_filetypes'][] = '.css.gz';
$g_config['browserdatacache_allow_filetypes'][] = '.js.gz';
$g_config['browserdatacache_allow_filetypes'][] = '.gz';
$g_config['browserdatacache_allow_filetypes'][] = '.zip';

// Список папок откуда можно брать файлы
$g_config['browserdatacache_allow_dirs'] = array
(
    /*
    // Вариант когда разрешены все папки
    BASEPATH
    */

    // Вариант более безопасный, предусматривает строгое перечисление хранилищей
    BASEPATH . 'i/',
    BASEPATH . 'tmp/' . $g_config['extrapacker']['dir'] . '/',
    BASEPATH . 'upl/'
);


?>
