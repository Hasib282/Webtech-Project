<?php 
	if(isset($_COOKIE['email']))
	{
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Donor Home Page</title>
</head>
<body>
	<?php
		require('donor_header.html');
		
		
		//read data
		$email_store =$_COOKIE['email'];
		$file = fopen("user.txt", "r");
		while (!feof($file)){
			$data = fgets($file);
			$user = explode("|",$data);
			if($email_store == trim($user[0])) { //match email
				$name = trim($user[2]);
			}
		}
	?>
	<h1 align="center">Welcome "<?php echo $name ?>"</h1>
	<?php
		$file = fopen("posts.txt", "r");
		while (!feof($file)){
			$data = fgets($file);
			$user = explode("|",$data);
			echo '<form action=""><fieldset style="width:30%; margin:0px auto;">';
			foreach($user as $value){
				echo '<table >';
				echo "<tr><td width=\"100%\">" .$value. "</td></tr><br />";
			}
			echo "<tr><td><br /><a href=\"donate.php\"><input type=\"button\" name=\"donate\" value=\"Donate\" /></a></td></tr>";
			echo '</table><br /></fieldset></form><br>';
		}
		fclose($file);
		
		
		
	?>
	
	<?php
		require('footer.html');
	?>
	
</body>
</html>

<?php
	}
	else{
		echo "Invalid request";
	}
?>