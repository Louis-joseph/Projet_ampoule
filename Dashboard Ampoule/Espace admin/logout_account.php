<?php 
session_start();
$_SESSION = array();                  //session déclareé stocker dans un tableau
session_destroy();                    //pour ensuite venir casée toute les sesion dans le tableau
header('Location:connexion.php');     //pour pouvoir être redirigée
?>