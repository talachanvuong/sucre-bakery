<?php
trait Order
{
    function createInvoice($us_id)
    {
        // Lấy thông tin người dùng
        $userData = $this->getUserData($us_id);

        if ($userData) {
            $us_name = $userData['us_name'];
            $us_phone = $userData['us_number_phone'];
            $us_address = $userData['us_address'];

            // Lấy thông tin giỏ hàng từ cơ sở dữ liệu
            $cart = $this->getCartData($us_id);
            if (!empty($cart)) {
                $totalAmount = 0;

                // Tính tổng giá trị đơn hàng
                foreach ($cart as $item) {
                    $totalAmount += $item['price'] * $item['quantity'];
                }

                // Xóa dữ liệu giỏ hàng sau khi tạo hóa đơn
                $this->clearCart($us_id);

                return "Hóa đơn đã được tạo thành công! Tổng giá trị: " . number_format($totalAmount, 0, ',', '.') . " VNĐ."; // Định dạng số tiền
            } else {
                return "Giỏ hàng trống. Không thể tạo hóa đơn.";
            }
        } else {
            return "Không tìm thấy thông tin người dùng.";
        }
    }

    function getVouhcer($vc_name, $totalAmount)
    {
        // Lấy thông tin voucher từ cơ sở dữ liệu
        if ($vc_name) {
            $sql = "SELECT vc_discount,vc_id FROM voucher WHERE vc_name = '$vc_name'";
            $result = $this->connection->query($sql);
            $voucher = $result;
            if ($voucher) {
                // Tính toán giảm giá
                return $totalAmount -= $totalAmount * $voucher;
            }
        }
        return 0; // Không có giảm giá
    }

    function saveOrder($od_delivery, $od_address, $od_price, $od_total_price, $us_id, $vc_id, $ad_id, $invoiceId)
    {
        // Lưu thông tin hóa đơn vào cơ sở dữ liệu
        $sql = "INSERT INTO order (od_delivery, od_address, od_price, od_total_price, us_id, vc_id, ad_id)
                VALUES ('$od_delivery', '$od_address', $od_price, $od_total_price,$us_id, $vc_id, $ad_id)";
        $result = $this->connection->query($sql);
        $invoiceId = $result->od_id; // Lấy ID hóa đơn vừa tạo          
    }

    function clearCart($us_id)
    {
        $sql = "DELETE FROM cart WHERE us_id = $us_id";
        $result = $this->connection->query($sql);
    }
}