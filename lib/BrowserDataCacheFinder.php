<?php

    require_once BASEPATH . 'lib/BrowserDataCache.php';


    /**
     * Библиотека поиска ресурсов по переданному пути
     *
     * @author Zmi
     */
    class BrowserDataCacheFinder
    {
        // Список разрешений файлов запрос которых запрещён
        private static $disallowFileTypes = array(
                                                    'php3',
                                                    'php4',
                                                    'php', 
                                                    'phps',
                                                    'phtml',
                                                    'phtm',
                                                    'html',
                                                    'htm',
                                                    'xhtml',
                                                    'xhtm',
                                                    'xht'
                                                );

        public static function TryFind($q)
        {
            $file = BASEPATH . $q;
            $ext  = BrowserDataCache::Ext(strtolower($file));
            if (in_array($ext, self::$disallowFileTypes))
            {
                return false;
            }
            BrowserDataCache::OutFile($file);
        }
    };
?>