<?php
session_start();
require 'dbconfig/config.php';

?>

<!DOCTYPE html>
<html>

<head>
<title>Waiting List</title>
<link rel="stylesheet" href="css/patient.css">


</head>
<body style="background-color:#e67e22">

<div id="main-wrapper">
    <center><h2>Waiting List</h2>
    <img src="imgs/female.jpg" class="avatar"/>

    
    </center>
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
   


    
    <form class="myform" action="listOfPatients.php" method="post">
    <a href="patient.php">Click Here to get a number</a>

    <!-- <input name="submit_btn" type= "submit" id="signup_btn"  value="Sign Up"/><br> -->
   
    
</form>
<!--?php
  if(isset($_POST['submit_btn']))
  {
      //echo '<script type="text/javascript"> alert("Sign up button is clicked") </script>';

     // $rows=$conn->query("select qNum from patientWait");
      //$_SESSION['qNum']= $qNum;

/*echo "<table border='1'>";
echo "<tr><th>Username</th></tr>";
while(list($qNum)=$rows->fetch_row()){
  echo "<tr><td>$rows</td></tr>";
}
echo "</table>"; }*/



      
          $query="select qNum from patientWait";
          //mysqli_select_db($con,"gpqueuemgt");
  $rows=$con->query("select qNum from patientWait");
     // $_SESSION['qNum']= $qNum;
          $query_run= mysqli_query($con,$query);
          $qNum=$query;

          echo "<table border='1'>";
echo "<tr><th>Username</th></tr>";

          if(mysqli_num_rows($query_run)>0){
             
              
             while(list($qNum)=$rows->fetch_row()){
  echo "<tr><td>$rows['qNum']</td></tr>";
}
echo "</table>"; } 


             
          
         
        }

   
         

      
     

  

  ?>-->
</div>

</body>

</html>