<?php
require __DIR__ . "/./api/core.php";
require __DIR__ . "/./src/util/require_css.php";
require __DIR__ . "/./src/util/load_image.php";
require __DIR__ . "/./src/util/convert_currency.php";
require __DIR__ . "/./src/util/check_admin.php";
require __DIR__ . "/./src/util/toast.php";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/reset-css@5.0.2/reset.css" />
    <link rel="stylesheet" href="./src/css/index.css" />
    <title>Admin</title>
</head>

<body>
    <?php
    session_start();

    $direct = $_GET["direct"] ?? "home";
    switch ($direct) {
        case "product":
            authorize();
            require "./src/page/admin/product.php";
            require_css("./src/css/admin/product/product.css");
            break;

        case "login":
            block_login();
            require "./src/page/admin/login.php";
            require_css("./src/css/admin/login.css");
            break;

        case "logout":
            $api->logout_admin();
            set_toast_message("Đăng xuất thành công!");
            header("location:?direct=login");
            exit();
            
        case "home":
            authorize();
            require "./src/page/admin/home.php";
            require_css("./src/css/admin/overview/content.css");
            break;
    }
    ?>
</body>

</html>