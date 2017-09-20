<?php

    ob_start();
        IncludeCom("dev/lazy_page_loader_anim");
    $lazyLoaderAnimation = ob_get_clean();
    $lazyLoaderAnimation = preg_replace('/^\s+|\n|\r|\s+$/m', '', addslashes($lazyLoaderAnimation));
?>