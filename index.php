<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/reset-css@5.0.2/reset.css" />
    <link rel="stylesheet" href="./src/css/index.css" />
    <title>Sucré Bakery</title>
</head>

<?php
function get_part($phpFile, $cssFile)
{
    require $phpFile;
    ?>
    <style>
        <?php
        require $cssFile;
        ?>
    </style>
    <?php
}
?>

<body>
    <?php
    get_part("./src/page/user/header.php", "./src/css/user/header.css");

    $direct = $_GET["direct"] ?? "home";
    switch ($direct) {
        case 'product':
            get_part("./src/page/user/product/product.php", "./src/css/user/product/product.css");
            break;
        case 'login':
            get_part("./src/page/user/account/login.php", "./src/css/user/account/login.css");
            break;
        case 'register':
            get_part("./src/page/user/account/register.php", "./src/css/user/account/register.css");
            break;
        case 'detail':
            get_part("./src/page/user/product/detail.php", "./src/css/user/product/detail.css");
            break;
        case 'search':
            get_part("./src/page/user/product/search.php", "./src/css/user/product/search.css");
            break;
        case 'cart':
            get_part("./src/page/user/pay/cart.php", "./src/css/user/pay/cart.css");
            break;
        case 'home':
            get_part("./src/page/user/home.php", "./src/css/user/home.css");
            break;
    }

    get_part("./src/page/user/footer/footer.php", "./src/css/user/footer/footer.css");
    ?>
</body>

</html>