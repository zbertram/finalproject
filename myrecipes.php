<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <title>Editor's Choice</title>
    <script>
    function getRecipes(){
        setTimeout(()=>{
            readRecipe('recipes/Chanuka.txt','recipe1','one', 'Potato Latkes - Hannukah');
        },500)
        setTimeout(()=>{
            readRecipe('recipes/Shavuot.txt','recipe2','two','Cheesecake - Shavuot');
        },500)
        setTimeout(()=>{
            readRecipe('recipes/Purim.txt','recipe3','three','Hamentaschen - Purim');
        },500)
    }
    function readRecipe(daRecipe, daDiv, daHeader, daTitle){
        let ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
               document.getElementById(daHeader).innerHTML = daTitle 
               document.getElementById(daDiv).innerHTML = this.responseText 
            }
        }
        ajax.open("POST", daRecipe, true)
        ajax.send();
    }
    </script>
    <?php include 'sidebar.php'?>
</head>
<body onload="getRecipes()">
    <h2>These recipes are from the editor</h2>
    <p>The purpose of this page is to show how a page can be rendered dynamically</p>
    <p><h2 id= "one"></h2></p>
    <p><div class="recipe1" id="recipe1"></div></p>
    <p><h2 id= "two"></h2></p>
    <p><div class="recipe2" id="recipe2"></div></p>
    <p><h2 id= "three"></h2></p>
    <p><div class="recipe3" id="recipe3"></div></p>
    <p><button onclick="location.href='main.php'">Main</button></p>
</body>
</html>