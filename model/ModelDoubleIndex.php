<?php

/**
 * Дефолтная модель
 *
 * @author GYL
 * @updated Zmi
 */
abstract class ModelDoubleIndex
{
    protected $table;
    protected $db;
    private   $id1 = NULL;
    private   $id2 = NULL;
    private   $idField1;
    private   $idField2;
    private   $onlyShow  = false;

    private   $isDel = false;

    private $data      = array();
    private $dataStart = array();

    abstract protected function CreateTable();

    public function __construct(& $db, $table, $idField1, $id1, $idField2, $id2, $onlyShow = false)
    {
        $this->db       = & $db;
        $this->table    = $table;
        $this->idField1 = $idField1;
        $this->idField2 = $idField2;
        $this->id1      = $id1;
        $this->id2      = $id2;
        $this->onlyShow = $onlyShow;

        if ( ! $onlyShow)
        {
            $this->CreateTable();
        }

        if ( ! is_null($this->id1) && ! is_null($this->id2) && $this->db)
        {
            $this->data = $this->db->selectRow(
                "SELECT
                                                        *
                                                     FROM
                                                        ?#
                                                     WHERE 
                                                        ?# = ?d AND ?# = ?d",
                $this->table,
                $this->idField1,
                $this->id1,
                $this->idField2,
                $this->id2
            );
            $this->dataStart = $this->data;
        }
    }

    public function __set($key, $value)
    {
        if ($this->isDel)
        {
            trigger_error("Can not change removed object!", E_USER_ERROR);
        }
        if ($this->onlyShow)
        {
            trigger_error("Can not change readonly object!", E_USER_ERROR);
        }

        if ($key == $this->idField1)
        {
            trigger_error("Can not change id first field!", E_USER_ERROR);
        }
        else if ($key == $this->idField2)
        {
            trigger_error("Can not change id second field!", E_USER_ERROR);
        }
        return $this->data[$key] = $value;
    }

    public function __get($key)
    {
        // Нельзя получать данные из объекта который удалён
        if ($this->isDel)
        {
            trigger_error("Can not get value from removed object!", E_USER_ERROR);
        }

        $res = NULL;
        if ($key == $this->idField1)
        {
            $res = $this->id1;
        }
        else if ($key == $this->idField2)
        {
            $res = $this->id2;
        }
        else
        {
            $res = $this->data[$key];
        }
        return $res;
    }

    public function Flush()
    {
        $ret = false;

        // Если изначально извлекали только что бы показать то выходим
        if ($this->onlyShow || is_null($this->id1) || is_null($this->id2))
        {
            return $ret;
        }

        if ($this->isDel)
        {
            return $ret;
        }

        if (count($this->data) && $this->db)
        {
            $count = $this->db->selectCell("SELECT COUNT(*) FROM ?# WHERE ?# = ?d AND ?# = ?d", $this->table, $this->idField1, $this->id1, $this->idField2, $this->id2);

            if ($count == 0)
            {
                $keys   = array($this->idField1, $this->idField2);
                $values = array($this->id1, $this->id2);
                if (count($this->data) > 0)
                {
                    $keys   = array_merge($keys,   array_keys($this->data));
                    $values = array_merge($values, array_values($this->data));
                }

                $ret = $this->db->query("
                                                INSERT INTO
                                                    ?#(?#)
                                                VALUES
                                                    (?a)
                                            ",
                    $this->table,
                    $keys,
                    $values
                );
                $ret = true;
            }
            else
            {
                if ($this->dataStart != $this->data)
                {
                    $ret = $this->db->query("
                                                    UPDATE
                                                        ?#
                                                    SET
                                                        ?a
                                                    WHERE
                                                        ?# = ?d AND ?# = ?d
                                                ",
                        $this->table,
                        $this->data,
                        $this->idField1,
                        $this->id1,
                        $this->idField2,
                        $this->id2
                    );
                }
                $ret = true;
            }
        }
        return $ret;
    }

    public function IsExists()
    {
        return $this->db->selectCell("SELECT COUNT(*) FROM ?# WHERE ?# = ?d AND ?# = ?d", $this->table, $this->idField1, $this->id1, $this->idField2, $this->id2) > 0;
    }

    public function HasChanges()
    {
        return $this->data != $this->dataStart;
    }

    public function IsOnlyShow()
    {
        return $this->onlyShow;
    }

    public function IsDeleted()
    {
        return $this->isDel;
    }

    public function Delete()
    {
        if ( ! is_null($this->id1) && ! is_null($this->id2))
        {
            $this->db->query("DELETE FROM ?# WHERE ?# = ?d AND ?# = ?d", $this->table, $this->idField1, $this->id1, $this->idField2, $this->id2);
            $this->id1       = NULL;
            $this->id2       = NULL;
            $this->data      = array();
            $this->dataStart = array();
        }
    }

    public function __destruct()
    {
        return $this->Flush();
    }
};
?>
