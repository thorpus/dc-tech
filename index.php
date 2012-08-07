<?php 
	//Include all the functions that we use to do stuff.
	include 'db.php';
	include 'functions.php';
			
	startDatabaseConnection('root', '', 'dctech');
	
	pageheader('DC Tech');
	
	showCompanies();
	
	showLatestNews();
	
	pagefooter();
	
	stopDatabaseConnection();
?>