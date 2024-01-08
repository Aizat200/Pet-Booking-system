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
    <title>Amir's Purrfect Pets shop</title>
</head>
<style>
        body {
            
            background-image:url(two.gif);
            background-size:cover;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        table {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>

<?php

    $name = $_POST["Pet_Name"];  
    $mypet = $_POST["Pet_Type"]; 
    $breed = $_POST["Pet_Breed"] ;
    $myWarna = $_POST["Pet_Color"]; 
    $petAge = $_POST["Pet_Age"] ;
    $gender = $_POST["Pet_Sex"] ;
    $price = $_POST["Pet_Price"]; 
?>
<body>
    <div class="container">
    <h1>Pet Registration Details</h1>
    <br>

    <table border=1 >
        <tr>
            <td>Pet Name:</td>
            <td><b style="color:blue;"><?php echo $name; ?></b></td>
        </tr>
        <tr>
            <td>Pet Type:</td>
            <td><b><?php echo $mypet; ?></b></td>
        </tr>
        <tr>
            <td>Pet Breed:</td>
            <td><b><?php echo $breed; ?></b></td>
        </tr>
        <tr>
            <td>Pet Color:</td>
            <td><b><?php echo "<b style='color:$myWarna;' ?>This COLOR </b>"?></b></td>
        </tr>
        <tr>
            <td>Pet Age:</td>
            <td> <b><?php echo $petAge; ?></b> <b> month(s) old</b></td>
        </tr>
        <tr>
            <td>Pet Sex:</td>
            <td><b><?php echo $gender; ?></b></td>
        </tr>
        <tr>
            <td>Pet Price:</td>
            <td><b>RM <?php echo $price; ?></b></td>
        </tr>
    </table>



<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="dc98863_petshopdb";


    $conn=new mysqli($host,$user,$pass,$db);
    if ($conn->connect_error)
    {
        die("It's error SIRRRRRR: " .$conn->connect_error);

    }
   
    else   
    {
        
        $DBquerry="INSERT INTO pet(Pet_Name,Pet_Type,Pet_Breed,Pet_Color,Pet_Age,Pet_Sex,Pet_Price,Owner_Id)
        VALUES('".$name."','".$mypet."','".$breed."','".$myWarna."','".$petAge."','".$gender."','".$price."','".$_SESSION["UserID"]."')";
      
        if ($conn->query($DBquerry) === TRUE)
        {
            echo "<p style='color:blue;'>IT SUCCESS MADAMMMM</p>";
        } 
        else 
        {
            echo "<p style='color:red;'>FAIL TO INSERT MADAMMMMM" .  $conn->error."</p>";
        }
    }    
    $conn->close();
?>
<br>
    <p>Click <a href="pet_form.php">here</a> to enter new pet details.</p>
    <p>Click <a href="ViewPet.php">here</a> view ALL Pet details.</p>
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

