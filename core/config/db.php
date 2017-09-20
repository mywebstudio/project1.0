<?php

    /**
     * Конфиг работы с БД
     *
     * @author Zmi
     */


    $g_config['dbSimple']               = array();
    $g_config['dbSimple']['logDbError'] = true;
    $g_config['dbSimple']['dbLogFile']  = BASEPATH . 'tmp/log_db.txt';
    $g_config['dbSimple']['psw']  = '';
    $g_config['dbSimple']['log']  = '';
    $g_config['dbSimple']['hos']  = '';

    // Имена БД объектов
    $g_config['dbSimple']['databases'] = array
    (
        // Пример: (обращаться потом можно будет к $g_databases->db)
        // Раскоментируйте следующий блок, если собираетесь использовать базы данных в своём проекте
        'db' => array
                    (
                        'dsn'        => DEBUG_MODE ?
                                            'mysql://root:@localhost/DataBaseName?charset=UTF8' : // Если локалка то локальная БД
                                            'mysql://login:pass@host/database?charset=UTF8',    // Если сервер то настоящая БД
                        'pCacheFunc' => '' // Указатель на функцию кеширования данных. Для кеширования в запросах пишите перед текстом запроса "-- CACHE: 10m\n" (10m - ttl кеша)
                    )
        
    );
?>