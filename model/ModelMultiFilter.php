<?php

    /**
     * DB helper
     *
     * Класс позволяет реализовать лёгкий и быстрый фильтр элементов таблицы.
     * Аналогичен классу ModelFilter за тем исключением что с главной таблицей можно 
     *  связать дополнительные и использовать их в фильтре элементов.
     *
     * Ограничения:
     * - у таблицы обязательно должен быть один PRIMARY KEY
     *
     * @author GUUL
     */
    class ModelMultiFilter extends ModelFilter
    {
        protected $table = NULL; // Главная таблица
        protected $key   = NULL; // Ключевое поле в главное таблице (которое будет извлекаться)
        protected $db    = NULL; // База данных

        protected $conns   = array(); // Список связей с другими таблицами вида array("table1", "key1", "table2", "key2")
        protected $allCols = array(); // Список таблиц и их колонок вида array("t1" => array("f1", "f2"), "t2" => array("d1", "d2"))

        //ModelMultiFilterForArticle($g_databases->db,
        //                                                       "articles", "article_id", array("article_id", "section_id", "is_removed", "preview", "date"),
        //                                                       array(
        //                                                           "article_texts" => array("article_id", "lang_id", "title", "short", "full")
        //                                                       ),
        //                                                       array(
        //                                                           array("articles", "article_id", "article_texts", "article_id")
        //                                                           //array(
        //                                                           //      "table1" => "articles",      "field1" => "article_id",
        //                                                           //      "table2" => "article_texts", "field2" => "article_id"
        //                                                           //     )
        //                                                  ));

        // array("t1", "k1", "t2", "k2") -> array("t1", "t2")
        protected function _GetTables($conns)
        {
            $ret = array();
            foreach ($conns as $c)
            {
                if (count($c) != 4)
                {
                    trigger_error("Invalid conn array! It must bemust be (t1, k1, t2, k2)", E_USER_ERROR);
                }
                $ret[$c[0]] = 1;
                $ret[$c[2]] = 1;
            }
            return array_keys($ret);
        }

        // Дополняет массив $allCols другими таблицами и их колонками
        protected function _GetCols($allTables, $allCols)
        {
            //xmp("->");xmp($allTables);
            if (empty($allCols)) $allCols = array();
            foreach ($allTables as $t)
            {
                if (empty($allCols[$t]))
                {
                    //xmp($t);xmp($this->SelCols($t));
                    $allCols[$t] = $this->SelCols($t);
                    //if (count($this->SelCols($t)) == 0) trigger_error("", E_USER_ERROR);
                }
            }//xmp(">");xmp($allCols);
            return $allCols;
        }

        // "key1" -> array("table1", "key1")  or  "table1.key1" -> array("table1", "key1") + check
        protected function _FindTableKey($key) 
        {
            $allCols = $this->allCols;
            $r = explode(".", $key);
            if (count($r) == 1)
            {
                foreach ($allCols as $t => $c)
                {
                    if (in_array($key, $c))
                    {
                        return array($t, $key);
                    }
                }
            }
            else if (count($r) == 2)
            {
                $t = $r[0];
                $c = $r[1];
                if (isset($allCols[$t]) && in_array($c, $allCols[$t]))
                {
                    return array($t, $c);
                }
            }
            xmp($allCols);
            trigger_error("Invalid key '{$key}'!", E_USER_ERROR);
        }

        // array("t1", "k1", "t2", "k2") -> "t1.k1 = t2.k2"
        private function _BuildConnStr(&$retQuery, &$retArgs)
        {
            $list = array();
            foreach ($this->conns as $c)
            {
                $list[]  = "?#.?# = ?#.?#";
                $retArgs = array_merge($retArgs, $c);
            }
            $retQuery .= implode(" AND ", $list);
            return count($list) > 0;
        }

        //public function __construct($db, $table, $key, $filterKeys, $connTables, $connTablesLinks)
        public function __construct($db, $conns, $table, $key = NULL, $allCols = NULL)
        {
            if (!is_array($conns[0])) $conns = array($conns);

            $this->db    = $db;
            $this->table = $table;

            $this->key = empty($key) ? $this->SelKey($table) : $key;

            if (empty($db) || empty($table) || empty($this->key))
            {
                trigger_error("Invalid input data!", E_USER_ERROR);
            }

            //** Получаем список таблиц

            $allTables = $this->_GetTables($conns);
            if (!in_array($this->table, $allTables))
            {
                trigger_error("Invalid input data!", E_USER_ERROR);
            }

            //** Извлекаем столблцы для каждой таблицы

            $this->allCols = $this->_GetCols($allTables, $allCols);
            if (!in_array($this->key, $this->allCols[$this->table]))
            {
                trigger_error("Invalid key '{$this->key}' for table '{$this->table}'!", E_USER_ERROR);
            }

            //** Проверяем связи
            foreach ($conns as $c)
            {
                if (count($c) != 4)
                {
                    trigger_error("Invalid conn array! It must bemust be (t1, k1, t2, k2)", E_USER_ERROR);
                }
                // Если не будет найдено то получим триггер эррор: (но таблица может быть еще не создана)
                //$this->_FindTableKey("{$c[0]}.{$c[1]}");
                //$this->_FindTableKey("{$c[2]}.{$c[3]}");
            }
            $this->conns = $conns;
        }

        private function _BuildCond($keys, $value, &$retQuery, &$retArgs)
        {
            $list = array();
            $args = array();

            foreach (explode(",", $keys) as $key)
            {
                $key = trim($key);

                if (!empty($key))
                {
                    $akey = $this->_FindTableKey($key);

                    if (is_array($value) && (array_key_exists('min', $value) || array_key_exists('max', $value)))
                    {
                        if (!array_key_exists('max', $value))
                        {
                            $list[] = "?#.?# >= ?";
                            $args[] = $akey[0];
                            $args[] = $akey[1];
                            $args[] = $value['min'];
                        }
                        else if (!array_key_exists('min', $value))
                        {
                            $list[] = "?#.?# <= ?";
                            $args[] = $akey[0];
                            $args[] = $akey[1];
                            $args[] = $value['max'];
                        }
                        else
                        {
                            $list[] = "(?#.?# >= ? AND ?#.?# <= ?)";
                            $args[] = $akey[0];
                            $args[] = $akey[1];
                            $args[] = $value['min'];
                            $args[] = $akey[0];
                            $args[] = $akey[1];
                            $args[] = $value['max'];
                        }
                    }
                    else if (is_array($value))
                    {
                        $isStr = false;
                        foreach ($value as $va)
                        {
                            if (is_string($va)) $isStr = true;
                        }
                        if ($isStr)
                        {
                            $ar = array();
                            foreach ($value as $va)
                            {
                                $ar[] = "?#.?# LIKE ?";
                                $args[] = $akey[0];
                                $args[] = $akey[1];
                                $args[] = $va;
                            }
                            $list[] = "(" . implode(" OR ", $ar) . ")";
                        }
                        else
                        {
                            $list[] = "?#.?# IN (?a)";
                            $args[] = $akey[0];
                            $args[] = $akey[1];
                            $args[] = $value;
                        }
                    }
                    else if (is_string($value))
                    {
                        $list[] = "?#.?# LIKE ?";
                        $args[] = $akey[0];
                        $args[] = $akey[1];
                        $args[] = $value;
                    }
                    else
                    {
                        $list[] = "?#.?# = ?";
                        $args[] = $akey[0];
                        $args[] = $akey[1];
                        $args[] = $value;
                    }
                }
            }
            $query     = implode(" OR ", $list);

            $retQuery .= count($list) == 1 ? " {$query}" : " ({$query})";
            $retArgs   = array_merge($retArgs, $args); 

            return count($list) > 0;
        }

        protected function _Filter($isCount, $from, $count, $filter, $orderBy, $invOrder)
        {
            if (!is_array($filter))
            {
                xmp($filter);
                trigger_error("Invalid filter!", E_USER_ERROR);
            }
            $filter = $this->PrepareFilter($filter);

            $key    = $this->key;
            $table  = $this->table;
            $tables = array_keys($this->allCols);

            $query = "";
            $args  = array();

            $query .= $isCount ? "SELECT COUNT(DISTINCT ?#.?#)" : "SELECT DISTINCT ?#.?#";
            $args[] = $table;
            $args[] = $key;

            // Таблицы из которых извлекаем
            $query .= " FROM ";
            $q = array();
            foreach ($tables as $i => $t)
            {
                $q[]    = "?#";
                $args[] = $t;
            }
            $query .= implode(", ", $q);


            $cond = array();
            // Список условий-связей
            $q = "";
            if ($this->_BuildConnStr($q, $args))
            {
                $cond[] = $q;
            }

            // Список обычных условий
            foreach($filter as $k => $v)
            {
                $q = "";
                if ($this->_BuildCond($k, $v, $q, $args))
                {
                    $cond[] = $q;
                }
            }
            if (count($cond)) 
            {
                $query .= " WHERE " . implode(" AND ", $cond);
            }

            // Упорядочивание
            if (!$isCount)
            {
                if ($orderBy === 'FILTER_RANDOM_ORDER' || $orderBy === FILTER_RANDOM_ORDER)
                {
                    $query .= " ORDER BY rand()";
                }
                else
                {
                    if (empty($orderBy))           $orderBy = array();
                    if (!is_array($orderBy))       $orderBy = array($orderBy);
                    // чтобы статьи с одинаковой датой не скакали всегда добавляем упорядочивание по id
                    if (!in_array($key, $orderBy)) $orderBy[] = "{$table}.{$key}"; 
                   
                    if ($invOrder === true)        $invOrder = $orderBy;
                    else if (empty($invOrder))     $invOrder = array();
                    else if (!is_array($invOrder)) $invOrder = array($invOrder);

                    $finalOrder = array();
                    foreach ($orderBy as $o)
                    {
                        $o = $this->_FindTableKey($o);
                        $invIt = false;
                        foreach ($invOrder as $i)
                        {
                            $ii = $this->_FindTableKey($i);
                            if ($o == $ii)
                            {
                                $invIt = true;
                                break;
                            }
                        }
                        $finalOrder[] = $invIt ? "?#.?# DESC" : "?#.?#";
                        $args[] = $o[0];
                        $args[] = $o[1];
                    }
                    $query .= " ORDER BY " . implode(", ", $finalOrder);
                }
            }
            
            // Ограничиваем количество
            if (!$isCount)
            {
                $query .= " LIMIT ?d, ?d";
                $args[] = $from;
                $args[] = $count;
            }

            // Выборка
            array_unshift($args, $query);
            //xmp($args);
            $ret = call_user_func_array
            (
                array($this->db, $isCount ? 'selectCell' : 'selectCol'),
                $args
            );

            return empty($ret) && !$isCount ? array() : $ret;
        }
    };
?>