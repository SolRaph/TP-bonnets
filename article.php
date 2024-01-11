<?php
include('includes/cobdd.php');
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<?php
include('includes/head.php');
?>
<body>
<div class="nomconnexion">
    <?php
        if (!empty($_SESSION["prenom"])) {echo('<div class="salut"><h1>Hey '.$_SESSION["prenom"].' voici ta liste de souhaits</h1></div>');}
    ?>
    </div>

</form>
</body>
</html>