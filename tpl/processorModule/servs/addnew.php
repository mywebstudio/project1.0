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

        $article = new ServModel();


        $article->title = Post("title");
        $article->sort = Post("sort");
        $article->date = Post("date");
        $article->featured = Post("featured");
        $article->published = Post("published");
        $article->section = Post("section");

        if (Post('preview')) {

            $article->preview = Post('preview');
            $article->gallery = json_encode(Post('preview'));
        }


        $article->short = Post("short", "", M_HTML_FILTER_OFF | M_XSS_FILTER_OFF);

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
