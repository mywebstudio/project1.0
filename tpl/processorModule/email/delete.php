<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {
    if(Post('id')) {
        $new = new EmailModel(Post('id'));

        $new->is_removed = Post('value');

        $ret["status"] = 'OK';

        echo json_encode($ret);
    }
}

?>
