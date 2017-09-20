<?php

    function LazyPageBegin()
    {
        ob_start();
    }

    function LazyPageEnd()
    {
        $str = ob_get_clean();
        if (Get("is_lazy"))
        {
            ob_end_clean();
            echo $str;
            exit(0);
        }
        else
        {
            echo $str;
        }
    }
?>