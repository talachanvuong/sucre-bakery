<?php
trait Statistic
{
    function get_order_wait_number()
    {
        $sql = "SELECT COUNT(*) as count
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '1';";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc()["count"];
    }

    function get_order_work_number()
    {
        $sql = "SELECT COUNT(*) as count
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '2';";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc()["count"];
    }

    function get_order_done_number()
    {
        $sql = "SELECT COUNT(*) as count
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '3';";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc()["count"];
    }

    function get_order_cancel_number()
    {
        $sql = "SELECT COUNT(*) as count
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '4';";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc()["count"];
    }

    function get_orders_wait()
    {
        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '1'
                ORDER BY `order`.`od_created_on` DESC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_orders_wait_by_page($page, $itemPerPage)
    {
        $indexPage = ($page - 1) * $itemPerPage;

        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '1'
                ORDER BY `order`.`od_created_on` DESC
                LIMIT $indexPage, $itemPerPage;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_orders_work()
    {
        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '2'
                ORDER BY `order`.`od_created_on` DESC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_orders_work_by_page($page, $itemPerPage)
    {
        $indexPage = ($page - 1) * $itemPerPage;

        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '2'
                ORDER BY `order`.`od_created_on` DESC
                LIMIT $indexPage, $itemPerPage;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_orders_done()
    {
        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '3'
                ORDER BY `order`.`od_created_on` DESC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_orders_done_by_page($page, $itemPerPage)
    {
        $indexPage = ($page - 1) * $itemPerPage;

        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '3'
                ORDER BY `order`.`od_created_on` DESC
                LIMIT $indexPage, $itemPerPage;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_orders_cancel()
    {
        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '4'
                ORDER BY `order`.`od_created_on` DESC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_orders_cancel_by_page($page, $itemPerPage)
    {
        $indexPage = ($page - 1) * $itemPerPage;

        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`os_id` = '4'
                ORDER BY `order`.`od_created_on` DESC
                LIMIT $indexPage, $itemPerPage;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_order_statuses()
    {
        $sql = "SELECT *
                FROM `order_status`
                ORDER BY `os_id` ASC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_order_status($od_id)
    {
        $sql = "SELECT *
                FROM `order`
                INNER JOIN `order_status`
                ON `order`.`os_id` = `order_status`.`os_id`
                WHERE `order`.`od_id` = '$od_id';";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    function get_checker($od_id)
    {
        $sql = "SELECT *
                FROM `order`
                INNER JOIN `admin`
                ON `order`.`ad_id` = `admin`.`ad_id`
                WHERE `order`.`od_id` = '$od_id';";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    function update_order_status($od_id, $os_id)
    {
        $sql = "UPDATE `order`
                SET `os_id` = '$os_id'
                WHERE `od_id` = '$od_id';";
        $this->connection->query($sql);
    }

    function update_checker($od_id, $ad_id)
    {
        $sql = "UPDATE `order`
                SET `ad_id` = '$ad_id'
                WHERE `od_id` = '$od_id';";
        $this->connection->query($sql);
    }
}