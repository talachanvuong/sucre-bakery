<?php
trait Product
{
    function get_products()
    {
        $sql = "SELECT *
                FROM `product`
                ORDER BY `pd_id` ASC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_products_by_keyword($keyword)
    {
        $sql = "SELECT *
                FROM `product`
                WHERE `pd_name` LIKE '%$keyword%'
                ORDER BY `pd_id` ASC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_product_by_id($pd_id)
    {
        $sql = "SELECT *
                FROM `product`
                WHERE `pd_id` = $pd_id;";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    function get_products_by_type($pdt_id)
    {
        $sql = "SELECT *
                FROM `product`
                WHERE `pdt_id` = $pdt_id
                ORDER BY `pdt_id` ASC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_product_type_by_id($pdt_id)
    {
        $sql = "SELECT *
                FROM `product_type`
                WHERE `pdt_id` = $pdt_id;";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    function get_product_types()
    {
        $sql = "SELECT *
                FROM `product_type`
                ORDER BY `pdt_id` ASC;";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function add_product($pd_name, $pd_price, $pd_description, $pdt_id, $pd_image)
    {
        $pd_image = "0x" . bin2hex(file_get_contents($pd_image));

        // pd_image is image so doesn't need to put into ''
        $sql = "INSERT INTO `product` (`pd_name`, `pd_price`, `pd_description`, `pdt_id`, `pd_image`)
                VALUES ('$pd_name', $pd_price, '$pd_description', $pdt_id, $pd_image);";

        try {
            $this->connection->query($sql);
            return [
                "success" => true,
                "message" => "Đã thêm thành công!"
            ];
        } catch (\Throwable $th) {
            return [
                "success" => false,
                "message" => $th->getMessage()
            ];
        }
    }

    function remove_product($pd_id)
    {
        $sql = "DELETE FROM `product`
                WHERE `pd_id` = $pd_id;";

        try {
            $this->connection->query($sql);
            return [
                "success" => true,
                "message" => "Đã xoá thành công!"
            ];
        } catch (\Throwable $th) {
            return [
                "success" => false,
                "message" => $th->getMessage()
            ];
        }
    }

    function edit_product($pd_id, $product)
    {
        $update = "";

        $pd_name = $product["pd_name"] ?? null;
        $pd_price = $product["pd_price"] ?? null;
        $pd_description = $product["pd_description"] ?? null;
        $pdt_id = $product["pdt_id"] ?? null;
        $pd_image = $product["pd_image"] ?? null;

        if ($pd_name) {
            $update .= "`pd_name` = '$pd_name',";
        }

        if ($pd_price) {
            $update .= "`pd_price` = $pd_price,";
        }

        if ($pd_description) {
            $update .= "`pd_description` = '$pd_description',";
        }

        if ($pdt_id) {
            $update .= "`pdt_id` = $pdt_id,";
        }

        if ($pd_image) {
            $pd_image = "0x" . bin2hex(file_get_contents($pd_image));

            // pd_image is image so doesn't need to put into ''
            $update .= "`pd_image` = $pd_image,";
        }

        // Avoid spamming button when nothing changes
        if ($update === "") {
            return [
                "success" => true,
                "message" => "Không có gì cập nhật!"
            ];
        }

        $update = rtrim($update, ',');

        $sql = "UPDATE `product`
                SET $update
                WHERE `pd_id` = $pd_id;";

        try {
            $this->connection->query($sql);
            return [
                "success" => true,
                "message" => "Đã cập nhật thành công!"
            ];
        } catch (\Throwable $th) {
            return [
                "success" => false,
                "message" => $th->getMessage()
            ];
        }
    }
}