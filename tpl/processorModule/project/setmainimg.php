<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {
    if(Post('id')) {
        $new = new ProjectModel(Post('id'));
        
        $new->preview = Post('name');

        $ret["status"] = 'OK';

        echo json_encode($ret);
    }
}

?>
