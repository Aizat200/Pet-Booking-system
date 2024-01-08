<!DOCTYPE html>
<?php
session_start();
//check if session exists
if(isset($_SESSION["UserID"])) {
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amir's Purrfect Pets Shop</title>
    <style>
        body {

            background-image:url(two.gif);
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
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin: 0 auto;
            text-align: left;
            border-collapse: collapse;
        }

         td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th{
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            font-size:12px;
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
<h1>Amir's Purrfect Pets Shop</h1>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98863_petshopdb";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $queryview = "SELECT * FROM PET ";

    $result = $conn->query($queryview); 

    ?>
    
    <table border="2">
    <tr>
        <th>Pet ID</th>
        <th>Pet Name</th>
        <th>Pet Type</th>
        <th>Pet Breed </th>
        <th>Pet Color</th>
        <th>Pet Age</th>
        <th>Pet Sex</th>
        <th>Pet Price</th>
        <th>Owner Id</th>
    </tr>    

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>

        <tr>
            <td><b style="color:Orange"><?php echo $row['Pet_ID']; ?></td>
            <td><?php echo $row['Pet_Name']; ?></td>
            <td><?php echo $row['Pet_Type']; ?></td>
            <td><?php echo $row['Pet_Breed']; ?></td>
            <td><?php echo "<b style='color:$row[Pet_Color];'>$row[Pet_Color]</b>"; ?></td>
            <td><?php echo $row['Pet_Age']; ?></td>
            <td><?php echo $row['Pet_Sex']; ?></td>
            <td><?php echo $row['Pet_Price']; ?></td>
            <td><?php echo $row['Owner_Id']; ?></td>
        </tr>

    <?php
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
    </table>
    <br>
    <p>Click <a href="pet_form.php" target="_self">here</a> to INSERT enter Pet details</p>
    <p>Click <a href="pet_deleteView.php" target="_self">here</a> to DELETE Pet list.</p>   
    <p>Click <a href="pet_editView.php" target="_self">here</a> to EDIT Pet list</p>
    <a href="menu.php" target="_self">MENU</p>

    <?php
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
