<?php

$hash = Post('hash');
$authlogin = Post('authlogin');

$auth = new AdminModel();
$a = $auth->DoLogin($authlogin,$hash);

//операции происходят после проверки безопасновти
if($a) {
    $admin = new AdminModel();

    $login = trim(Post('login'));
    $pwd   = Post('pwd');
    $title  = trim(Post('title'));
    $desc  = trim(Post('desc'));
    $email = trim(Post('email'));
    $phone = trim(Post('phone'));

        $errs = array();
        if (empty($login))
        {
            $errs[] = "Логин не может быть пустым";
        }
        if ( empty($pwd))
        {
            $errs[] = "Пароль не может быть пустым";
        }
        if ($admin->IsLoginBusy($login))
        {
            $errs[] = "Данный логин уже используется";
        }
        if ($authlogin != $login && $admin->IsLoginBusy($login))
        {
            $errs[] = "Данный логин уже используется";
        }

        if (empty($errs))
        {
            $admin->login = $login;
            if (!empty($pwd))
            {
                $admin->pwd_hash = $admin->MakeHash($pwd);
            }
            $admin->title     = $title;
            $admin->desc     = $desc;
            $admin->email    = $email;
            $admin->phone    = $phone;
            $admin->reg_time = time();
            $id              = $admin->Flush();

            if ($id)
            {
                $ret["status"] = 'OK';
                $_POST = array();
            }
            else
            {

                $errs[] = "Ошибка регистрации";
            }
        }

        if (!empty($errs))
        {
            $ret["status"] = 'ERROR';
            $ret["msg"] = implode('<br>', $errs);
        }

    echo json_encode($ret);
}

?>
