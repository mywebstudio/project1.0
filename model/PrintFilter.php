<?php
    class PrintFilter extends ModelFilter
    {
        protected function PrepareFilter($filter)
        {
            foreach ($filter as $k => $v)
            {
                if ($k === "lang")
                {
                    global $g_arrLangs;
                    if (empty($g_arrLangs[$v]["lang_id"]))
                    {
                        trigger_error("Bad language!", E_USER_ERROR);
                    }
                    $filter["lang_id"] = $g_arrLangs[$v]["lang_id"];
                    unset($filter[$k]);
                }
                else if ($k === "text")
                {
                    $filter["title,short,full"] = $filter[$k];
                    unset($filter[$k]);
                }
            }
            $filter["is_removed"] = 0;
            return $filter;
        }
    }
?>
