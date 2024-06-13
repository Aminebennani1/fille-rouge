<?php

$conn = new PDO("mysql:host=localhost;dbname=centre", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($_SERVER['REQUEST_METHOD'] =="GET"){
    $USER_ID = $_GET["id"];
    try {
        $stmt = $conn->prepare("SELECT FIRSTNAME, PHONE_NUMBER, EMAIL  FROM user WHERE USER_ID=$USER_ID");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}

if($_SERVER['REQUEST_METHOD'] =="POST"){
    $USER_ID = $_GET["id"];
    $FIRSTNAME = $_POST["FIRSTNAME"];
    $PHONE_NUMBER = $_POST["PHONE_NUMBER"];
    $EMAIL = $_POST["EMAIL"];
    try {
        $stmt = $conn->prepare("UPDATE user SET FIRSTNAME='$FIRSTNAME',PHONE_NUMBER='$PHONE_NUMBER' ,EMAIL='$EMAIL' WHERE USER_ID=$USER_ID ");
        $stmt->execute();
        header("location:./users.php");
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="all" method="POST">
        FIRSTNAME: <input value="<?php echo $result["FIRSTNAME"]?>" type="text" name="FIRSTNAME">
        <br><br>
        PHONE_NUMBER: <input value="<?php echo $result["PHONE_NUMBER"]?>" type="text" name="PHONE_NUMBER">
        <br><br>
        EMAIL: <input value="<?php echo $result["EMAIL"]?>" type="text" name="EMAIL">
        <br><br>
        <input id="submit" type="submit" name="submit" value="submit">
    </form>
</body>
</html>