<?php 
	include 'db.php';
	include 'functions.php';

	function getCompanyName($id){
		$query = "SELECT * FROM companies WHERE id =".$id;
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		return $row['name'];
	
	}
	
	function getCompanyURL($id){
		$query = "SELECT url FROM companies WHERE id =".$id;
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		return $row['url'];
	
	}
	
	function getCompanyTwitterHandle($id){
		$query = "SELECT twitter FROM companies WHERE id =".$id;
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		return $row['twitter'];
	
	}
	
	function getCompanyFacebookPage($id){
		$query = "SELECT * FROM companies WHERE id =".$id;
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		return $row['facebook'];
	
	}
	
	function getCompanyType($id){
		$query = "SELECT companyType FROM companies WHERE id =".$id;
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		$query = "SELECT type FROM companyTypes WHERE id =".$row['companyType'];
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		return $row['type'];
	}
	
	function getCompanyFacebookBadge($id){	
		$query = "SELECT facebook FROM companies WHERE id =".$id;
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);	
		print '<div class="fb-like-box" data-href="http://www.facebook.com/'.$row['facebook'].'" data-width="292" data-show-faces="true" data-stream="false" data-header="true"></div>';
	}
	
	function getCompanyTwitterButton($id){
		$query = "SELECT twitter FROM companies WHERE id =".$id;
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
	
		print '<a href="https://twitter.com/'.$row['twitter'].'" class="twitter-follow-button" data-show-count="true" data-size="large">Follow @'.$row['twitter'].'</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';	
	}
	
	function showSocial($id){
		print '<h2>Social</h2>';
		getCompanyFacebookBadge($id);
		print '<br /><br />';
		getCompanyTwitterButton($id);
	
	}
	
	
	function showPeople($id){
		print '<h2> People </h2>';
	
		$query = "SELECT * FROM people WHERE companyId =".$id;
				
		$result = mysql_query($query);
		

		$total = 0;
		$howMany = 0;
		
		print'
			<table class="table table-striped">
				<thead><tr><th>Name</th><th>URL</th><th>Title</th></tr></thead>';
		
		while($row = mysql_fetch_array($result)) {	  		
	  		print '<tr><td>'.$row['firstName'].' '.$row['lastName'].'</a></td><td><a href="'.$row['url'].'">'.$row['url'].'</a></td><td>'.$row['title'].'</td></tr>';
	  		
	  		$howMany++;
  		}
	
		print '	</table>';
		
		print '<h2>'.$howMany.' people</h2>';
	
	}
	
	function showNews($id){
		print '<h2> News </h2>';
	
		$query = "SELECT * FROM news WHERE companyId =".$id." ORDER BY posted DESC";
				
		$result = mysql_query($query);
		

		$total = 0;
		$howMany = 0;
		
		print'
			<table class="table table-striped">
				<thead><tr><th>Posted</th><th>Title</th><th>Source</th></tr></thead>';
		
		while($row = mysql_fetch_array($result)) {	  		
	  		print '<tr><td>'.$row['posted'].'</a></td><td><a href="'.$row['url'].'">'.$row['title'].'</a></td><td>'.newSource($row['url']).'</td></tr>';
	  		
	  		$howMany++;
  		}
	
		print '	</table>';
		
		print '<h2>'.$howMany.' stories	</h2>';
	
	}
	
	function newSource($url){
		return substr(substr($url, 7), 0, strpos(substr($url, 7),'/'));
	
	}


	startDatabaseConnection('jtdctech', 'jtdctech', 'jtdctech');
	
	pageheader(getCompanyName($_GET['id']));
	
	print '<div class="row-fluid">
	  <div class="span12">';
    	print '<h2>Details</h2>';
		print '<ul>';
		print '<li>Type: '.getCompanyType($_GET['id']).'</li>';
		print '<li>URL: '.getCompanyURL($_GET['id']).'</li>';
		print '<li>Twitter Handle: '.getCompanyTwitterHandle($_GET['id']).'</li>';
		print '<li>Facebook Page: '.getCompanyFacebookPage($_GET['id']).'</li>';
		print '</ul>';
    	print '<div class="row-fluid">
      		<div class="span8">';
      		showPeople($_GET['id']);
      		print '<hr />';
			showNews($_GET['id']);
			print '</div>
      	<div class="span4">';
      	showSocial($_GET['id']);	
      	print '</div>
      </div>
  </div>
</div>';
	
	

	
	pagefooter();
	
	stopDatabaseConnection();
?>