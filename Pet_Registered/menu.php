<!DOCTYPE html>
<?php
    session_start();

    if(isset($_SESSION['UserID'])) {
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amir's PURRFECT PETS SHOP</title>
    
    <style>
        body {
        font-family: Arial, sans-serif;
        background-image: url(one.gif);
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
        h2 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }
        a {
            display: block;
            width: 200px;
            padding: 10px;
            margin: 10px auto;
            text-align: center;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>WELCOME, Hi <?php echo htmlspecialchars($_SESSION['UserID']); ?></h2>
    <p>Choose your menu:</p>
    <?php
        if ($_SESSION['UserType'] == "admin") {
    ?>
        <a href="ViewPet_Admin.php">View Pet List</a>
    <?php
        } else {
    ?>
        <a href="pet_form.php">Register New Pet</a>
        <a href="pet_editView.php">Edit Pet Details</a>
        <a href="pet_editView.php">Delete Pet Details</a>
        <a href="ViewPet.php">View Pet List</a>
    <?php
        }
    ?>
    <a href="logout.php">Log out</a>
    </div>
</body>
</html>
<?php
    } else {
        echo "No session exists or session has expired. Please log in again.<br>";
        echo "<a href='login.html'>Login</a>";
    }
?>
