<?php



$connection = mysqli_connect('localhost', 'root', '', 'db_sucre_web');
mysqli_set_charset($connection, 'utf8');

$errors = [];
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    
    if(empty($_POST['username'])){
        $errors['name'] = 'Name is required';  
    }
    if(empty($_POST['phone'])){
        $errors['phone'] = 'phone is required';
    }else{
        if(!preg_match('/^0\d{9}$/', $phone)){
            $errors['phone'] = 'Invalid phone number';
        }
    }
    if(empty($_POST['password'])){
        $errors['password'] = 'password is required';
    }else{
        if(strlen($_POST['password']) < 5){
            $errors['password'] = 'độ dài không đủ';
        }
    }
    if($password != $confirm_password){
        $errors['password'] = 'password not match';
    }
    var_dump($errors);
    if(empty($errors)){

        $sql = "INSERT INTO user(us_name, us_number_phone, us_password) 
    VALUES ('$username', '$phone', '$password')";
    $qurey = mysqli_query($connection, $sql);
    if($qurey){
        header('Location: login.php ');
    }
}
}
?>
