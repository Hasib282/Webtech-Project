<!DOCTYPE HTML>
<html>
<head>
	<title>Donor Login</title>
</head>
<body>
	<!-- Header design start -->
	<header>
		<br />
		<table width="90%" align="center">
		<tr>
			<td align ="center" width="8%">
				<img src="Photo/ABC.png" alt="" height="100%" width="100%" />
			</td>
			<td align ="center" width="70%">
				<a href="home.php">Home</a>&nbsp;| &nbsp;
				<a href="#">Events</a>&nbsp;|&nbsp;
				<a href="#">Fundraise for</a>&nbsp;|&nbsp;
				<a href="#">How It Works</a>&nbsp;|&nbsp;
				<a href="#">Contact</a>
			</td>
			<td align="right" width="18%">
				<a href="donor_log.php">Log In</a>&nbsp;/
				<a href="donor_reg.php">Registration</a>
			</td>
		</tr>
		</table>
		<br />
		<br />
	</header>
	<!-- Header design end -->
	
	
	<!-- Login design start -->
	<form action="donor_log_check.php" method="post" enctype="">
		<fieldset style="width:0px; margin:0px auto;">
			<legend align="center"><h3>Login</h3></legend>
			<table align="center">
				<tr>
					<td><br /><input type="text" name="email" value="" placeholder="Email"/><br /><br /></td>
				</tr>
				<tr>
					<td><input type="password" name="pass" value="" placeholder="Password"/><br /><br /></td>
				</tr>
				<tr align="center">
					<td><input type="submit" name="submit" value="Submit"/></td>
				</tr>
				<tr align="center">
					<td><p>Don't have an account?<br /><a href="donor_reg.php">SIGNUP </a></p></td>
				</tr>
			</table>
		</fieldset>
	</form>
	<!-- Login design end -->
	
	
	
	
	<?php
		require('footer.html');
	?>
</body>
</html>