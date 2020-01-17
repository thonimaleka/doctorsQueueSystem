<!--?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#e67e22">

<div id="main-wrapper">
    <center><h2>Home</h2>
    <h3>Welcome ?php echo $_SESSION['name']  ?> </h3>
    <img src="imgs/female.jpg" class="avatar"/>

    <h4>You are number ?php echo $_SESSION['qNum'] ?> in the queue.</h4>
    </center>


<form class="myform" action="homepage.php" method="post">
   


    <input name="logout" type="submit" id="logout_btn"  value="Log Out"/><br>
   
    
</form>
?php
if(isset($_POST['logout']))
{
    session_destroy();
header('location: patient.php');
}
?>
</div>

</body>

</html>
-->
<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #d35400">
	<div id="main-wrapper">
		<center><h2>Home Page</h2></center>
		<center><h3>Welcome <?php echo $_SESSION['name']; ?></h3>
		<h4>You are number <?php echo $_SESSION['qNum'] ?> in the queue.</h4>
	
	</center>
		
		<form action="homepage.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/female.jpg" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				<button name="logout" class="logout_button" type="submit">Log Out</button>	
			</div>
		</form>
		<?php
if(isset($_POST['logout']))
{
    session_destroy();
header('location: patient.php');
}
?>
	</div>
</body>
</html>