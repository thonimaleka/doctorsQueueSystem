<?php
$con = mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($con,"gpqueuemgt");
$db=new mysqli("localhost","root","","gpqueuemgt");
?>