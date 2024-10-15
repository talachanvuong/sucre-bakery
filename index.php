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
    get_part("./src/page/header.php", "./src/css/header.css");

    $direction = $_GET["direct"] ?? "home";
    switch ($direction) {
        case 'product':
            get_part("./src/page/user/product.php", "./src/css/user/product.css");
            break;
        case 'login':
            get_part("./src/page/user/login.php", "./src/css/user/login.css");
            break;
        case 'detail':
            get_part("./src/page/user/detail.php", "./src/css/user/detail.css");
            break;
        case 'home':
            get_part("./src/page/user/home.php", "./src/css/user/home.css");
            break;
    }
    ?>
</body>

</html>