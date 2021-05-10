<?php 
session_start();                                     //pour securiser la page
if(!$_SESSION['mdp']){
    header('location:connexion.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="insert.css">
</head>
<body>
<button id="btn">☰</button>

<nav id="nav">
    <ul>

        <li><a href="board.php">Historique</a></li>
        <li><a href="logout_account.php">Se déconnecter</a></li>
        
    </ul>     
</nav>
<section>
    <h1>Ajouter</h1>

    <form action="" method="post" class="formAjout">
        <div class="form-example">
            <label for="SourceDate"> : date</label>
            <input type="date" name="SourceDate" id="SourceDate" required>
        </div>

        <div class="form-example">
            <label for="SourceEtage"> : Étage</label>
            <select name="SourceEtage" id="SourceEtage">
                            <option value="">--Choisisez l'étage--</option>
                            <option value="1">--1--</option>
                            <option value="2">--2--</option>
                            <option value="3">--3--</option>
                            <option value="4">--4--</option>
                            <option value="5">--5--</option>
                            <option value="6">--6--</option>
                            <option value="7">--7--</option>
                            <option value="8">--8--</option>
                            <option value="9">--9--</option>
                            <option value="10">--10--</option>
                            <option value="11">--11--</option>
                        </select>   
        </div>

        <div class="form-example">
            <label for="SourcePosition"> : Position</label>
            <select name="SourcePosition" id="SourcePosition">
            <option value="">--Choisisez la position--</option>
                            <option value="Côté Gauche">Côté Gauche</option>
                            <option value="Côté Droit">Côté Droit</option>
                            <option value="Fond">Fond</option>
            </select>
        </div>

        <div class="form-example">
            <label for="SourcePrix"> : Prix </label>
            <input type="text" id="SourcePrix" name="SourcePrix" value="">
        </div>

        <div class="form-example">
            <input type="submit" name="SourceSubmit" value="Ajouter" class="btnAjout">
        </div>
    </form>

    <?php
    $Serveur="localhost";
    $NomBdd="light";
    $login="root";
    $pass="";

    try {
        $BasePDO = new PDO("mysql:host=".$Serveur.";dbname=".$NomBdd.";port=3306",$login,$pass);

        if(isset($_POST["SourceSubmit"])){
            if(!empty($_POST["SourceDate"]) && !empty($_POST["SourceEtage"]) && !empty($_POST["SourcePosition"]) && !empty($_POST["SourcePrix"])){


                $SourceDate = $_POST["SourceDate"];
                $SourceEtage = $_POST["SourceEtage"];
                $SourcePosition = $_POST["SourcePosition"];
                $SourcePrix = $_POST["SourcePrix"];

                $req ="INSERT INTO `source` ( `Date`, `Etage`, `Position`, `Prix`) VALUES ('".$SourceDate."','".$SourceEtage."','".$SourcePosition."','".$SourcePrix."')";
                $RequetStatement = $BasePDO->query($req);

                if($RequetStatement){

                    if( $RequetStatement->errorCode()=='00000'){
                    }else{
                        echo "Erreur N°".$RequetStatement->errorCode()."lors de l'insertion";
                    }
                }else{
                    echo "Erreur dans le format de la requête";
                }
            }

            $req = "SELECT * FROM `source` ORDER BY `source`.`IdSource` DESC"; //Trier par ordre Id
            $RequetStatement = $BasePDO->query($req);
            if($RequetStatement){
                ?>
                
                <?php    
                while($Tab=$RequetStatement->fetch()){        //Tant que mon objetPDO me retourne un tuple que je met dans ma $tab
                    ?>
                    
                    <?php
                }
                ?>
                <?php
            }
        }


    }catch(Exception $e){
        echo $e->getMessage();
    }    
    ?>

</section>
<script src="board.js"></script>

   
</body>
</html>