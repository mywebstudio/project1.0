<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {
    if(Post('id')) {
        $new = new ArticleModel(Post('id'));
    
        $new->title2 = Post('value');
    
        $ret["status"] = 'OK';
    
        echo json_encode($ret);
    }
}

?>
