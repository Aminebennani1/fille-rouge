<?php
$fullname = $Email = $phone = $date = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = test_input($_POST["fullname"]);
    $Email = test_input($_POST["Email"]);
    $phone = test_input($_POST["phone"]);
    $date = test_input($_POST["date"]);

    if (!empty($fullname) && !empty($Email) && !empty($phone) && !empty($date)) {
        try {
            // Configuration de la base de données
            $servername = "localhost";
            $dbname = "centre";
            $username = "root";
            $password = "";

            // Connexion à la base de données
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Utilisation de requêtes préparées pour éviter les injections SQL
            $sql = "INSERT INTO reserve (Name, email, phone_nmber, DATE) VALUES (:fullname, :email, :phone, :date)";
            $stmt = $conn->prepare($sql);

            // Liaison des paramètres
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $Email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':date', $date);

            // Exécution de la requête
            $stmt->execute();
            echo "true";
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }

        // Fermeture de la connexion
        $conn = null;
    } else {
        echo "Tous les champs sont obligatoires.";
    }
} else {
    echo "Requête non valide.";
}
?>
