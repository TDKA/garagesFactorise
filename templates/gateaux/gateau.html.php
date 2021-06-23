
<a href="http://localhost/php/garagePOO/index.php?controller=gateau&task=index" class="btn btn-primary">Retour à l'accueil de gateaux </a>

<h2><?php echo $gateau['name'] ?></h2>
<h2><?php echo $gateau['base'] ?></h2>



   <div class="card" style="width: 18rem;">
        
        <div class="card-body">
            <h5 class="card-title"><?php echo $gateau['name'] ?></h5>
            <p class="card-text"><?php echo $gateau['base'] ?></p>
       
            

            <form action="index.php?controller=gateau&task=create" method="POST">
                <button type="submit" name="id" value="<?php echo $gateau['id'] ?>" class="btn btn-warning">Modifier</button>
            </form>
            <a href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau['id']?>" class="btn btn-danger">Delete </a>
        </div>
    </div>


    <?php if(empty($gateau)) { 

        echo "<h2> PAS DES GATEAUX ICI!";
    } ?>