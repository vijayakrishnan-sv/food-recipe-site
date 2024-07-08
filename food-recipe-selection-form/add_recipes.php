<?php
$sqlcon = new PDO("mysql:host=localhost;dbname=reciepe_data", "admin", "the_secure_password"); //    To get database connection using PDO
$sqlcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //Setting error mode.
$sql="insert into recipes (
`name`,
`author`,
`rating`,
`prep_time`,
`cook_time`,
`ingredient`,
`description`,
`categry`,
`serves`,
`image`,
`icon`,
`nutrition`,
`method`
) values(:name,:author,:rating,:prep_time,:cook_time,:ingredient,:description,:categry,:serves,:image,:icon,:nutrition,:method)"; // Query for inserting data
$stmt = $sqlcon->prepare($sql); // SQL statement preparation

/**Assigning values for each parameters from the html */
$nutritions="[]";
$ingarr =$_POST['ingredients'];
$ingredients=implode(",",$ingarr);
$methodarr =$_POST['method'];
$method =implode(",",$methodarr);
$icon =  $_POST['icon'];
$name =  $_POST['rpname'];
$author =  $_POST['author'];
$rating =  $_POST['rating'];
$serves =  $_POST['serves'];
$prep_time = $_POST['ptime'];
$cook_time =  $_POST['ctime'];
$description =  $_POST['description'];
$category =  $_POST['categry'];
$image =  null;

if(isset($_POST['rpname']))//check whether recipe name is present
{
    //setting the data for populating the nutritions
    $nutritions='[{"kcal":"'.$_POST['kcal'].'"},{"fat":"'.$_POST['fat'].'g"},{"saturates":"'.$_POST['saturates'].'g"},{"carbs":"'.$_POST['carbs'].'g"},{"sugars":"'.$_POST['sugars'].'g"},{"fibre":"'.$_POST['fibre'].'g"},{"protein":"'.$_POST['protein'].'g"},{"salt":"'.$_POST['salt'].'"}]';
   
    //binding the different parameters with the set values
    $stmt->bindParam(':name',  $name);
     
    $stmt->bindParam(':author',  $author);
    
    $stmt->bindParam(':rating',  $rating);
    
    $stmt->bindParam(':prep_time',  $prep_time);
     
    $stmt->bindParam(':cook_time',  $cook_time);
 
     $stmt->bindParam(':ingredient',  $ingredients);
    
    $stmt->bindParam(':description',  $description);
     
     $stmt->bindParam(':categry',  $category);
  
    $stmt->bindParam(':serves',  $serves);
     
     $stmt->bindParam(':image',  $image);
   
     $stmt->bindParam(':icon',  $icon);
     
     $stmt->bindParam(':nutrition',  $nutritions);
     
    $stmt->bindParam(':method',  $method);
    
    $stmt->execute(); // Executing the SQL query
      
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <meta name="recipe add page" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="layout.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
        </script>
    </head>
    <body>
        <header>
            <h3>CSYM019 - BBC GOOD FOOD RECIPES</h3>
        </header>
        <nav>
            <ul>
                <li><a href="./recipeSelectionForm.php">Recipe Report</a></li>
                <li><a href="./newRecipe.php">New Recipe</a></li>
            </ul>
        </nav>
        <main>
           <p>Recipe Added Successfully<p>
               <br>
               <a href="./newRecipe.php">go Back</a>
        </main>
    
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>
