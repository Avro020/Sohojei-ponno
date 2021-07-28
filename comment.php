

<?php

include "dbconfig.php";
session_start();
$pid =$_SESSION['p'];
$uid =$_SESSION['u_id'];

$comment="";

if( isset($_POST['comments']) ){
	$comment=$_POST['comments'];
}

$sqlquery = "INSERT INTO comment (id,comments,pid)
VALUES ('$pid','$comment','$uid')";
$run = $conn->prepare($sqlquery);
$run->execute();



if ($conn->query($sqlquery)==true) {
    echo"<a href='details.php?p=$pid'>Details</a>";
}
else
{
    echo "HELLO";
}

?>
