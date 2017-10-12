<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {
    if(Post('id')) {
        $new = new ProdModel(Post('id'));
    
        $new->custom = Post('value', "", M_HTML_FILTER_OFF | M_XSS_FILTER_OFF);
    
        $ret["status"] = 'OK';
    
        echo json_encode($ret);
    }
}

?>
