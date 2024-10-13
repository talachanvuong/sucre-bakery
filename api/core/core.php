<?php
require_once __DIR__ . "/../product.php";
require_once __DIR__ . "/../registerUsers.php";
require_once __DIR__ . "/../loginUsers.php";
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
}

require_once __DIR__ . "/load_image.php";

$api = new Api();