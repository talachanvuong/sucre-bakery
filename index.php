<?php
require __DIR__ . "/./api/core.php";
require __DIR__ . "/./src/util/require_css.php";
require __DIR__ . "/./src/util/load_image.php";
require __DIR__ . "/./src/util/convert_currency.php";
require __DIR__ . "/./src/util/check_user.php";
require __DIR__ . "/./src/util/toast.php";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/reset-css@5.0.2/reset.css" />
    <link rel="stylesheet" href="./src/css/index.css" />
    <title>Sucré Bakery</title>
</head>

<body>
    <?php
    session_start();

    require "./src/page/user/header.php";
    require_css("./src/css/user/header.css");

    $direct = $_GET["direct"] ?? "home";
    switch ($direct) {
        case "product":
            require "./src/page/user/product/product.php";
            require_css("./src/css/user/product/product.css");
            break;

        case "login":
            block_login();
            require "./src/page/user/account/login.php";
            require_css("./src/css/user/account/login.css");
            break;

        case "logout":
            authorize();
            $api->logout_user();
            set_toast_message("Đăng xuất thành công!");
            header("location:?direct=login");
            exit();

        case "register":
            block_login();
            require "./src/page/user/account/register.php";
            require_css("./src/css/user/account/register.css");
            break;

        case "modify":
            authorize();
            require "./src/page/user/account/modify.php";
            require_css("./src/css/user/account/modify.css");
            break;

        case "detail":
            require "./src/page/user/product/detail.php";
            require_css("./src/css/user/product/detail.css");
            break;

        case "search":
            require "./src/page/user/product/search.php";
            require_css("./src/css/user/product/search.css");
            break;

        case "cart":
            require "./src/page/user/pay/cart.php";
            require_css("./src/css/user/pay/cart.css");
            break;

        case "home":
            require "./src/page/user/home.php";
            require_css("./src/css/user/home.css");
            break;
    }

    require "./src/page/user/footer/footer.php";
    require_css("./src/css/user/footer/footer.css");
    ?>
</body>

</html>