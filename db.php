<?php 
	

	
	function startDatabaseConnection($username, $password, $database) {
		mysql_connect(localhost, $username , $password);
		mysql_select_db($database) or die("Unable to select that db!");
	}
	
	
	function stopDatabaseConnection(){ mysql_close(); }
	

?>