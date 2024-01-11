<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/cobdd.php');
$title = "Connect";

if (!empty($_POST["mail"]) && !empty($_POST["mdp"]))
{
    $sql = "SELECT * FROM `users` WHERE `email` = :adresseMail";
    $query = $db->prepare($sql);
    $query->bindValue(":adresseMail", $_POST["mail"], PDO::PARAM_STR);
    $query->execute();
    $controleID = $query->fetch();
    $hash = $controleID["mdp"];



    if ($controleID["email"] === $_POST["mail"] && password_verify($_POST['mdp'], $hash) === true)
    {
        session_start();
        $_SESSION["prenom"] = $controleID["prenom"];
        $_SESSION["nom"] = $controleID["nom"];
        $_SESSION["id-user"] = $controleID["id"];
        
    }
    else{
        echo('râté');
    }
  }


?>



<nav class="navbar navbar-inverse navbar-global pb-3 fixed-top" id="navprime">
    <div class="container-fluid">
        <?php
if (empty($_SESSION["id-user"])) {
    echo('<div class="navbar-header">
            <button id="openmodal" type="button" class="btn btn-primary">Connexion</button>
        </div>');
}
else {
    echo('<div class="navbar-header">
    <a class="navbar-brand" href="deconnexion.php"><button type="button" class="btn btn-primary">Déconnexion</button></a>
</div>');
}
        ?>
        
        <dialog id="modal">
        <button id="close" type="button" class="btn-close" aria-label="Close"></button>
            <h1>Connexion</h1>
            <form method="post">
                <input type="mail" name="mail" placeholder="Email">
                <input type="password" name="mdp" placeholder="Mot de passe">
                <button class="btn btn-primary" type="submit">Connexion</button>
            </form>
        </dialog>
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"> Liste des articles</a>
        </div>
        <div class="navbar-header">
            <a class="navbar-brand" href="inscription.php"><button type="button" class="btn btn-primary">s'inscrire</button></a>
        </div>
    </div>
</nav>