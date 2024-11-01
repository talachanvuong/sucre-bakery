<?php
require __DIR__ . "/./api/core.php";
require __DIR__ . "/./src/util/require_css.php";
require __DIR__ . "/./src/util/load_image.php";
require __DIR__ . "/./src/util/convert_currency.php";
require __DIR__ . "/./src/util/check_admin.php";
require __DIR__ . "/./src/util/toast.php";

session_start();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/reset-css@5.0.2/reset.css" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="./src/admin/css/admin.css" />
    <title>Admin</title>
</head>

<body>
    <div class="admin-layout">
        <?php
        $direct = $_GET["direct"] ?? "home";

        if ($direct !== "login") {
            require "./src/admin/page/menu_left.php";
            require_css("./src/admin/css/menu_left.css");
        }

        switch ($direct) {
            // Account
            case "login":
                block_login();
                require "./src/admin/page/login.php";
                require_css("./src/admin/css/login.css");
                break;

            case "logout":
                authorize();
                $api->logout_admin();
                set_toast_message("Đăng xuất thành công!");
                header("location:?direct=login");
                exit();

            // Product
            case "product":
                authorize();
                require "./src/admin/page/product/product.php";
                require_css("./src/admin/css/product/product.css");
                break;

            case "add_product":
                authorize();
                require "./src/admin/page/product/add_product.php";
                require_css("./src/admin/css/product/add_product.css");
                break;

            case "edit_product":
                authorize();
                require "./src/admin/page/product/edit_product.php";
                require_css("./src/admin/css/product/edit_product.css");
                break;

            // Home
            case "home":
                authorize();
                require "./src/admin/page/home.php";
                require_css("./src/admin/css/home.css");
                break;
        }
        ?>
    </div>
</body>

</html>