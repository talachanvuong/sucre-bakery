<?php

trait Modify
{    
    function getUserById($id){
        $sql = "SELECT * FROM user WHERE us_id = '$id'";
        $result = $this->connection->query($sql);
        
        if($result->num_rows == 1){
            $user = $result->fetch_assoc();
            return $user;
        }else {
            return 0;
        }
    }

    function modify()
    {
        if (isset($_SESSION['id']) && isset($_SESSION['usName'])) {
            $error = [];

            if(isset($_POST['name']) && 
               isset($_POST['phone'])){
            

            
                $userName = $_POST['name'];
                $userPhone = $_POST['phone'];
                $adress = $_POST['address'];
                $id = $_SESSION['id'];
            
                if (empty($fname)) {
                  $error['name'] = "Username is required";
                }else if(empty($uname)){
                    $error['phone'] = "phone is required";
                  }else {
                       $sql = "UPDATE user
                               SET us_name='$userName', us_number_phone='$userPhone', us_adress='$adress'
                            WHERE id='$id'";
                       $result = $this->connection->query($sql);
            
                       header("Location:?direct=modify");
                       exit;
                  }
                }
            
            
            }else {
                header("Location:?direct=login");
                exit;
            } 
                       
    }
    
}