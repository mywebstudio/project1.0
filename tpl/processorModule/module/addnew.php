<?php
$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {

    if (!strlen(strip_tags(Post("title")))) {
        $errors[] = "Пустой заголовок";
    }
    $ret = array();

    if (empty($errors)) {

        $article = new ModuleModel();

        $article->title = Post("title");
        $article->date = Post("date");

//        $alias = translit(Post("title"));
//        $alias_duble = chech_alias($alias);
        
        if (Post("alias")) $article->alias = Post("alias");

            
        else $article->alias = translit(Post("title"));


        $r = $article->Flush();

        if ($r) {
            $ret["status"] = 'OK';
            $ret["msg"] = $r;
            $_POST = array();
        } else {

            $errors[] = "Ошибка регистрации";
        }


    } else {
        $ret["status"] = 'ERROR';
        $ret["msg"] = implode('<br>', $errors);
    }

    echo json_encode($ret);
}
?>
