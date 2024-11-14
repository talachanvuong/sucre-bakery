<?php
require __DIR__ . "/./api/core.php";
require __DIR__ . "/./src/util/require_css.php";
require __DIR__ . "/./src/util/load_image.php";
require __DIR__ . "/./src/util/convert_currency.php";
require __DIR__ . "/./src/util/checker.php";
require __DIR__ . "/./src/util/toast.php";
require __DIR__ . "/./src/util/page.php";
require __DIR__ . "/./src/util/redirect.php";
require __DIR__ . "/./src/util/constant.php";

session_start();
toast_session();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/reset-css@5.0.2/reset.css" type="text/css" />
    <link rel="stylesheet" href="./index.css" type="text/css" />
    <title>Admin</title>
</head>

<body>
    <?php
    switch (DIRECT) {
        case "login":
            block_login_admin();
            require "./src/admin/page/login.php";
            break;

        case "logout":
            authorize_admin();
            $api->logout_admin();
            set_toast_message("Đăng xuất thành công!");
            header("location:?direct=login");
            exit();

        default:
            authorize_admin();
            require "./src/admin/page/panel.php";
            break;
    }
    ?>
</body>

</html>