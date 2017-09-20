<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {

if(Post('id')) {
    $new = new ModuleModel(Post('id'));

    $new->date = Post('value');

    $ret["status"] = 'OK';

    echo json_encode($ret);
}
}

?>
