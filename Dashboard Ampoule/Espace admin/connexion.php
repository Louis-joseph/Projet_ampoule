
<?php
session_start();                                                 //Déclarer la session qui va permettre d'echanger sur toutes les pages
if(isset($_POST['valider'])){                                   //lorsque l'utilisateurs click sur le bouton 'submit' le code va s'éxecuter
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){         //Si la variable 'pseudo' et 'mdp' ne sont pas vide le code s'éxecute
        $pseudo_par_defaut = "admin";
        $mdp_par_defaut = "admin667";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut) {
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location:board.php');                                    //la session'mdp' va correspondre au mdp saisi par l'utilisateur
        }else{
            echo "mot de passe ou pseudo incorrect";
        }
    }else{                                                                           //Sinon un message d'error s'affiche
        echo "Veuillez compléter tous les champs..";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace de connexion</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
            <div class="box">
                <div class="container">
                    <div class="form">
                        <h2>Login</h2>
                        <form method="Post" action="">
                            <div class="inputBox">
                                <input type="text" name="pseudo" autocomplete="off" placeholder="admin">
                                <br>
                            </div>
                            <div class="inputBox">
                                <input type="password" name="mdp" placeholder="admin667">
                                <br><br>
                            </div> 
                            <div class="inputBox">
                                <input type="submit" name="valider">
                            </div>     
                        </form>
                    </div>
                </div>
            </div>
    </section>
    
    
</body>
</html>