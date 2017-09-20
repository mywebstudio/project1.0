<?php
                                                                                      
    // Выбирает непустой текст и обрезает до нужной длины, добавляя в конце многоточие
    function ShortArticleText($maxLen, $short, $full = "")
    {
        $short = trim(strip_tags($short));
        $full = trim(strip_tags($full));
        if (empty($short)) $short = $full;
        return mb_strlen($short) > $maxLen ? (mb_substr($short, 0, $maxLen) . "...") : $short;
    }    
?>