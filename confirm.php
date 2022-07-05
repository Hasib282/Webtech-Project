<?php
	session_start();

	if(isset($_SESSION['email'])){
		if(isset($_SESSION['email'])){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Confirm</title>
</head>
<body>
	<?php
		require('donor_header.html');
	?>
	<?php
		
		$email_store = $_SESSION['email']; 
		$pass = $_SESSION['pass']; 
		$fname = $_REQUEST['fname'];
		$file = fopen('user.txt', 'r');
				
		while (!feof($file)) {
			$data = fgets($file);
			$user = explode("|", $data); 
			if($email_store == trim($user[0])) { //match email
				$email = trim($user[0]);
				$password = trim($user[1]);
				$name = trim($user[2]);
				$phone = trim($user[3]);
				$nid = trim($user[4]);
				$dob = trim($user[5]);
				$gender = trim($user[6]);
				$preaddress = trim($user[7]);
				$peraddress = trim($user[8]);
				$photo = trim($user[9]);
			}
		}	
		
		
		
		if(isset($_POST["yes"])){
			
			//count line number
			$file = fopen('user.txt', 'r');
			$line = -1;
			while (!feof($file)) {
				$data = fgets($file);
				$user = explode("|", $data); 
				$line++;
				if($email == trim($user[0])) { //match email
					break;
				}
			}
			//if pass
			if($fname == 'pass'){
				//Replace updated informations
				$filearr = file('user.txt');
				$filearr[$line] = $email."|".$pass."|".$name."|".$phone."|".$nid."|".$dob."|".$gender."|".$preaddress."|".$peraddress."|".$photo."\r\n";
				$filearr = implode($filearr);
				file_put_contents('user.txt',$filearr);
				fclose($file);
				
				session_destroy();
				setcookie('email', $email, time()-10, '/');
				header("location: home.php");
			}
			//if delete
			else if($fname == 'delete'){
				//Delete data
				$filearr = file('user.txt');
				$filearr[$line] = null;
				$filearr = implode($filearr);
				file_put_contents('user.txt',$filearr);
				fclose($file);
				
				session_destroy();
				setcookie('email', $email, time()-10, '/');
				header("location: home.php");
			}
			
		}
		else if(isset($_POST["no"])){
			header("location: donor_profile.php");
		}
	?>
	
	<?php
		require('footer.html');
	?>
</body>
</html>

<?php
		}
	}
	else{
		echo "Invalid request";
	}
?>