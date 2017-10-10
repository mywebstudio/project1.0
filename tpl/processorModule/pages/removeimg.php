<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {
    if(Post('id')) {
        $new = new PagesModel(Post('id'));

        $gallery = json_decode($new->gallery, true);

        if(($key = array_search(Post('name'),$gallery)) !== FALSE){
            unset($gallery[$key]);
        }
        $new->gallery = json_encode($gallery);

        if($new->preview == Post('name')) $new->preview = $gallery[0];

        $ret["status"] = 'OK';

        echo json_encode($ret);
    }
}

?>
