<?php

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(!empty($_POST['email'])  && !empty($_POST['password'])){

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        }else {
            try{
                $db= new PDO("mysql:host=localhost;dbname=centre", "root", "");
                $stm = $db->prepare("SELECT * FROM `user` WHERE `EMAIL`=:email AND `passowrd`=:password");
                $stm->bindParam(":email", $email);
                $stm->bindParam(":password", $password);
                $stm->execute();
    
                if($stm->rowCount() > 0){
                    echo "user";
                }else{
                    $db= new PDO("mysql:host=localhost;dbname=centre", "root", "");
                    $stm = $db->prepare("SELECT * FROM `admin` WHERE `email`=:email AND `password`=:password");
                    $stm->bindParam(":email", $email);
                    $stm->bindParam(":password", $password);
                    $stm->execute();

                    if($stm->rowCount() > 0){
                        echo "admin";
                    }else{
                        echo "Password or email incorrect";
                    }
                    
                }

                
                
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
  
}else{
    echo "Please fill out all the fields!";
}




