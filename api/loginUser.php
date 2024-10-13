<?php
    $connection = mysqli_connect('localhost', 'root', '', 'db_sucre_web');
    mysqli_set_charset($connection, 'utf8');

    if(isset($_POST['phone'])){
        $err = [];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        if(empty($_POST['phone'])){
            $err['phone'] = 'phone is required';
        }

        $sql = "SELECT * FROM user WHERE us_number_phone = '$phone'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $checkPhone = mysqli_num_rows($result);

        if($checkPhone == 1){
            if($password == $row['us_password']){
                echo "Login Success";
                header('location: overview.php');
            }else{
                echo "Password is incorrect";
            }
        }else{
            echo 'Số điện thoại không tồn tại';
        }
    }
?>


