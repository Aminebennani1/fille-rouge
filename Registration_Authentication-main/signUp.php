<?php
$nbrErr =0;
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])  && !empty($_POST['password'])  && !empty($_POST['passwordConf'])){
        $name = validate($_POST['name']);
        $phone = validate($_POST['phone']);
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        $passwordConf = validate($_POST['passwordConf']);
    
        // validate password
        if(strlen($password) < 8){
            $nbrErr++;
            echo "Password must be longer than 8 characters";
        }else if($password !=  $passwordConf){
            $nbrErr++;
            echo "Passwords do not match";
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //validate email
            $nbrErr++;
            echo "Invalid email format";
        }else{
            try{
                $db= new PDO("mysql:host=localhost;dbname=centre", "root", "");
                $stm = $db->prepare("SELECT * FROM `user` WHERE email=:email");
                $stm->bindParam(":email", $email);
                $stm->execute();
    
                if($stm->rowCount() >0){
                    $nbrErr++;
                    echo "Email already exist!";
                }
                
    
                //insert data of user
    
                if($nbrErr<=0){
                    $stm = $db->prepare("INSERT INTO `user` (`FIRSTNAME`,`PHONE_NUMBER`,`EMAIL`,`passowrd`) VALUES(:nameU,:phone, :email, :password)");
                    $stm->bindParam(":nameU", $name);
                    $stm->bindParam(":phone", $phone);
                    $stm->bindParam(":email", $email);
                    $stm->bindParam(":password", $password);
                    $stm->execute();
    
                    echo "true";
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

}else{
    echo "Please fill out all the fields!";
}


