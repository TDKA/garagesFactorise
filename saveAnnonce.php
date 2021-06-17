
<?php
 
 require_once "core/database.php";
 require_once "core/utils.php";
    
$garage_id = null;
$name = null;
$price = null;

if(!empty($_POST['garageId']) && ctype_digit($_POST['garageId']) ){
    $garage_id = $_POST['garageId'];
}

if(!empty($_POST['name']) && !empty($_POST['price']) ){
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);
}

if( !$garage_id || !$name || !$price ){
    die("incorrectly completed form");
}


// Find garage by id
$garage = findGarageById($garage_id);

  if(!$garage){

    die("This garage do not exist!");

  }

//insert new Annonce
insertAnnonce($name, $price, $garage_id);

//Redirect 
redirect('garage.php?id='.$garage_id);


/// 1. Watch POST

// 2. Check the three data transmitted by POST

///3.  make a request to verify  if the garage exist

//4. if the garage is non-existent => die();

//NEXT ->

//5. INSERT new annonce (requestSQL)

//6. Redirection to the garage page




