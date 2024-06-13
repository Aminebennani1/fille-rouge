<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <link rel="icon" href="images/adminIcon.png">
    <style>
        @font-face {
            font-family:'Black';
            src: url('../fonts/MPLUSRounded1c-Black.ttf');
        }

        @font-face {
            font-family:'Medium';
            src: url('../fonts/MPLUSRounded1c-Medium.ttf');
        }

        @font-face {
            font-family:'ExtraBold';
            src: url('../fonts/MPLUSRounded1c-ExtraBold.ttf');
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: white;
            font-family: 'ExtraBold';
        }
        .table-container {
            max-width: 100%;
            overflow-x: auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            table-layout: auto;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #3D67FF;
        }
        th {
            background: linear-gradient(to right, #9796f0, #42445A);
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table-container img {
            max-width: 50px;
            height: auto;
        }
        .action-btn {
            background-color: #4A90E2;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .action-btn:hover {
            background-color: #357ABD;
        }
        button {
            cursor: pointer;
            font-family: 'ExtraBold';
        }
        .edit {
            background-color: rgb(115, 232, 166);
            border-color: green;
        }
        .Accepte {
            background-color: greenyellow;
            border-color: #800000;
        }
        a {
            text-decoration: none;
            color: black;
        }
        .headd {
            padding: 0.6vw;
        }
        .headd > button {
            background: linear-gradient(to right, #9796f0, #42445A);
            color: white;
            border: none;
            padding: 0.5vw;
            border-radius: 0.1vw;
            font-family: 'ExtraBold';
        }
        .searchForm {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .searchForm input[type="text"] {
            padding: 5px;
            font-size: 16px;
        }
        .searchForm input[type="submit"] {
            padding: 5px 10px;
            background: linear-gradient(to right, #9796f0, #42445A);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'ExtraBold';
        }
        .searchForm input[type="submit"]:hover {
            background-color: #357ABD;
        }
        #searchResults {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="headd">
    <button onclick="window.location.href = 'admin.php'">Back</button>
</div>

<form name="searchForm" class="searchForm" onsubmit="return searchUser(event)">
    <input type="text" name="searchUser" id="searchUser" placeholder="Search by name or email">
</form>

<div id="searchResults"></div>

<div class="table-container">
    <table class="UsersTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>service</th>
                <th>Edit</th>
                <th>Accepte</th>
            </tr>
        </thead>
        <tbody>

<?php
$servername = 'localhost';
$username = 'root';
$pass = "";

try {
    $connection = new PDO("mysql:host=$servername;dbname=centre", $username, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM user";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

    foreach($results as $result){
        echo "<tr>
            <td>{$result['USER_ID']}</td>
            <td>{$result['FIRSTNAME']}</td>
            <td>{$result['PHONE_NUMBER']}</td>
            <td>{$result['EMAIL']}</td>
            <td>{$result['passowrd']}</td>
            <td><button class='edit'><a href='EditPage.php?id={$result['USER_ID']}'>Edit</a></button></td>
            <td><button class='Accepte'><a href='AcceptePage.php?id={$result['USER_ID']}'>accepte</a></button></td>
        </tr>";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

        </tbody>
    </table>
</div>

<script>
    function searchUser(event) {
        event.preventDefault();
        const query = document.getElementById('searchUser').value.trim().toLowerCase();
        const rows = document.querySelectorAll('.UsersTable tbody tr');

        rows.forEach(row => {
            const name = row.cells[1].textContent.trim().toLowerCase();
            const email = row.cells[3].textContent.trim().toLowerCase();
            if (name.includes(query) || email.includes(query)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    document.getElementById('searchUser').addEventListener('input', function() {
        const query = this.value.trim().toLowerCase();
        const rows = document.querySelectorAll('.UsersTable tbody tr');

        rows.forEach(row => {
            const name = row.cells[1].textContent.trim().toLowerCase();
            const email = row.cells[3].textContent.trim().toLowerCase();
            if (name.includes(query) || email.includes(query)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
