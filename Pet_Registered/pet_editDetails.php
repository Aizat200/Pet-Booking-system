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
        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        #one {
            width: 50%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .two{
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
</style>
</head>
<body>


<?php

$petIdToEdit = $_POST["PetId"];

$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98863_petshopdb";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else{
    $queryGet="SELECT * FROM PET WHERE Pet_ID = $petIdToEdit";
    $resultGet=$conn->query($queryGet);

    if ($resultGet->num_rows > 0){
?>
    <form action="pet_editSave.php" name="UpdateForm" method="POST">
    <h2> Amir's Purrfect Pets Shop </h2>

<p style="color:blue;font-weight:bold;">UPDATE PET DETAILS </p>

        <?php

        while($row = $resultGet->fetch_assoc()){
        ?>
            Pet ID: <b><?php echo $row['Pet_ID'];?></b>
            <br><br>
            Pet Name: <input type="text" id="one" name="Pet_Name" value="<?php echo $row['Pet_Name'];?>" maxlength="15" required autofocus>
        <br><br>
        Pet Type:
        <?php $PType=trim($row['Pet_Type']);
        //echo $PType;
        ?>
        
        <select name="Pet_Type" id="one" required>
            <option value="" >-Please choose-</option>
            <option value="Cat"<?php if($PType == "Cat") echo "selected";?>>Cat</option>
            <option value="Dog"<?php if($PType == "Dog") echo "selected";?>>Dog</option>
            <option value="Bird" <?php if($PType == "Bird") echo "selected";?>>Bird</option>
            <option value="Rabbit" <?php if($PType == "Rabbit") echo "selected";?>>Rabbit</option>
        </select>
        <br><br>
        Pet Breed: <input type="text" id="one" name="Pet_Breed" value="<?php echo $row['Pet_Breed'];?>" maxlength="20" required>
        <br><br>
        Pet Color: <input type="color" name="Pet_Color" value=<?php echo $row['Pet_Color'];?> required>
        <br><br>
        Pet Age(month): <input type="number" id="one" name="Pet_Age" value="<?php echo $row['Pet_Age'];?>" min="1" required>
        <br><br>
        Pet Sex:
        <?php $PSex=$row['Pet_Sex'];?>
        <input type="radio" name="Pet_Sex" value="Female" <?php if($PSex == "Female") echo"checked";?>>Female
        <input type="radio" name="Pet_Sex" value="Male" <?php if($PSex == "Male") echo"checked";?>>Male
        <br><br>
        Pet Price <i style="color:red">(min = $10):</i>
        <input type="number" id="one" name="Pet_Price" value="<?php echo $row['Pet_Price'];?>" min="10" step="0.01" required>
        <br><br>

        <?php
        
        ?>
        <br><br>
        <input type="hidden" name="PetId" value="<?php echo $row['Pet_ID'];?>">
        <input type="submit" class="two" value="Update New Details">
    </form>

    <?php
        }
        }
    }
    $conn->close();
    
?>

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
