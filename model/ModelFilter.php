<?php

    /**
     * DB helper
     *
     * Класс позволяет реализовать лёгкий и быстрый фильтр элементов таблицы.
     *
     * Ограничения:
     * - у таблицы обязательно должен быть один PRIMARY KEY
     *
     * @author GUUL
     */
    class ModelFilter
    {
        protected function SelCols($table)
        {
            $ret = array();
            $arr = $this->db->select("SHOW COLUMNS FROM ?#", $table);
            if (!empty($arr))
            {
                foreach($arr as $a)
                {
                    if (!empty($a["Field"])) 
                    {
                        $ret[] = $a["Field"];
                    }
                }
            }
            return $ret;
        }

        protected function SelKey($table)
        {
            $ret = NULL;
            $arr = $this->db->select("SHOW COLUMNS FROM ?#", $this->table);
            if (!empty($arr))
            {
                foreach($arr as $a)
                {
                    if (!empty($a["Field"]) && !empty($a["Key"]) && $a["Key"] == "PRI") 
                    {
                        $ret = $a["Field"];
                        break;
                    }
                }
            }
            return $ret;
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
                    if (!in_array($key, $this->cols)) trigger_error("Invalid key '{$key}'!", E_USER_ERROR);

                    if (is_array($value) && (array_key_exists('min', $value) || array_key_exists('max', $value)))
                    {
                        if (!array_key_exists('max', $value))
                        {
                            $list[] = "?# >= ?";
                            $args[] = $key;
                            $args[] = $value['min'];
                        }
                        else if (!array_key_exists('min', $value))
                        {
                            $list[] = "?# <= ?";
                            $args[] = $key;
                            $args[] = $value['max'];
                        }
                        else
                        {
                            $list[] = "(?# >= ? AND ?# <= ?)";
                            $args[] = $key;
                            $args[] = $value['min'];
                            $args[] = $key;
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
                                $ar[] = "?# LIKE ?";
                                $args[] = $key;
                                $args[] = $va;
                            }
                            $list[] = "(" . implode(" OR ", $ar) . ")";
                        }
                        else
                        {
                            $list[] = "?# IN (?a)";
                            $args[] = $key;
                            $args[] = $value;
                        }
                    }
                    else if (is_string($value))
                    {
                        $list[] = "?# LIKE ?";
                        $args[] = $key;
                        $args[] = $value;
                    }
                    else
                    {
                        $list[] = "?# = ?";
                        $args[] = $key;
                        $args[] = $value;
                    }
                }
            }
            $query     = implode(" OR ", $list);

            $retQuery .= count($list) == 1 ? " {$query}" : " ({$query})";
            $retArgs   = array_merge($retArgs, $args); 

            return count($list) > 0;
        }

        protected $key   = NULL;
        protected $cols  = NULL;

        protected $table = NULL;
        protected $db    = NULL;

        public function __construct($db, $table, $key = NULL, $cols = NULL)
        {
            $this->db    = $db;
            $this->table = $table;

            $this->key  = empty($key)  ? $this->SelKey($table)  : $key;
            $this->cols = empty($cols) ? $this->SelCols($table) : $cols;

            if ($this->key == NULL || $this->cols == NULL || $this->table == NULL || $this->db == NULL || !is_array($this->cols))
            {
                trigger_error("Invalid input data!", E_USER_ERROR);
            }
        }

        protected function _Filter($isCount, $from, $count, $filter, $orderBy, $invOrder)
        {
            if (!is_array($filter))
            {
                xmp($filter);
                trigger_error("Invalid filter!", E_USER_ERROR);
            }
            $filter = $this->PrepareFilter($filter);

            $key  = $this->key;
            $cols = $this->cols;

            $query = "";
            $args  = array();

            $query .= $isCount ? "SELECT COUNT(DISTINCT ?#)" : "SELECT DISTINCT ?#";
            $args[] = $this->key;

            $query .= " FROM ?#";
            $args[] = $this->table;

            // Список условий
            $cond = array();
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
                    if (!in_array($key, $orderBy)) $orderBy[] = $key; // чтобы статьи с одинаковой датой не скакали всегда добавляем упорядочивание по id
                   
                    if ($invOrder === true)        $invOrder = $orderBy;
                    else if (empty($invOrder))     $invOrder = array();
                    else if (!is_array($invOrder)) $invOrder = array($invOrder);

                    $finalOrder = array();
                    foreach ($orderBy as $o)
                    {
                        if (!in_array($o, $cols)) trigger_error("Invalid order key!", E_USER_ERROR);
                        $finalOrder[] = in_array($o, $invOrder) ? "?# DESC" : "?#";
                        $args[] = $o;
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

        protected function PrepareFilter($filter)
        {
            return $filter;
        }

        // Используем 0xffff, а не PHP_INT_MAX потому что PHP может быть 64 бита а MySql 32 бита
        public function Filter($filter = array(), $from = 0, $count = 0xffff, $orderBy = array(), $invOrder = false)
        {
            return $this->_Filter(false, $from, $count, $filter, $orderBy, $invOrder);
        }

        public function FilterTotal($filter = array())
        {
            return $this->_Filter(true, 0, 0, $filter, array(), false);
        }
    };
?>
