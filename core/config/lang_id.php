<?php

require_once BASEPATH . 'core/config/main.php';

// Сюда нужно добавлять новые языки
//@todo поместить в отдельный компонент

define("LANG_ID_EN", 1); // Просто уникальный id, может быть любой цифрой больше 0
define("LANG_ID_RU", 2); // Просто уникальный id, может быть любой цифрой больше 0

$g_arrLangs['en']['lang_id'] = LANG_ID_EN;
$g_arrLangs['ru']['lang_id'] = LANG_ID_RU;

// Небольшая защита от дурака
$u = array();
foreach ($g_arrLangs as $k => $v)
{
    if (!isset($v['lang_id']))
    {
        trigger_error('Did you forgot to set $g_arrLangs["' . $k . '"]["lang_id"] = ...?', E_USER_ERROR);
    }
    if (isset($u[$v['lang_id']]))
    {
        trigger_error('Language id ("lang_id") for language "' . $k . '" is already in use', E_USER_ERROR);
    }
    $u[$v['lang_id']] = 1;
}
?>
