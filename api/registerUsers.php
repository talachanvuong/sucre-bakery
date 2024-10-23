<?php
trait Register
{
    function register_user()
    {
        $errors = [];
        if(isset($_POST['username']) && 
        isset($_POST['phone']) &&  
        isset($_POST['password'])){
     
         $userName = $_POST['username'];
         $userPhone = $_POST['phone'];
         $pass = $_POST['password'];
     
         
         if (empty($userName)) {
            $errors['name'] = "Name is required";
         }else if(empty($userPhone)){
             $errors['phone'] = "Phone is required";
         }else if(empty($pass)){
             $errors['password'] = "Password is required";
         }else {
     
                $sql = "INSERT INTO user(us_name, us_number_phone, us_password) 
                        VALUES('$userName','$userPhone','$pass')";
                $result = $this->connection->query($sql);
     
                header("Location:?direct=login");
                exit;
         }
     
     
     }else {
         header("Location:?direct=resgister");
         exit;
    }
}
}