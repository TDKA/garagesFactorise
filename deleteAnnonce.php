<?php
require_once "core/database.php";
require_once "core/utils.php";

    if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

        $annonce_id = $_GET['id'];
  
  }
     if(!$annonce_id){

        die("Enter valid id in the url");
     }
     
     //find garage by id
     $annonce = findAnnonceById($annonce_id);

    //if don't exist
    if(!$annonce){
        die("this annonce dont exist");
    }

    $garage_id = $annonce['garage_id'];
    
    //delete annonce
     deleteAnnonce($annonce_id);

    //

   redirect('garage.php?id='.$garage_id);

?>