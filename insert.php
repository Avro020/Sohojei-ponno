<?php

include "dbconfig.php";
	
$pid = $_REQUEST['name'];
$comment = $_REQUEST['comments'];
$uid=$_REQUEST['person'];

$sqlquery = "INSERT INTO comment (id,comments,pid)
VALUES ('$pid','$comment','$uid')";
$run = $conn->prepare($sqlquery);
$run->execute();
?>