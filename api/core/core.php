<?php
require __DIR__ . "/../product.php";
require __DIR__ . "/../registerUsers.php";
require __DIR__ . "/../loginUsers.php";
require __DIR__ . "/../cart.php";
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
}

require __DIR__ . "/load_image.php";
require __DIR__ . "/convert_currency.php";

$api = new Api();