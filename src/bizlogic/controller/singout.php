 <?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Credentials:true");
header('Content-type: application/json');
session_start();
require_once("../includes/functions.php");
require_once("../model/userManager.php");



    $json = file_get_contents('php://input');

    $obj = json_decode($json,true);


    $email = $obj['email'];


    $password = $obj['password'];
    $passwordConfirm = $obj['passwordConfirm'];

    if (!empty($passwordConfirm)  || !empty($email) || !empty($password)) {
        if ($password === $passwordConfirm)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $db = connectBase();
                $manager = new userManager($db);

                $user = $manager->getUser($email,'dont_take_it');

                if(isset($user) and ($user instanceof User))

                    $signupMsg = $user->email().' is already exist';

                else{

                    $password = sha1($password);
                    $Auto_Increment = $manager->getAutoId();
                    $user = new User(array("id" =>$Auto_Increment, "email" => $email, "password" =>$password));
                    $manager->addUser($user);

                    $_SESSION['id_user'] = $user->id();
                    $_SESSION['email_user'] = $user->email();

                    $signupMsg = 'Account created succefully';
                }

            }else
                $signupMsg = "Invalid email format";
        }else
            $signupMsg = 'password an confirm password not match' ;
    }else
        $signupMsg = 'field(s) must not be empty' ;



   // Converting the message into JSON format.
    $signupJson = json_encode($signupMsg);
    // Echo the message.
    echo $signupJson;

 ?>