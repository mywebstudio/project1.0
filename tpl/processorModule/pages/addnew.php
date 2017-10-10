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


    if (empty($errors)) {

        $article = new PagesModel();


        $article->title = Post("title");
        $article->sort = Post("sort");
        $article->date = Post("date");
        $article->published = Post("published");

        if (Post('preview')) {

            $article->preview = Post('preview');
            $article->gallery = json_encode(Post('preview'));
        }



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
