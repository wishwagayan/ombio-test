 <?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Credentials:true");
header('Content-type: application/json');
session_start();
require_once("../includes/fonctions.php");
require_once("../modele/userManager.php");


    $json = file_get_contents('php://input');

    $obj = json_decode($json,true);


    if( isset( $_SESSION['id_user'])){
        $UserMsg = "Logged succes";
    }else
        $UserMsg = "You must be logged to show shops";

    $UserMsg = json_encode($UserMsg);
    echo($UserMsg);
 ?>