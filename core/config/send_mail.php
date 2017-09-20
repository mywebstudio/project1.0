<?php

    $g_config['send_mail'] = array();

    // Использовать стандартную функцию mail() вместо PHPMailer. В этом случае SMTP и DKIM не будут работать.
    $g_config['send_mail']['use_def_mail'] = false;
    // Дополнительные хидеры
    $g_config['send_mail']['add_headers']  = array();

    // Debug и логирование
    // Вместо отправки писем сохранять их в файл (полезно при тесте на локальной машине)
    $g_config['send_mail']['save_to_file_only'] = DEBUG_MODE;
    // Если выставлен save_to_file_only, то в конец этого файла будут записываться отправляемые письма (+доп инфа)
    $g_config['send_mail']['save_path_info'] = BASEPATH . 'tmp/emails_test.txt';
    // Если выставлен save_to_file_only, то в этот файл записывается содержимое отправленного письма
    $g_config['send_mail']['save_path_html'] = BASEPATH . 'tmp/emails_test.html';

    // Информация об отправителе
    $g_config['send_mail']['from_email']  = "stuurgurs@yandex.ru" . $_SERVER['SERVER_NAME']; // Email от имени которого отправляем. При использовании smtp, желательно чтобы был равен smtp_user (иначе можно попасть в спам)
    $g_config['send_mail']['from_name']   = "no-reply";          // Имя отправителя

    // SMTP
    $g_config['send_mail']['use_smtp']    = true;            // Использовать отправку через SMTP сервер или нет
    $g_config['send_mail']['smtp_auth']   = true;             // Определяет авторизоваться на smtp сервере или нет. Параметр SMTPAuth у PHPMailer.
    $g_config['send_mail']['smtp_secure'] = "ssl";            // Определяет авторизоваться на smtp сервере или нет (Параметр SMTPSecure у PHPMailer.
    $g_config['send_mail']['smtp_host']   = "smtp.yandex.ru"; // Определяет авторизоваться на smtp сервере или нет (Параметр Host у PHPMailer).
    $g_config['send_mail']['smtp_port']   = 465;              // Определяет авторизоваться на smtp сервере или нет (Параметр Port у PHPMailer).
    $g_config['send_mail']['smtp_user']   = "stuurgurs@yandex.ru"; // Email для авторизации на SMTP сервере.
    $g_config['send_mail']['smtp_pwd']    = "xMiciar144";          // Пароль для авторизации на SMTP сервере.

    // DKIM
    // Приватный и публичный ключи можно сгенерировать здесь: http://www.port25.com/support/domainkeysdkim-wizard/
    $g_config['send_mail']['use_dkim']           = false;       // Использовать DKIM или нет
    $g_config['send_mail']['dkim_domain']        = $_SERVER['SERVER_NAME']; // Имя домена с которого отправляем
    $g_config['send_mail']['dkim_priv_key_path'] = "PATH";      // Путь к файлу с приватным ключём на диске
    $g_config['send_mail']['dkim_selector']      = "email";     // Селектор (по сути любое слово. Для ДНС в итоге выйдет "{$dkim_selector}._domainkey.{$dkim_domain}")
    $g_config['send_mail']['dkim_passphrase']    = "ANYPHRASE"; // Любая фраза

    // Полезные ссылки:
    // http://habrahabr.ru/post/143951/
    // http://habrahabr.ru/post/106589/
    // http://dk1.ca/2012/03/01/ses_dkim_php_route53/
?>
