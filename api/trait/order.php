<?php
trait Order
{
    function create_order($us_id, $order)
    {
        $od_id = $order["od_id"];
        $od_created_on = $order["od_created_on"];
        $od_delivery_time = $order["od_delivery_time"];
        $od_person_receive = $order["od_person_receive"];
        $od_address = $order["od_address"];
        $od_number_phone = $order["od_number_phone"];
        $od_price = $order["od_price"];

        $sql = "INSERT INTO `order` (`od_id`, `od_created_on`, `od_delivery_time`,
                                     `od_person_receive`, `od_address`, `od_number_phone`,
                                     `od_price`, `od_reason`, `us_id`, `os_id`, `ad_id`)
                VALUES ('$od_id', '$od_created_on', '$od_delivery_time', '$od_person_receive',
                        '$od_address', '$od_number_phone', '$od_price', '', '$us_id', '1', NULL);";

        try {
            $this->connection->query($sql);
            $this->add_to_cash($us_id, $od_id);
            return [
                "success" => true,
                "message" => "Đã đặt hàng thành công!"
            ];
        } catch (\Throwable $th) {
            return [
                "success" => false,
                "message" => $th->getMessage()
            ];
        }
    }

    function add_to_cash($us_id, $od_id)
    {
        $sql = "INSERT INTO `cash` (`pd_id`, `od_id`, `c_quantity`, `c_created_on`)
                SELECT `pd_id`, '$od_id', `ca_quantity`, `ca_created_on`
                FROM `cart`
                WHERE `us_id` = '$us_id';";
        $this->connection->query($sql);
    }

    function get_history_order($us_id)
    {
        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `us_id` = '$us_id'
                ORDER BY `od_created_on` DESC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_order_info($od_id)
    {
        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `od_id` = '$od_id'
                ORDER BY `od_created_on` ASC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_order_products_info($od_id)
    {
        $sql = "SELECT *
                FROM `cash`
                INNER JOIN `product`
                ON `cash`.`pd_id` = `product`.`pd_id`
                WHERE `od_id` = '$od_id'
                ORDER BY `c_created_on` ASC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}