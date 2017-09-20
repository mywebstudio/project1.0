<?php
$hash = Get('hash');
$login = Get('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {

$admin['data'] = array();

foreach ($auth->GetList() as $key=> $aid)
{
    $a = new AdminModel($aid);
    $admin['data'][$key]['title'] = $a->title;
    $admin['data'][$key]['login'] = $a->login;
    $admin['data'][$key]['id'] = $a->admin_id;
    $admin['data'][$key]['desc'] = $a->desc;
    $admin['data'][$key]['phone'] = $a->phone;
    $admin['data'][$key]['email'] = $a->email;
}
echo json_encode($admin);

}

?>
