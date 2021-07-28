<html>

<head>


	<title>Pending</title>
		
		<style>
		body {
  background-color: #D0ECE7;
}

		</style>

</head>
    <body>
	
	
<?php

include "dbconfig.php";
session_start();
$uid =$_SESSION['o'];



$sqlquery = "DELETE FROM CART
where orderid='$uid'";
$run = $conn->prepare($sqlquery);
$run->execute();
    
echo "<script>location.assign('sellerhome.php');</script>";


?>
   </body> 
    
    </html>

