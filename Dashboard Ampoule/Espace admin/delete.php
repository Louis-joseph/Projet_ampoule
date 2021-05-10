<?php 
session_start();                                   
if(!$_SESSION['mdp']){
    header('location:connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="delete.css" type="text/css">
</head>
<body>
<button id="btn">☰</button>

<nav id="nav">
    <ul>

        <li><a href="board.php">Historique</a></li>
        <li><a href="insert.php">Ajouter</a></li>
        <li><a href="logout_account.php">Se déconnecter</a></li>
        
    </ul>     
</nav>
<section>
    <?php
    if(isset($_GET["IdDelete"])){
        $idSource = $_GET["IdDelete"];
        echo "<h1>Supprimer Ampoule N°".$idSource."</h1>";

        ?>

        <?php

        $Serveur="localhost";
        $NomBdd="light";
        $login="root";
        $pass="";

        try{
            $BasePDO = new PDO("mysql:host=".$Serveur.";dbname=".$NomBdd.";port=3306",$login,$pass);


            $req ="DELETE FROM `source`
                    WHERE IdSource = '".$idSource."'";
            $RequetStatement = $BasePDO->query($req);

            if($RequetStatement){

                if( $RequetStatement->errorCode()=='00000'){
                    echo "Suppression reussite : ";
                    echo "L'ampoule a bien été Supprimé ";
                }else{
                    echo "Erreur N°" .$RequetStatement->errorCode()."lors de la modification";
                }
            }else{
                echo "Erreur dans le format";
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }    

    }else{
        echo "Auncune ampoule a Supprimer";
    }
    ?>
  </section>
  <script src="board.js"></script>

   
</body>
</html>