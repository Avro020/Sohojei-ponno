<?php

$username="";
$password="";

if( isset($_POST['username']) ){
	$username=$_POST['username'];
}

if( isset($_POST['password']) ){
	$password=$_POST['password'];
}
///database connection
try{
	$conn = new PDO("mysql:host=localhost;dbname=sohoj;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('home.php');</script>";
}


$sqlquery="SELECT * FROM seller WHERE contact_no='$username' or Email='$username'   AND Password='$password'";


$object=$conn->query($sqlquery);
if($object->rowCount()==1){
    $row2 = $object->fetch(PDO::FETCH_ASSOC);


                if ($password == $row2["Password"]) {
                    session_start();
                    $_SESSION['d'] = $row2['Seller_id'];
                    echo "<script>location.assign('sellerhome.php');</script>";
                }
    
	
}
else{
	echo "<script>location.assign('index1.html');</script>";
}

?>
<a href="padd.php" title="sellerid">Go to the other page</a>