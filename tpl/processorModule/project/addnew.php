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

        $article = new ProjectModel();
        $article->title = Post('title');
        
                    $article->section = Post('section');
                    $article->date = Post('date');
                    $article->sort = Post('sort');
                    $article->price = Post('price');
                    $article->square = Post('square');
                    $article->oblast = Post('oblast');
                    $article->adress = Post('adress');
                    $article->kitchensquare = Post('kitchensquare');
                    $article->typeofhouse = Post('typeofhouse');
                    $article->typeofbath = Post('typeofbath');
                    $article->typeofowner = Post('typeofowner');
                    $article->comm = Post('comm');
                    $article->heat = Post('heat');
                    $article->rayon = Post('rayon');
                    $article->balkon = Post('balkon');
                    $article->city = Post('city');
                    $article->contacts = Post('contacts');
                    $article->floors = Post('floors');
                    $article->rooms = Post('rooms');
                    $article->published = Post('publishe');
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
