<?php 
session_start();                                     //pour securiser la page
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="board.css" type="text/css">
</head>
<body>
    <button id="btn">☰</button>

<nav id="nav">
    <ul>

        <li><a href="insert.php">Ajouter</a></li>
        <li><a href="logout_account.php">Se déconnecter</a></li>
        
    </ul>     
</nav>
<section>
    <div class="box">
        <div class="container">
        <h2>Listes des Ampoules</h2>
        </div>
    </div>
    <?php
            $Serveur="localhost";
            $NomBdd="light";
            $login="root";
            $pass="";

            try {
                $BasePDO = new PDO("mysql:host=".$Serveur.";dbname=".$NomBdd.";port=3306",$login,$pass);

                $req = "SELECT * FROM `source` ORDER BY `source`.`IdSource` DESC";
                $RequetStatement = $BasePDO->query($req);
                if($RequetStatement){
                    ?>
                 <table class="table-custom">
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Date</th>
                             <th>Étage</th>
                             <th>Position</th>
                             <th>Prix</th>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                    <?php
                    while($Tab=$RequetStatement->fetch()){         
                        ?>
                         <tr>
                        <td><a href="update.php?IdUpdate=<?php echo $Tab["IdSource"]?>"><?php echo $Tab["0"]?> </a></td>
                        <td><a href="update.php?IdUpdate=<?php echo $Tab["IdSource"]?>"><?php echo $Tab["1"]?> </a></td>
                        <td><a href="update.php?IdUpdate=<?php echo $Tab["IdSource"]?>"><?php echo $Tab["2"]?> </a></td>
                        <td><a href="update.php?IdUpdate=<?php echo $Tab["IdSource"]?>"><?php echo $Tab["3"]?> </a></td>
                        <td><a href="update.php?IdUpdate=<?php echo $Tab["IdSource"]?>"><?php echo $Tab["4"]?> </a></td>
                        <td><a href="delete.php?IdDelete=<?php echo $Tab["IdSource"]?>"><button id="myBtn" class="BtnDelete" onclick="confirmation(55)">
                        <i class="">delete</i></button></a></td>    
                          </tr>
                        <?php  
                    }
                    ?>
                 </table>
                    <?php
                }
                
            }catch(PDOException $e) {
                die('Erreur '.$e->getMessage());
            }
            
            ?>
    
        <div class="content-img">
            <img src="./img/illu.png" alt="Man on tree">
        </div>
</section>        
    <script src="board.js"></script>
</body>
</html>