<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13.06.2016
 * Time: 18:36
 * articles_preview
 */
// ajax отправка изображений
$hash = Post('hash');
$login = Post('login');

$auth = new AdminModel();
$a = $auth->DoLogin($login,$hash);

//операции происходят после проверки безопасновти
if($a) {

    if (!empty($_FILES)) {

        if (!empty($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {

            move_uploaded_file($_FILES['file']['tmp_name'], '/home/a0147451/domains/korvet.net/public_html/upl/articles_preview/' . $_FILES['file']['name']);
            if(Post('id')) {
                $ProjectModel = new ProjectModel(Post('id'));
                $gallery = json_decode($ProjectModel->gallery, true);
                $gallery[] = $_FILES['file']['name'];
                $ProjectModel->gallery = json_encode($gallery);
                $ProjectModel->preview = $gallery[0];
            }

            echo "OK";
        }

    }
}
 
?>