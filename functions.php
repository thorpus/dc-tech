<?php
	
	function companyTypeSelector(){
		$query = "SELECT * FROM companyTypes ORDER BY type";		
		$result = mysql_query($query);
	
		print'<ul>';
		
		while($row = mysql_fetch_array($result)) {	  		
	  		print '<li><a href="index.php?type='.$row['id'].'">'.$row['type'].'</a></li>';
  		}
  		
  		print '</ul>';	
	}
	
	function showCompanies(){
		
		companyTypeSelector();
		
		if($_GET['type']!=NULL){ $query = "SELECT * FROM companies WHERE companyType = '".$_GET['type']."' ORDER BY name"; }
		else{ $query = "SELECT * FROM companies ORDER BY name"; }
		
		$result = mysql_query($query);
		

		$total = 0;
		$howMany = 0;
		
		print'
			<table class="table table-striped">
				<thead><tr><th>Name</th><th>URL</th></tr></thead>';
		
		while($row = mysql_fetch_array($result)) {	  		
	  		print '<tr><td><a href="company.php?id='.$row['id'].'">'.$row['name'].'</a></td><td><a href="'.$row['url'].'">'.$row['url'].'</a></td></tr>';
	  		
	  		$howMany++;
  		}
	
		print '	</table>';
		
		print '<h2>'.$howMany.' companies</h2>';

	}
	
	function showLatestNews(){
		print '<h2> News </h2>';
	
		$query = "SELECT * FROM news ORDER BY posted DESC";
				
		$result = mysql_query($query);
		

		$total = 0;
		$howMany = 0;
		
		print'
			<table class="table table-striped">
				<thead><tr><th>Posted</th><th>Title</th><th>URL</th></tr></thead>';
		
		while($row = mysql_fetch_array($result)) {	  		
	  		print '<tr><td>'.$row['posted'].'</a></td><td><a href="'.$row['url'].'">'.$row['title'].'</a></td><td>'.$row['url'].'</td></tr>';
	  		
	  		$howMany++;
  		}
	
		print '	</table>';
		
		print '<h2>'.$howMany.' stories</h2>';
	
	}
	
	function pageheader($pageTitle){
		print '<!DOCTYPE html>
				<html lang="en">
				<head>
					<title>'.$pageTitle.'</title>
					<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
				</head>';
		print '<body>';
				print '<div id="fb-root"></div>
				<script>(function(d, s, id) {
  				var js, fjs = d.getElementsByTagName(s)[0];
  				if (d.getElementById(id)) return;
  				js = d.createElement(s); js.id = id;
  				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=160039804083347";
  				fjs.parentNode.insertBefore(js, fjs);
				}(document, "script", "facebook-jssdk"));</script>';
				
				
		print '
	<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">DC Tech</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
    <br /><br /><br />';
	print '<h1>'.$pageTitle.'</h1>';
	}

		

	function pagefooter(){
		print '</div>';
		print '</body>';
		print '</html>';
	}


?>