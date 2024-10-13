<?php
trait Register
{
    function register_user()
    {
        $errors = [];
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            if (empty($_POST['username'])) {
                $errors['name'] = 'Name is required';
            }
            if (empty($_POST['phone'])) {
                $errors['phone'] = 'phone is required';
            } else {
                if (!preg_match('/^0\d{9}$/', $phone)) {
                    $errors['phone'] = 'Invalid phone number';
                }
            }
            if (empty($_POST['password'])) {
                $errors['password'] = 'password is required';
            } else {
                if (strlen($_POST['password']) < 5) {
                    $errors['password'] = 'độ dài không đủ';
                }
            }
            var_dump($errors);
            if (empty($errors)) {
                $sql = "INSERT INTO user(us_name, us_number_phone, us_password) 
                    VALUES ('$username', '$phone', '$password')";
                $query = mysqli_query($this->connection, $sql);
                if ($query) {
                    return "Đăng ký thành công!";
                }
            }
        }
    }
}