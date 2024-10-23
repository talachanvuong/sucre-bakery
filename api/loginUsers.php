<?php
trait Login
{
    function login_user()
    {
        if(isset($_POST['phone']) && 
        isset($_POST['password'])){
     
            $error = [];
         $usPhone = $_POST['phone'];
         $pass = $_POST['password'];
     
         if(empty($usPhone)){
            $error['phone'] = "Phone is required";
         }else if(empty($pass)){
             $error['pass'] = "Password is required";
         }else {
     
             $sql = "SELECT * FROM user WHERE us_number_phone = '$usPhone'";
             $result = $this->connection->query($sql);
     
           if($result->num_rows == 1){
               $user = $result->fetch_assoc();
        

               $phone =  $user['us_number_phone'];
               $Password =  $user['us_password'];
               $usName =  $user['us_name'];
               $id =  $user['us_id'];
     
               if($phone === $usPhone){
                  if($Password === $pass){
                      $_SESSION['id'] = $id;
                      $_SESSION['usPhone'] = $phone;
     
                      header("Location: ../home.php");
                      exit;
                  }else {
                    $error = "Incorect User name or password";
                    header("Location: ../login.php");
                    exit;
                 }
     
               }else {
                 $error = "Incorect User name or password";
                 header("Location: ../login.php");
                 exit;
              }
     
           }else {
              $error = "Incorect User name or password";
           }
         }
     
     
     }else {
         header("Location: ../login.php");
         exit;
     }
     
    }
}