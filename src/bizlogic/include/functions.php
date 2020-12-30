<?php

    function escape_error($val)
        {
    	$magic_quotes =get_magic_quotes_gpc();

    			if($magic_quotes)
    			{
                    $val = addslashes($val);
    			}
    	return $val;
        }


	function connectBase(){
		try {
		return  new PDO ('mysql:host=localhost;dbname=Clients', 'root', '+');
		}
		catch (PDOException $e) {
			print "Error !: " . $e->getMessage() . "<br/>";
			die();
}
    }



?>
© 2020 GitHub, Inc.
