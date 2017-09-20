<?php

    require_once BASEPATH . "lib/PHPMailer_v5.1/class.phpmailer.php";

    define('SENDMAIL_PRIORITY_LOW',    1);
    define('SENDMAIL_PRIORITY_NORMAL', 3);
    define('SENDMAIL_PRIORITY_HIGH',   5);

    $g_sendMailLastError = '';

    function SendMailLastError()
    {
        global $g_sendMailLastError;
        return $g_sendMailLastError;
    }

    function SendMail($to, $subject, $message, $config = array(), $headers = array(), $files = array(), $priority = SENDMAIL_PRIORITY_NORMAL)
    {
        global $g_config;
        $config = array_merge($g_config['send_mail'], $config);

        if (!is_array($headers)) $headers = explode("\n", $headers);
        if (!empty($config['add_headers']))
        {
            $headers = array_merge($headers, $config['add_headers']);
        }
        if (!is_array($to)) $to = array($to);

        $headers = array_unique(array_filter($headers));
        $to      = array_unique(array_filter($to));
        $files   = array_unique(array_filter($files));
                                             
        $toStr = implode(",", $to);

        if ($config['save_to_file_only'])
        {
            $file = $config['save_path_info'];
            if (!empty($file))
            {
                $mail = "---" . PHP_EOL .
                        "To: " . $toStr . PHP_EOL .
                        "Subject: " . $subject . PHP_EOL .
                        "Message: " . $message . PHP_EOL .
                        "Headers: " . implode("; ", $headers) . PHP_EOL .
                        "Files: " . print_r($files, true) . PHP_EOL .
                        "Priority: " . $priority;
                FileSys::WriteFile($file, $mail, true);
            }
            $file = $config['save_path_html'];
            if (!empty($file))
            {
                FileSys::WriteFile($file, $message, false, implode("\r\n", $headers));
            }
            
            $ret = count($to);
        }
        else if ($config['use_def_mail'])
        {
            $ret = 0;
            foreach ($to as $t)
            {
                $ret += mail($t, $subject, $message) ? 1 : 0;
            }
        }
        else
        {
            $ret  = false;
            $mail = new PHPMailer();
            try 
            {
                $mail->MailerDebug = false;

                // Устанавливае кодировку письма равную кодировке сайта
                $mail->CharSet = $g_config['charset'];
                if (mb_strlen($message) != mb_strlen(strip_tags($message)))
                {
                    $mail->IsHTML(true);
                }
               
                // Устанавливаем имя отправителя (сначала дефолтное)
                if (!empty($config['from_email']))
                {
                    $mail->From = $config['from_email'];
                }
                if (!empty($config['from_name']))
                {
                    $mail->FromName = $config['from_name'];
                }

                $mail->MailerDebug = false; // Не выводить ошибки в поток
                
                if ($config['use_smtp'])
                {
                    $mail->IsSMTP();
                    $mail->SMTPSecure = $config['smtp_secure'];
                    $mail->Host       = $config['smtp_host'];
                    $mail->Port       = $config['smtp_port'];
                    $mail->SMTPDebug  = 1; // 1 = errors and messages, 2 = messages only 
                   
                    if ($config['smtp_auth'])
                    {
                        $mail->SMTPAuth   = true;
                        $mail->Username   = $config['smtp_user'];
                        $mail->Password   = $config['smtp_pwd']; 
                        //$mail->From     = $config['smtp_user']; // Игнорируем $config['from_email'], чтобы не отправиться в спам
                    }
                }
                
                if ($config['use_dkim'])
                {
                    $mail->DKIM_domain     = $config['dkim_domain'];
                    $mail->DKIM_private    = $config['dkim_priv_key_path'];
                    $mail->DKIM_selector   = $config['dkim_selector'];
                    $mail->DKIM_passphrase = $config['dkim_passphrase'];
                }
               
                foreach ($headers as $h)
                {
                    $mail->AddCustomHeader($h);
                }
                foreach ($files as $f)
                {
                    $mail->AddAttachment($f);
                }
               
                $mail->Subject = $subject;
                $mail->AltBody = strip_tags(str_ireplace(array("<br>", "<br/>", "<br />", "</div>", "</p>"), PHP_EOL, $message));
                $mail->MsgHTML($message);

                foreach ($to as $t)
                {
                    $mail->AddAddress($t);
                }
                $ret = $mail->Send();
                if (!$ret)
                {
                    ToLog("Can't send email: " . $mail->ErrorInfo);
                    $g_sendMailLastError = "Can't send email: " . $mail->ErrorInfo;
                }
                else
                {
                    $ret = count($to);
                }
            }
            catch (phpmailerException $e) 
            {
                ToLog("Can't send email: " . $e->errorMessage());
                $g_sendMailLastError = "Can't send email: " . $e->errorMessage();
            } 
            catch (Exception $e) 
            {
                ToLog("Can't send email: " . $e->getMessage());
                $g_sendMailLastError = "Can't send email: " . $e->getMessage();
            }
        }
        return $ret;
    }
?>
