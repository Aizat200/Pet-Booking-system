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

</style>
<body>
    <div class="container">
<?php
session_start();
if (isset($_SESSION["UserID"]))
{
session_unset();
session_destroy();
echo "<br><p style='color:red;'>You have successfully logged out.</p>";
echo "<br>Click <a href='login.html'> here </a> to LOGIN again.";
} else {
echo " No session exists or session is expired. Please log in again";
echo "<br>Click <a href='login.html'> here </a> to LOGIN again.";
}
?>
</div>
</body>