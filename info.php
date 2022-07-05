<?php
	session_start();

	if(isset($_SESSION['email'])){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Details</title>
</head>
<body>
	<?php
		require('donor_header.html');
		
	?>
	
	
	<h1 align="center">Fundraiser and Organization details</h1>
	<?php
		
		echo '<table border="1" align="center" width="90%">';
		$file = fopen("info.txt", "r");
		while (!feof($file)){
			$data = fgets($file); 
			echo "<tr><td>" . str_replace('|','</td><td>',$data) . '</td></tr>';
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