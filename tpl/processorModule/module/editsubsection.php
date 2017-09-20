<?php

$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {

if(Post('id')) {
    $new = new ModuleModel(Post('id'));

    $data1 = array();
    $data2 = array();
    $data3 = array();


        $data1 = json_decode($new->data1);
        if(is_array($data1)){
            $data1[Post('key')] = Post('data1');
        }
        else {
            $data1[0] = Post('data1');
        }


        $data2 = json_decode($new->data2);
        if(is_array($data2)){
            $data2[Post('key')] = Post('data2');
        }
        else {
            $data2[0] = Post('data2');
        }


        $data3 = json_decode($new->data3);
        if(is_array($data3)){
            $data3[Post('key')] = Post('data3', "", M_HTML_FILTER_OFF | M_XSS_FILTER_OFF);
        }
        else {
            $data3[0] = Post('data3', "", M_HTML_FILTER_OFF | M_XSS_FILTER_OFF);
        }



    $new->data1 = json_encode($data1);
    $new->data2 = json_encode($data2);
    $new->data3 = json_encode($data3);

    $ret["status"] = 'OK';

    echo json_encode($ret);
}
}

?>
