 <?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Credentials:true");
header('Content-type: application/json');
session_start();
require_once("../includes/fonctions.php");
require_once("../modele/userManager.php");



    $json = file_get_contents('php://input');

    $obj = json_decode($json,true);

    $email = $obj['email'];

    $password = $obj['password'];
    $db = connectBase();

    $manager = new userManager($db);
    $user = $manager->getUser($email,$password);

    if(isset($user) and ($user instanceof User))
    {
        $LoginMsg = 'Data Matched';

        $_SESSION['id_user'] = $user->id();
        $_SESSION['email_user'] = $user->email();
    }
    else
        $LoginMsg = 'Invalid Username or Password Please Try Again';



   // Converting the message into JSON format.
    $LoginJson = json_encode($LoginMsg);


    // Echo the message.
    echo $LoginJson ;

 ?>