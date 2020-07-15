<!--?php
session_start();
 require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>

<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#e67e22">

<div id="main-wrapper">
    <center><h2>Register Form</h2>
    <img src="imgs/female.jpg" class="avatar"/>
    </center>


<form class="myform" action="register.php" method="post">
    <label>Username:</label><br>
    <input name="username" type="text" class="inputvalues" placeholder="Type your username" required/>
    <br>
    <label>Password:</label><br>
    <input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>

    <label>Confirm Password:</label><br>
    <input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>


    <input name="submit_btn" type= "submit" id="signup_btn"  value="Sign Up"/><br>
    <a href="index.php"><input type="button" id="back_btn" value="Back"/></a><br>
    
</form>

?php
  if(isset($_POST['submit_btn']))
  {
      //echo '<script type="text/javascript"> alert("Sign up button is clicked") </script>';

      $username = $_POST['username'];
      $password=$_POST['password'];
      $cpassword= $_POST['cpassword'];

      if($password==$cpassword){
          $query="select * from patientinfo WHERE username='$username'";

          $query_run= mysqli_query($con,$query);

          if(mysqli_num_rows($query_run)>0){
              //there is already an existing username
              echo '<script type="text/javascript"> alert("Username already exists.. try another username") </script>';



             
          }
          else
          {
            $query="INSERT INTO patientinfo VALUES('$username','$password')";
            $query_run=mysqli_query($con,$query);

            if($query_run)
            {
             echo '<script type="text/javascript"> alert("User Succcessfully registered. Go to login page to login :)") </script>';
            }
            else{
             echo '<script type="text/javascript"> alert("Error") </script>';
            }
        }

   
         

      }
      else{
        echo '<script type="text/javascript"> alert("Password and Confirm password does not match, try again") </script>';
      }

  }
?>

</div>

</body>

</html>-->

<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #d35400">
	<div id="main-wrapper">
	<center><h2>Doctor Sign Up Form</h2>
		<form action="register.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/female.jpg" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<label><b>Confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="cpassword" required>
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form></center>
		
		<?php
			if(isset($_POST['register']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
				$query="select * from patientinfo WHERE username='$username'";
					//$query="INSERT INTO patientinfo VALUES('$username','$password')";

					
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query="INSERT INTO patientinfo VALUES('$username','$password')";
							$query_run=mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								header( "Location: index.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>