<?php
require __DIR__ . "/./trait/product.php";
require __DIR__ . "/./trait/registerUsers.php";
require __DIR__ . "/./trait/loginUsers.php";
require __DIR__ . "/./trait/cart.php";
require __DIR__ . "/./trait/account.php";
class Api
{
    private $connection;

    function __construct()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "db_sucre_web";
        $this->connection = new mysqli($hostname, $username, $password, $database);
    }

    use Product;
    use Register;
    use Login;
    use Cart;
    use Account;
}

$api = new Api();