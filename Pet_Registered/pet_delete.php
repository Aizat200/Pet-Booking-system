<!DOCTYPE html>
<?php
session_start();
//check if session exists
if(isset($_SESSION["UserID"])) {
?>

<html>
<head>
<title>Amir's Purrfect Pets Shop</title>
<style>
body {
            background-image:url(three.gif);
            background-size:cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            width: 1
        }
</style>
</head>
<body>
    <div class="container">
<h2> Amir's Purrfect Pets Shop </h2>
<?php

    $petIdToDelete = $_POST["PetId"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dc98863_petshopdb";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $deleteQuery = "DELETE FROM PET WHERE Pet_ID = $petIdToDelete";

        if ($conn->query($deleteQuery) === TRUE) {
            echo "<p style='color: blue;'>Record has been deleted from the database!</p>";
            echo "<br><br>";
            echo "Click <a href='viewPet.php'>here</a> to view Pet list"; 
        } else {
            echo "<p style='color: red;'>Error deleting record: " . $conn->error . "</p>";
        }

        $conn->close();
    }

?>
</div>
</body>
</html>
<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>
