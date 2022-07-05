<?php
	session_start();

	if(isset($_SESSION['email'])){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Contact Admin</title>
</head>
<body>
	<?php
		require('donor_header.html');
	?>
	<h1 align="center">Contact Admin</h1>
	<form action="message.php" method="post">
		<table align="center">
			<tr>
				<td>
					<?php 
					
					$email = $_SESSION['email'];
					$pattern = $email."|";
					//read file match string and store data in array
					$handle = fopen("message.txt", "r");
					while (!feof($handle)){
						$buffer = fgets($handle);
						if(strpos($buffer, $pattern) !== FALSE){
							$matches[] = $buffer;
						}
					}
					fclose($handle);
					
					//print array value
					foreach($matches as $value){
						$arr = explode($email."|",$value);
						foreach($arr as $m){
						echo $m."<br>";
						} 
					} 
					?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="message" cols="100" rows="1" placeholder="Write your querry here"></textarea>
				</td>
			</tr>
			<tr>
				<td align="right">
					<input type="submit" name="submit" value="Send Message"/>
				</td>
			</tr>
		</table>
	</form>
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