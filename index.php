<?php
session_start();
if(!isset($_SESSION["success"])){
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <h1>This is the homepage</h1>
        <?php
        if(isset($_SESSION['success'])): ?>
        <div>
            <h3>
                <?php
                   echo $_SESSION['success'];
                   unset($_SESSION['success']);
                ?>
            </h3>
        </div>
        <?php endif ?>
        <!-- if the user logs in print information about the user  -->
        <?php if(isset($_SESSION['username'])): ?>
            <h3>Welcome <strong> <?php echo $_SESSION['username']; ?> </strong></h3><br>

            <p></p>
            <div>
                    
            <p>Click here to check out our main page<button onclick="location.href='main.php'">Main</button></p>
                    
                   
              </div>
            <p><a href="logout.php">Logout</a></p>
        <?php endif ?>
    </body>
</html>