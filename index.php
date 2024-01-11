<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/cobdd.php');
$title='Page d\'accueil';
session_start();
$articleid =$_GET;
$sql='SELECT * FROM `article`';
$query=$db->prepare($sql);
$query->execute();
$articles=$query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<?php
include('includes/head.php');?>
<body>
    <?php
include('includes/navbar.php');
    ?>
    <div class="nomconnexion">
    <?php
        if (!empty($_SESSION["prenom"])) {echo('<div class="salut"><h1>salut '.$_SESSION["prenom"].'</h1></div>');}
    ?>
    </div>
    <div id="article" class="row">
    <?php
foreach ($articles as $article) {
    echo ('<div class="col mb-5">
        <div class="card h-100">
            <img  height="300" class="card-img-top" src="'.$article['image'].'" alt="'.$article['nom'].'" />
            <div class="card-body p-4">
                <div class="text-center">
                    <h5 class="fw-bolder">'.$article['nom'].'</h5>
                    '.$article['prix'].' €
                </div>
            </div>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                
            <div class="form-check">
            <form method="POST">
            <button class="btn btn-primary" type="submit">ajouter à ma liste</button>
            </form>       
          </div>
            </div>
        </div>
    </div>');
}
?>

    </div>  
    <a href="article.php" target="_blank"><button class="btn btn-success">Voir ma liste de souhaits</button></a>         

        
</body>
</html>