<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Add Recipe</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
   <form name= "addRecipe" action = "process.php" method="post" autocomplete="off">
        <fieldset><legend>New Recipe</legend>
        <p>Title: <input type="text" name="name" style="margin-left:45px; width:90%" required/></p>
        
        <p>Ingredients: <input type="text" name= "ingredients" style="height:250px;width:90%" required/></p>
        <p>Instructions: <input type="text" name= "message" style="height:250px;width:90%"required/></p>
        <p><input type="submit" name="add" value= "Add" style="margin:0 auto;display: block"/></p>
        <p><input type="button" name="main" onclick="location.href='main.php'" value= "Go Back" style="margin:0 auto;display: block"/></p>
        </fieldset>
   </form>
</body>
</html>