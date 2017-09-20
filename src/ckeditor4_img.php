<?php

    IncludeCom("dev/get_img", array
    (
        "srcPath"   => "upl/" . $g_config['ckeditor4']['upl_dir'] . "/",
        "tmpPath"   => "tmp/" . $g_config['ckeditor4']['upl_dir'] . "/",

        "file"   => Get("file"),
        "mode"   => Get("mode"),
        "width"  => Get("w"),
        "height" => Get("h"),
    ));
?>
