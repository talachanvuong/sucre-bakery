<?php
trait Login
{
    function login_user()
    {
        if (isset($_POST['phone'])) {
            $err = [];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            if (empty($_POST['phone'])) {
                $err['phone'] = 'phone is required';
            }

            $sql = "SELECT * FROM user WHERE us_number_phone = '$phone'";
            $result = mysqli_query($this->connection, $sql);
            $row = mysqli_fetch_assoc($result);
            $checkPhone = mysqli_num_rows($result);

            if ($checkPhone == 1) {
                if ($password == $row['us_password']) {
                    // Just return result, redirect depend to FE
                    return "Login Success";
                } else {
                    return "Password is incorrect";
                }
            } else {
                return 'Số điện thoại không tồn tại';
            }
        }
    }
}