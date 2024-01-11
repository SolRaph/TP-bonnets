<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/cobdd.php');
$title ='Inscription';

if (!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['mail'])&&!empty($_POST['mdp'])&&!empty($_POST['confmdp'])) {
  

$sql ="SELECT * FROM `users` WHERE `email`= :email";
$query = $db->prepare($sql);
$query->bindvalue(":email",$_POST["mail"],PDO::PARAM_STR);
$query->execute();
$verifEmail= $query->fetch();

if ($verifEmail === false){
    $InNom = $_POST["nom"];
    $InPrenom =$_POST["prenom"];
    $InEmail = $_POST["mail"];
    $hashmdp = password_hash ($_POST["mdp"],PASSWORD_DEFAULT);
    $InConfirmMdp = $_POST["confmdp"];

    if (($_POST['mdp']) !== ($_POST['confmdp'])) {
                    
    }
    else {
        $sql='INSERT INTO `users`(`nom`, `prenom`, `email`, `mdp`) VALUES (:nom, :prenom, :mail, :mdp)';
        $query=$db->prepare($sql);
        $query->bindValue(':nom',$InNom, PDO::PARAM_STR);
        $query->bindValue(':prenom',$InPrenom, PDO::PARAM_STR);
        $query->bindValue(':mail',$InEmail, PDO::PARAM_STR);
        $query->bindValue(':mdp',$hashmdp, PDO::PARAM_STR);
        $query->execute();
        header("Location:index.php");
    }}
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include('includes/head.php')
?>
<body>
    <div class="container">
        <div class="inscription">
        <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
        <h2 class="heading-section">Inscription</h2>
        </div>
        </div>
        <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
        <div class="login-wrap p-0">
            <form method="POST" class="signin-form">
                <input class="form-control" type="text" name="nom" placeholder="Nom">
                <input class="form-control" type="text" name="prenom" placeholder="Prénom">
                <input class="form-control" type="mail" name="mail" placeholder="email">
                <input class="form-control" type="password" name="mdp" placeholder="Mot de passe">
                <input class="form-control" type="password" name="confmdp" placeholder="Confirmation du mot de passe">
                <button class="btn btn-primary" type="submit">S'inscrire</button>
            </form>
        </div>
        </div>
        </div>
        </div>
    </div>
    </div>
</body>
</html>