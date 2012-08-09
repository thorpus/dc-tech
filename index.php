<?php 
	//Include all the functions that we use to do stuff.
	include 'db.php';
	include 'functions.php';
			
	startDatabaseConnection('jtdctech', 'jtdctech', 'jtdctech');
	
	pageheader('DC Tech');
	
	if($_GET['show']=='news'){
		showLatestNews();
	}
	else {
		showCompanies();
	}
	pagefooter();
	
	stopDatabaseConnection();
?>