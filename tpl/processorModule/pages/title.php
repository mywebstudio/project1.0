<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {
    if(Post('id')) {
        $new = new PagesModel(Post('id'));
    
        $new->title = Post('value');
    
        $ret["status"] = 'OK';
    
        echo json_encode($ret);
    }
}

?>
