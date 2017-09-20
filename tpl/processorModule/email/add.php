<?php
$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {

    $ret = array();

    $x = new EmailModel();
    $x->checkemail(Post("email"));


    if (!IsValidEmail(Post("email"))) {
        $ret["status"] = 'ERROR';
        $ret["msg"] = "Пустой email";
    }



    else {

        if($x->checkemail(Post("email"))) {
            $article = new EmailModel($x->checkemail(Post("email")));
            $article->is_removed = 0;
            $ret["status"] = 'OK';
            $ret["msg"] = 'Создано';
        }

        else {

            $article = new EmailModel();

            $article->email = Post("email");

            $article->date = date("Y-m-d");

            $id = $article->Flush();

            $article = new EmailModel($id);

            $article->md5 = md5($id);

            if ($id) {
                $ret["status"] = 'OK';
                $ret["msg"] = 'Создано';

            } else {
                $ret["status"] = 'ERROR';
                $ret["msg"] = 'Ошибка';
            }
        }

    }

    echo json_encode($ret);
}
?>
