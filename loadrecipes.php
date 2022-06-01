<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <title>User Recipes</title>
</head>
<body>
    <div class="main">
        <h2>Recipes Page</h2>
        <?php
    include 'connectrecipe.php';
    //$recipeNewCount = $_POST['recipeNewCount'];
    //$sql = "SELECT * FROM recipetable limit $recipeNewCount";
    $sql = "SELECT * FROM recipetable";
    $Result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($Result)){
        while($row = mysqli_fetch_assoc($Result)){
            echo "<p>";
            echo $row['name']."<br>";
            echo $row['ingredients']."<br>";
            echo $row['message'];
            echo "</p>";
        }
        
    }
    else{
        echo "There are no recipes";
    }
?>
    <p><button onclick="location.href='addRecipe.php'">Add Recipe</button></p>
    <p><button onclick="location.href='main.php'">Main</button></p> 
    </div>

</body>
