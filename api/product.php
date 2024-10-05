<?php
trait Product
{
    function get_products_by_type($pdt_id)
    {
        $sql = "SELECT pd_name, pd_price, pd_description, pd_image
                FROM product
                WHERE pdt_id = $pdt_id;";

        $result = $this->connection->query($sql);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    function get_product_types()
    {
        $sql = "SELECT pdt_id, pdt_name
                FROM product_type;";

        $result = $this->connection->query($sql);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}