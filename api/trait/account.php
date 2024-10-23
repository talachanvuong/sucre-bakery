<?php
trait Account {
    function login_admin($ad_name, $ad_password)
    {
        $sql = "SELECT *
                FROM `admin`
                WHERE `ad_name` = '$ad_name';";

        $result = $this->connection->query($sql)->fetch_assoc();
        
        if (empty($result)) {
            return [
                "success" => false,
                "message" => "Tài khoản không tồn tại"
            ];
        }
        
        if ($result["ad_password"] != $ad_password) {
            return [
                "success" => false,
                "message" => "Sai mật khẩu!"
            ];
        }

        $_SESSION["ad_info"] = $result;
        return [
            "success" => true,
            "message" => "Đăng nhập thành công!"
        ];
    }
}