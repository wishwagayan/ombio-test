<?php

    function escape_error($val)
        {
    	$magic_quotes =get_magic_quotes_gpc();

    			if($magic_quotes)
    			{
                    $val = ($val);
    			}
    	return $val;
        }
	function connectBase(){
		try {
		return  new PDO ('mysql:host=localhost;dbname=Exam', 'root', '+');
		}
		catch (PDOException $e) {
			print "Error !: " . $e->getMessage() . "<br/>";
			die();
}
    }

?>

