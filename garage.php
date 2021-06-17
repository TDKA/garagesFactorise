<?php 

require_once "core/database.php";
require_once  "core/utils.php";

$garage_id= null;


// ctype_digit / empty methods
if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

    $garage_id = $_GET['id'];
}

if(!$garage_id) {
   die("il faut ajouter un id dans l'url"); 
}

// *******Find garages ********* ///

$garage = findGarageById($garage_id);


//******  Annonces   *****/


$annonces = findAllAnnoncesByGarage($garage_id);

$titlePage = "Garage";

                    // var_dump($garage);
                    
     render("garages/garage",
            compact('garage', 'annonces', 'titlePage')
        );

            

?>