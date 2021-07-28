
<?php
    include "dbconfig.php";

session_start();
$oid =$_SESSION['o'];

$status="";
if( isset($_POST['status']) ){
	$status=$_POST['status'];
}

        $sqlquery = "UPDATE cart
set status='$status'
where orderid='$oid'";



if ($conn->query($sqlquery)==true) {
    echo "<script>location.assign('sellerhome.php');</script>";
}
else
{
    echo "database failed";
}

        ?>