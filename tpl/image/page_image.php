<?php

IncludeCom("image/get_img", array
(
    "srcPath"   => "upl/articles_preview/",
    "tmpPath"   => "tmp/articles_preview/",

    "file"   => Get("file"),
    "mode"   => Get("mode"),
    "width"  => Get("w"),
    "height" => Get("h"),
));
?>