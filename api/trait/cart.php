<?php
trait Cart
{
    function get_cart_products($us_id)
    {
        $sql = "SELECT *
                FROM `cart`
                INNER JOIN `product`
                ON `cart`.`pd_id` = `product`.`pd_id`
                WHERE `us_id` = '$us_id'
                ORDER BY `ca_created_on` ASC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_cart_product($us_id, $pd_id)
    {
        $sql = "SELECT * 
                FROM `cart`
                WHERE `us_id` = $us_id
                AND `pd_id` = $pd_id;";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    function add_cart_product($us_id, $pd_id)
    {
        $sql = "INSERT INTO `cart` (`us_id`, `pd_id`, `ca_quantity`, `ca_created_on`)
                VALUES ($us_id, $pd_id, 1, NOW());";
        $this->connection->query($sql);
    }

    function remove_cart_product($us_id, $pd_id)
    {
        $sql = "DELETE FROM `cart`
                WHERE `us_id` = $us_id
                AND `pd_id` = $pd_id;";
        $this->connection->query($sql);
    }

    function update_cart_product($us_id, $pd_id, $ca_quantity)
    {
        $sql = "UPDATE `cart`
                SET `ca_quantity` = $ca_quantity
                WHERE `us_id` = $us_id
                AND `pd_id` = $pd_id;";
        $this->connection->query($sql);
    }

    function exist_cart_product($us_id, $pd_id)
    {
        $sql = "SELECT *
                FROM `cart`
                WHERE `us_id` = $us_id
                AND `pd_id` = $pd_id;";
        $result = $this->connection->query($sql)->fetch_assoc();
        return empty($result) ? false : true;
    }

    function get_cart_total_quantity($us_id)
    {
        $sql = "SELECT SUM(`ca_quantity`) as `ca_total_quantity`
                FROM `cart`
                WHERE `us_id` = $us_id;";
        $result = $this->connection->query($sql)->fetch_assoc();
        return $result["ca_total_quantity"];
    }
}