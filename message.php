<?php
	session_start();

	if(isset($_SESSION['email'])){
		$email = $_REQUEST["email"];
		$message = $_REQUEST["message"];
		if($message == ""){
			
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
					<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" readonly/>
				</td>
			</tr>
			<tr>
				<td>
					
					<textarea name="message" cols="100" rows="1" placeholder="Write your message here"></textarea>
					<p align="right"><?php echo "*write something and then click send."; ?></p>
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
			$user = $email."|".$message."\r\n";
			//write data in a file
			$file = fopen('message.txt', 'a');
			fwrite($file, $user);
			fclose($file);
			header("location: contact_admin.php");
		}
	}
	else{
		echo "Invalid request";
	}
?>