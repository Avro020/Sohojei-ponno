<?php

$bname="";
$bcontact="";
$bemail="";
$blocation="";
$bpassword="";
if( isset($_POST['namesignup']) ){
	$bname=$_POST['namesignup'];
}

if( isset($_POST['contactsignup']) ){
	$bcontact=$_POST['contactsignup'];
}

if( isset($_POST['emailsignup']) ){
	$bemail=$_POST['emailsignup'];
}

if( isset($_POST['locationsignup']) ){
	$blocation=$_POST['locationsignup'];
}

if( isset($_POST['passwordsignup']) ){
	$bpassword=$_POST['passwordsignup'];
}


try{
	$conn = new PDO("mysql:host=localhost;dbname=sohoj;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('home.php');</script>";
}

$sqlquery = "INSERT INTO buyer (Name,Contact,Email,Location, password)
VALUES ('$bname','$bcontact','$bemail','$blocation','$bpassword')";



if ($conn->query($sqlquery)==true) {
    echo "<script>location.assign('buyerhome.php');</script>";
}
else
{
    echo "HELLO";
}

?>