<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#d35400">
	<div id="main-wrapper">
	<center><h2>Doctor Login Form</h2></center>
			<div class="imgcontainer">
                <!--<img src="imgs/doc.png" alt="Avatar" class="avatar"> -->
                <img src="imgs/female.jpg" alt="Avatar" class="avatar"/>
			</div>
		<form action="index.php" method="post">
		
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button>
				<a href="register.php"><button type="button" class="register_btn">Register</button></a>
				<a href="patient.php">If you are a Patient Click Here</a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
                //$query = "select * from userinfotbl where username='$username' and password='$password' ";
                $query="select * from patientinfo WHERE username = '$username' AND password = '$password'";

				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: docpage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>