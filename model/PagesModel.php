<?php
class PagesModel extends Model
{

    public  $filter;

    protected function CreateTable()
    {
        static $arrCreates = array();
        if (!isset($arrCreates[$this->table]))
        {
            $this->db->query("CREATE TABLE IF NOT EXISTS ?#
                                 (
                                   `article_id`  INT NOT NULL AUTO_INCREMENT,
                                    `title`  VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci,
                                    `alias` VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci,                                   
                                    `full` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci,                                   
                                    `is_removed`  TINYINT(1) DEFAULT 0, 
                                    `published`  TINYINT(1) DEFAULT 1,
                                    `counter`  INT DEFAULT 1,
                                    `sort`  INT DEFAULT 1,
                                    `gallery` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci,                
                                    `preview`     VARCHAR(1024) CHARACTER SET utf8 COLLATE utf8_general_ci,
                                    `date`        DATE NULL,
                                    `seo_title`        VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci,
                                    `seo_keywords`        VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci,
                                    `seo_description`        VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci,

                                    PRIMARY KEY (`article_id`)
                                 ) AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;",
                $this->table
            );
            $arrCreates[$this->table] = true;
        }
    }

    public function __construct($id = NULL, $onlyShow = false)
    {
        global $g_databases;
        parent::__construct($g_databases->db, "pages", "article_id", $id, $onlyShow);
        $this->filter = new PagesFilter($g_databases->db, $this->table);
    }


    public function __set($key, $value)
    {

        return parent::__set($key, $value);

    }

    public function __get($key)
    {

        return parent::__get($key);
    }



    public function Flush()
    {
        $ret = parent::Flush();

        return $ret;
    }

    public function GetAlias($alias)
    {
        return $this->db->selectCell("SELECT (`article_id`) FROM `pages` WHERE `alias` = '$alias'  and `is_removed` = 0");
    }


    public function Getidfromalias($alias1)
    {
        return $this->db->selectCell("SELECT (`article_id`) FROM `pages` WHERE `alias` = '$alias1'");
    }

    public function Delete()
    {
        $this->is_removed = 1;
        $this->Flush();
        return true;
    }

    public function InitSEO()
    {
        global $g_lang;
        if (strlen($this->seo_title))
        {
            $g_lang['m_title'] = $this->seo_title;
        }
        if (strlen($this->seo_keywords))
        {
            $g_lang['m_keyWords'] = $this->seo_keywords;
        }
        if (strlen($this->seo_description))
        {
            $g_lang['m_description'] = $this->seo_description;
        }
    }

    public function counteradd()
    {
        $count = $this->counter;
        $this->counter = $count + 1;
        return true;
    }
    
};
?>