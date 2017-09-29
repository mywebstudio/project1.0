<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {

if(Post('id')) {
    $new = new ArticleModel(Post('id'));

    $new->published = Post('value');

    $ret["status"] = 'OK';

    echo json_encode($ret);
}
}

?>
