<?php
require __DIR__ . "/./api/core.php";
require __DIR__ . "/./src/util/require_css.php";
require __DIR__ . "/./src/util/load_image.php";
require __DIR__ . "/./src/util/convert_currency.php";
require __DIR__ . "/./src/util/checker.php";
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
    <title>Sucré Bakery</title>
</head>

<body>
    <?php
    require "./src/user/page/header.php";
    require_css("./src/user/css/header.css");

    $direct = $_GET["direct"] ?? "home";
    switch ($direct) {
        case "product":
            require "./src/user/page/product/product.php";
            require_css("./src/user/css/product/product.css");
            break;

        case "login":
            block_login_user();
            require "./src/user/page/account/login.php";
            require_css("./src/user/css/account/login.css");
            break;

        case "logout":
            authorize_user();
            $api->logout_user();
            set_toast_message("Đăng xuất thành công!");
            header("location:?direct=login");
            exit();

        case "register":
            block_login_user();
            require "./src/user/page/account/register.php";
            require_css("./src/user/css/account/register.css");
            break;

        case "modify":
            authorize_user();
            require "./src/user/page/account/modify.php";
            require_css("./src/user/css/account/modify.css");
            break;

        case "detail":
            require "./src/user/page/product/detail.php";
            require_css("./src/user/css/product/detail.css");
            break;

        case "search":
            require "./src/user/page/product/search.php";
            require_css("./src/user/css/product/search.css");
            break;

        case "cart":
            require "./src/user/page/pay/cart.php";
            require_css("./src/user/css/pay/cart.css");
            break;

        case "home":
            require "./src/user/page/home.php";
            require_css("./src/user/css/home.css");
            break;

        case "payout":
            require "./src/user/page/pay/payout.php";
            require_css("./src/user/css/pay/payout.css");
            break;

        case "history":
            require "./src/user/page/pay/history.php";
            require_css("./src/user/css/pay/history.css");
            break;

        case "order":
            require "./src/user/page/pay/order.php";
            require_css("./src/user/css/pay/order.css");
            break;
    }

    require "./src/user/page/footer/footer.php";
    require_css("./src/user/css/footer/footer.css");
    ?>
</body>

</html>