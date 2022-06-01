<?php
    include "connectrecipe.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href = "style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        //jquery to load more comments upon clicking the show more comments button
        $(document).ready(function(){
            var recipeCount = 2;
            $("button").click(function(){
                    recipeCount = recipeCount + 2;
                    $("#recipes").load("loadrecipes.php", {
                        recipeNewCount: recipeCount
                    });
            });
        });
    </script>
    <title>My recipe database</title>
</head>
<body>
    <h1>Welcome to my recipe page</h1>
    <div id = "recipes">
        <?php
            $sql= "SELECT * from recipetable";
            $Result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($Result)){
                while($row= mysqli_fetch_assoc($Result)){
                    echo "<p>";
                    echo $row['name']."<br>";
                    echo $row['ingredients']."<br>";
                    echo $row['message'];
                    echo "</p>";
                }
               
            }
            else{
                echo "There are no recipes";}
        ?>
    </div>
    <button>Show more recipes</button>
</body>
</html>