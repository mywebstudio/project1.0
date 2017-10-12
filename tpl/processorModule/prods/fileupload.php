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

            move_uploaded_file($_FILES['file']['tmp_name'], '/home/a0030635/domains/atlaslux-crimea.ru/public_html/upl/articles_preview/' . $_FILES['file']['name']);
            if(Post('id')) {
                $newsModel = new ProdModel(Post('id'));
                $gallery = json_decode($newsModel->gallery, true);
                $gallery[] = $_FILES['file']['name'];
                $newsModel->gallery = json_encode($gallery);
                $newsModel->preview = $gallery[0];
            }

            echo "OK";
        }

    }
}
?>