<?php


    $admin_id = intval(Get('id'));
    $admin    = new AdminModel($admin_id);

    if ($admin_id && !$admin->IsExists())
    {
        trigger_error("Invalid admin id.", E_USER_ERROR);
    }

    $del = intval(Get('del'));
    if($del) {
        $admin1 = new AdminModel($del);
        $admin1->is_removed = 1;
        Header("Location: " . "/admin/admins");
    }

    $login = trim(Post('login', $admin_id ? $admin->login : NULL));
    $pwd   = Post('pwd');
    $title  = trim(Post('title',  $admin_id ? $admin->title  : NULL));
    $desc  = trim(Post('desc',  $admin_id ? $admin->desc  : NULL));
    $email = trim(Post('email', $admin_id ? $admin->email : NULL));
    $phone = trim(Post('phone', $admin_id ? $admin->phone : NULL));


?>
