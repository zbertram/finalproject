<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <title>Document</title>
</head>
<body>
    

<?php
    require 'connectrecipe.php';
    session_start();
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($conn, $name);
   
    $ingredients = stripslashes($_REQUEST['ingredients']);
    $ingredients = mysqli_real_escape_string($conn, $ingredients);
    $message = stripslashes($_REQUEST['message']);
    $message = mysqli_real_escape_string($conn, $message);

    if(isset($_POST['submit'])){
        $title= $_POST['name'];
        echo "Name: " .$title . "<br />";
        
        $ingredients = $_POST['ingredients'];
        echo "Ingredients: " .$ingredients . "<br />";
        $message = $_POST['message'];
        echo "Instructions: ".$instructions."<br />";
    }
    $query    = "INSERT INTO recipeTable(name,ingredients,message) VALUES ('$name', '$ingredients','$message')";
    $result   = mysqli_query($conn, $query);
   
    header("Location: userREcipes.php");
        
    echo "Your recipe was added - check it out on the database. 
    <p>Click here to see your recipe<button onclick='location.href='userRecipes.php''>Main</button></p>
    ";
?>
</body>
</html>