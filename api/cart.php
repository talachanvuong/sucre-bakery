<?php
trait Cart
{
    function get_cart_products_by_us_id(int $us_id)
    {
        $sql = "SELECT *
                FROM `cart`
                INNER JOIN `product` ON `cart`.`pd_id` = `product`.`pd_id`
                WHERE `us_id` = '$us_id';";

        $result = $this->connection->query($sql);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    function add_cart_product(int $us_id, int $pd_id)
    {
        $sql = "INSERT INTO `cart` (`us_id`, `pd_id`, `ca_quantity`)
            VALUES
            ($us_id, $pd_id, 1);";

        $this->connection->query($sql);
    }

    function remove_cart_product(int $us_id, int $pd_id)
    {
        $sql = "DELETE FROM `cart`
                WHERE `us_id` = $us_id
                AND `pd_id` = $pd_id;";

        $this->connection->query($sql);
    }

    function update_cart_product_quantity(int $us_id, int $pd_id, int $ca_quantity)
    {
        $sql = "UPDATE `cart`
                SET `ca_quantity` = $ca_quantity
                WHERE `us_id` = $us_id
                AND `pd_id` = $pd_id;";

        $this->connection->query($sql);
    }

    function exist_cart_product(int $us_id, int $pd_id)
    {
        $sql = "SELECT * 
                FROM `cart`
                WHERE `us_id` = $us_id
                AND `pd_id` = $pd_id;";

        $result = $this->connection->query($sql);
        return $result->num_rows == 0 ? false : true;
    }

    function get_cart_product_by_pd_id(int $us_id, int $pd_id)
    {
        $sql = "SELECT * 
                FROM `cart`
                WHERE `us_id` = $us_id
                AND `pd_id` = $pd_id;";

        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }
}