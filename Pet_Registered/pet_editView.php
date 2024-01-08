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
    <title>Amir's Purrfect Pets Shop </title>
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
       
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
        
        a {
            color: #4CAF50;
            text-decoration: none;
        }
</style>
</head>
<body>


<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98863_petshopdb";


$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $queryview = "SELECT * FROM PET WHERE Owner_Id ='".$_SESSION["UserID"]."'";
    $resultQ = $conn->query($queryview);

?>

<form action="pet_editDetails.php" method="POST">
<h2> Amir's Purrfect Pets Shop</h2>

<p> Choose which record you want to update </p>

<table border="2">
<tr>
 <th> Choose </th>
 <th> Pet ID</th>
 <th> Pet Name</th>
 <th> Pet Type</th>
 <th> Pet Breed</th>
 <th> Pet Color</th>
 <th> Pet Age</th>
 <th> Pet Sex</th>
 <th> Pet Price</th>
</tr>

<?php 
if ($resultQ->num_rows>0){
    while($row = $resultQ->fetch_assoc()){
        ?>
        <tr>
            <td><input type="radio"  name="PetId" value="<?php echo $row["Pet_ID"]?>"required></td>
            <td><?php echo $row['Pet_ID'] ?></td>
            <td><?php echo $row['Pet_Name'] ?></td>
            <td><?php echo $row['Pet_Type'] ?></td>
            <td><?php echo $row['Pet_Breed'] ?></td>
            <td><?php echo "<b style='color:$row[Pet_Color];'>$row[Pet_Color]</b>"; ?></td>
            <td><?php echo $row['Pet_Age'] ?></td>
            <td><?php echo $row['Pet_Sex'] ?></td>
            <td><?php echo $row['Pet_Price'] ?></td>
        </tr>

        <?php
        }
    }else{
        echo "<tr><td colspan='8'>NO DATA SELECTED MADAMMMM....</td></tr>";
    }
}
?>
</table>
<?php
$conn->close();
?>

<br/>
<input type="submit" value="View Record to Edit">
<p><a href="viewpet.php" >View pet list</a></p>
<p><a href="menu.php">MENU</a></p>

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
