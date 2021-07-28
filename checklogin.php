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


$sqlquery="SELECT * FROM buyer WHERE Contact='$username' or Email='$username'   AND password='$password'";


$object=$conn->query($sqlquery);
if($object->rowCount()==1){
    $row2 = $object->fetch(PDO::FETCH_ASSOC);


                if ($password == $row2["password"]) {
                    session_start();
                    $_SESSION['u_id'] = $row2['Buyer_id'];
                    echo "<script>location.assign('buyerhome.php');</script>";
                }
    
	
}
else{
	echo "<script>location.assign('login.html');</script>";
}

?>