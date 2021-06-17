<?php 
require_once "core/database.php";
require_once "core/utils.php";

    $garages = findAllGarages();

    $titlePage = "Garages";

    render("garages/garages",
            compact('garages', 'titlePage')
        );

?>





