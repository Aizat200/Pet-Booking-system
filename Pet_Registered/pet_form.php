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
            background-image: url(two.gif);
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1, h4 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
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

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            color: red;
        }
    </style>
</head>
<body>

    <form name="PetForm" action="pet_register.php" method="post">
        <h1>Pet Registration Form</h1>
        <h4>Enter Pet Details:</h4>
        <p><i>All fields are required*</i></p>

        Pet Name: <input type="text" name="Pet_Name" id="one" maxlength="15" required>
        <br><br>
        Pet Type: 
        <select id="one"  name="Pet_Type" required>
            <option value="" >-Please choose-</option>
            <option value="Cat">Cat</option>
            <option value="Dog">Dog</option>
            <option value="Bird">Bird</option>
            <option value="Rabbit">Rabbit</option>
        </select>
        <br><br>
        Pet Breed: <input type="text" id="one" name="Pet_Breed" maxlength="20" required>
        <br><br>
        Pet Color: <input type="color" name="Pet_Color" required><i style="color:red;">*</i>
        <br><br>
        Pet Age(month): <input type="number" id="one" name="Pet_Age" min="1" required>
        <br><br>
        Pet Sex: 
        <input type="radio" name="Pet_Sex" value="Female" checked>Female
        <input type="radio" name="Pet_Sex" value="Male">Male
        <br><br>
        Pet Price <i style="color:red">(min = $10):</i>
        <input type="number" id="one" name="Pet_Price" min="10" step="0.01" required>
        <br><br>
        
        <a href="pet_register.php"><input  class="two" type="submit" value="Display Pet Details"></a>
        <input class="two" type="reset" value="Cancel">
    </form>
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
