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

            unset($data1[Post('key')]);
        }
        else {
            $data1[0] = '';
        }


        $data2 = json_decode($new->data2);
        if(is_array($data2)){
            unset($data2[Post('key')]);
        }
        else {
            $data2[0] = '';
        }


        $data3 = json_decode($new->data3);
        if(is_array($data3)){
            unset($data3[Post('key')]);
        }
        else {
            $data3[0] = '';
        }



    $new->data1 = json_encode($data1);
    $new->data2 = json_encode($data2);
    $new->data3 = json_encode($data3);

    $ret["status"] = 'OK';

    echo json_encode($ret);
}
}

?>
