<?php 

function getPdo() {

    $pdo = new PDO('mysql:host=localhost:3304; dbname=garage', 'garage', 'garage', [
    
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,

    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


    return $pdo;
}


/**
 * return an array that contains ALL THE GARAGES from the table garages
 * @return array
 * 
 */
function findAllGarages() :array {

    $pdo = getPdo();

     $result = $pdo -> query('SELECT * FROM garages');

    $garages = $result -> fetchAll();

    return $garages;
}

/**
 * find garage from its id and 
 * return an array of ONE GARAGE that contains the ID of this garage  or boolean if its the garage don't exist
 * @param int
 * @return array|bool 
 */
function findGarageById(int $garage_id): array {

$pdo = getPdo();

$requete = $pdo->prepare("SELECT * FROM garages WHERE id = :garage_id");

$requete->execute(['garage_id' => $garage_id]);

$garage = $requete->fetch() ;

return $garage;

}

/**
 * find all annonces from a garage and return array or boolean 
 * 
 * @param int $garage_id
 * @return array|bool
 */

function findAllAnnoncesByGarage(int $garage_id) {

    $pdo = getPdo();

    $requestAnnonces = $pdo->prepare("SELECT * FROM annonces WHERE garage_id = :garage_id");

    $requestAnnonces->execute(['garage_id' => $garage_id]);

    $annonces = $requestAnnonces->fetchAll();

    return $annonces;

}

/**
 * find ONE annonce by its ID and return array or boolean 
 * @param int $annonce_id
 * @return array|bool
 */
 function findAnnonceById(int $annonce_id) {

     $pdo = getPdo();

    $req = $pdo->prepare("SELECT * FROM annonces WHERE id =:annonce_id");

    $req->execute(['annonce_id' => $annonce_id]);

    $annonce = $req->fetch();

    return $annonce;

 }

/**
 * Delete garage by its ID
 * 
 * @param int $garage_id
 * @return void 
 * 
 */
 function deleteGarage(int $garage_id): void {

    $pdo = getPdo();

    $delete = $pdo->prepare("DELETE FROM garages WHERE id = :garage_id");

    $delete->execute(['garage_id' => $garage_id]);

    redirect('index.php');
 }



/**
 * 
 * Delete one annonce by its ID
 * 
 * @param int $annonce_id
 */
function deleteAnnonce(int $annonce_id): void {

    $pdo = getPdo();

    $garage_id = $annonce['garage_id'];
    
    $reqDeleteArticle = $pdo->prepare("DELETE FROM annonces WHERE id =:annonce_id");

    $reqDeleteArticle->execute(['annonce_id' => $annonce_id]);

}
/**
 * Add new annonce
 * @param string $name
 * @param int $price
 * @param int $garage_id
 * @return void
 */
function insertAnnonce(string $name, int $price, int $garage_id): void{

    $pdo = getPdo();

    $reqAddAnnonce = $pdo->prepare("INSERT INTO annonces (name, price, garage_id) 
                                    VALUES (:name, :price, :garage_id)");

    $reqAddAnnonce->execute([
                            'name' => $name,
                            'price' => $price,
                            'garage_id' => $garage_id

                        ]);

}

?>