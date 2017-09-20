<?php


class EmailModel extends Model
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
                                    `email`  VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci,
                                    `md5`  VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci,
                                    `date`  DATE NULL,

                                    `is_removed`  TINYINT(1) DEFAULT 0,

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
        parent::__construct($g_databases->db, "email", "article_id", $id, $onlyShow);




        $this->filter = new EmailFilter($g_databases->db, $this->table);
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
    public function isactive($email)
    {
        return $this->db->selectCell("SELECT (`article_id`) FROM `email` WHERE `email` = '$email' and `is_removed` = 0");
    }

    public function checkemail($email)
    {
        return $this->db->selectCell("SELECT (`article_id`) FROM `email` WHERE `email` = '$email'");
    }

    public function GetSub($email)
    {
        return $this->db->selectCell("SELECT (`article_id`) FROM `email` WHERE `email` = '$email'  and `is_removed` = 0");
    }

    public function Delete()
    {
        $this->is_removed = 1;
        $this->Flush();
        return true;
    }



    public function sendEMAIL($email,$title,$body)
    {

//error_reporting(E_ALL);
//        error_reporting(E_STRICT);

        date_default_timezone_set('America/Toronto');

        $mail                = new PHPMailer();


        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->CharSet = 'UTF-8';

        $mail->Host = "141.8.195.136"; // sets the SMTP server
        $mail->Port          = 25;                    // set the SMTP port for the GMAIL server
        $mail->SMTPAuth      = true;                  // enable SMTP authentication
        $mail->Username      = "mail@miciar.ru"; // SMTP account username
        $mail->Password      = "infomiciarru";        // SMTP account password
        $mail->SetFrom('mail@ayfaar.ru', 'AYFAAR.RU');
        $mail->AddReplyTo('mail@ayfaar.ru', 'AYFAAR.RU');

        $mail->Subject       = $title;


        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
        $mail->MsgHTML($body);
        $mail->AddAddress($email);


        if(!$mail->Send()) {
            return 'Mailer Error () ' . $mail->ErrorInfo . '<br />';
        } else {
            return 'Message sent to :' . $email;
        }
        // Clear all addresses and attachments for next loop
        $mail->ClearAddresses();
    }


    

};
?>