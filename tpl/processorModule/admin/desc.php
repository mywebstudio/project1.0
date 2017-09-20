<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {
    $new = new AdminModel(Post('id'));

    $new->desc = Post('value');

    $ret["status"] = 'OK';

    echo json_encode($ret);
}

?>
