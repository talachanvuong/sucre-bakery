<?php
trait Product
{
    function get_products_by_type(int $pdt_id)
    {
        $sql = "SELECT `pd_id`, `pd_name`, `pd_price`, `pd_description`, `pd_image`
                FROM `product`
                WHERE `pdt_id` = $pdt_id;";

        $result = $this->connection->query($sql);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    function get_product_types()
    {
        $sql = "SELECT *
                FROM `product_type`;";

        $result = $this->connection->query($sql);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    function add_product(string $pd_name, int $pd_price, string $pd_description, int $pdt_id, string $pd_image)
    {
        $pd_image = "0x" . bin2hex(file_get_contents($pd_image));

        // pd_image is image so doesn't need to put into ''
        $sql = "INSERT INTO `product` (`pd_name`, `pd_price`, `pd_description`, `pdt_id`, `pd_image`)
            VALUES
            ('$pd_name', $pd_price, '$pd_description', $pdt_id, $pd_image);";

        try {
            $this->connection->query($sql);
            return "Đã thêm thành công!";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    function remove_product(int $pd_id)
    {
        $sql = "DELETE FROM `product`
            WHERE `pd_id` = $pd_id;";

        try {
            $this->connection->query($sql);
            return "Đã xoá thành công!";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    function edit_product(int $pd_id, array $product)
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
        if ($update == "") {
            return "Không có gì thay đổi!";
        }
        
        $update = rtrim($update, ',') ;

        $sql = "UPDATE `product`
            SET $update
            WHERE `pd_id` = $pd_id;";

        try {
            $this->connection->query($sql);
            return "Đã thay đổi thành công!";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}