<?php
$mysqli = new PDO("mysql:host=localhost;dbname=top_albums", "admin", "the_secure_password");//database connection
$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//set error mode
//creating sql querry
$sql="insert into reciepe_data (
`name`,
`author`,
`rating`,
`levels`,
`serves`,
`prep_time`,
`cook_time`,
`description`,
`ingredient`,
`nutrition`,
`preparation`
) values(:name,:author,:rating,:levels,:serves,:prep_time,:cook_time,:description,:nutritions,:ingredient,:preparation)";
$stmt = $mysqli->prepare($sql);// prepare sql query

$nutritions=mysqli_real_escape_string($con, implode(", ", $_POST['nutrition']));
$ingredients = mysqli_real_escape_string($con, implode("\n", $_POST['ingredients']));
$method = mysqli_real_escape_string($con, implode("\n", $_POST['method']));
$icon = mysqli_real_escape_string($con, $_POST['icon']);

if(true)//check whether kcal and step1 is present
{
    //construct nutritions object
    //$nutritions='{"kcal":"'.$_POST['kcal'].'","fat":"'.$_POST['fat'].'","saturates":"'.$_POST['saturates'].'","carbs":"'.$_POST['carbs'].'","sugar":"'.$_POST['sugar'].'","fibre":"'.$_POST['fibre'].'","protein":"'.$_POST['protein'].'","salt":"'.$_POST['salt'].'"}';
    //construct method object
    //$method='{"step1":"'.$_POST['step1'].'","step2":"'.$_POST['step2'].'","step3":"'.$_POST['step3'].'","step4":"'.$_POST['step4'].'"}';
    //bind name param
    $stmt->bindParam(':name',  $_POST['name']);
     //bind author param
    $stmt->bindParam(':author',  $_POST['author']);
     //bind rating param
    $stmt->bindParam(':rating',  $_POST['rating']);
    //bind difficulty param
    $stmt->bindParam(':levels',  $_POST['difficulty']);
    //bind serves param
    $stmt->bindParam(':serves',  $_POST['serves']);
    //bind preptime param
    $stmt->bindParam(':prep_time',  $_POST['preptime']);
     //bind cooktime param
    $stmt->bindParam(':cook_time',  $_POST['cooktime']);
     //bind description param
    $stmt->bindParam(':description',  $_POST['description']);
     //bind nutritions param
    $stmt->bindParam(':nutritions',  $nutritions);
     //bind ingredients param
     $stmt->bindParam(':nutritions',  $nutritions);
     //bind ingredients param
    $stmt->bindParam(':ingredient',  $ingredients);
     //bind method param
    $stmt->bindParam(':preparation',  $method);
     //insert recipe
    $stmt->execute();
      
}




?>