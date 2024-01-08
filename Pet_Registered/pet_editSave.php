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
        font-family: Arial, sans-serif;
        background-image: url(three.gif);
        background-size: cover;
        margin: 0; 
        display: flex;
        justify-content: center; 
        align-items: center;
        height: 100vh; 
        }
        .container {
            
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 320px;
        }
</style>
</head>
<body>
    <div class="container">
    <h2> PET UPDATE SAVE </h2>

<?php

$PetId = $_POST['PetId'];  
$Pet_Name =$_POST['Pet_Name'];
$Pet_Type= $_POST['Pet_Type']; 
$Pet_Breed = $_POST['Pet_Breed'];
$Pet_Color = $_POST['Pet_Color']; 
$Pet_Age = $_POST['Pet_Age'] ;
$Pet_Sex = $_POST['Pet_Sex'] ;
$Pet_Price = $_POST['Pet_Price'];

$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98863_petshopdb";

$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("Connection Failed: ". $conn->connect_error);
}
else{
    $queryUpdate = "UPDATE PET SET  
            Pet_Name = '$Pet_Name',
            Pet_Type = '$Pet_Type',
            Pet_Breed= '$Pet_Breed', 
            Pet_Color= '$Pet_Color', 
            Pet_Age= '$Pet_Age', 
            Pet_Sex= '$Pet_Sex', 
            Pet_Price= '$Pet_Price' WHERE Pet_ID= '$PetId'";

    if($conn->query($queryUpdate)=== TRUE){
        echo "<p style='color:blue;'> Record has been Updated into database !</p>";
        echo "<br><br>";
        echo "Click <a href='ViewPet.php'>here</a> to view pet list";
    }
    else{
        echo "<p style='color:red;'> Error Updating the record! " . $conn->error;
    }

}

$conn->close();
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
