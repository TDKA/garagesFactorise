<?php
require_once "core/utils.php";
require_once "core/database.php";

if(isset($_GET['id'])) {

    if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

        $garage_id = $_GET['id'];

        //DB connect
        $pdo = getPdo();

        if($garage_id) {
         

            $garage = findGarageById($garage_id);

            if(!$garage) {

                    die("Désolé mais ce garage n'existe pas");

                }
                $delete = deleteGarage($garage_id);

                redirect('index.php');
        }

    }
}
?>