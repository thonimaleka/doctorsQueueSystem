<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Doctors Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #d35400">
	<div id="main-wrapper">
		<center><h2>Home Page</h2></center>
        <center><h3>Welcome Dr <?php echo $_SESSION['username']; ?></h3></center>
        
        <h2>Next Patient in Line: </h2><br>
    <?php $query="select * from patientwait;";
   
    
    $query_run = mysqli_query($con,$query);
   

    $sql="SELECT * FROM patientwait;";
    $result= mysqli_query($con,$sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck >0){
      while($row= mysqli_fetch_assoc($result)){
        echo $row['qNum']."<br>";
      }
    }
    



    ?>
		
		<form action="docpage.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/female.jpg" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				<button class="logout_button" type="submit">Log Out</button>	
			</div>
		</form>
	</div>
</body>
</html>