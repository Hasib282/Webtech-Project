<?php
	session_start();

	if(isset($_SESSION['email'])){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Notifications</title>
</head>
<body>
	<?php
		require('donor_header.html');
	?>
	
	
	<h1 align="center">Notifications</h1>
	<?php
		echo '<table border="1" align="center" width="90%">';
		$file = fopen("notification.txt", "r");
		while (!feof($file)){
			$data = fgets($file); 
			echo "<tr><td>" .$data. "</td></tr>";
		}
		echo '</table>';
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