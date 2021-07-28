<?php

$bname="";
$bage="";
$bcontact="";
$bloaction="";
$bpassword="";
$bemail="";

if( isset($_POST['namesignup']) ){
	$bname=$_POST['namesignup'];
}
if( isset($_POST['agesignup']) ){
	$bage=$_POST['agesignup'];
}

if( isset($_POST['contactsignup']) ){
	$bcontact=$_POST['contactsignup'];
}

if( isset($_POST['locationsignup']) ){
	$blocation=$_POST['locationsignup'];
}


if( isset($_POST['passwordsignup']) ){
	$bpassword=$_POST['passwordsignup'];
}

if( isset($_POST['emailsignup']) ){
	$bemail=$_POST['emailsignup'];
}


try{
	$conn = new PDO("mysql:host=localhost;dbname=sohoj;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('home.php');</script>";
}

$sqlquery = "INSERT INTO seller (Name,Age,contact_no,Location,Password,Email)
VALUES ('$bname','$bage','$bcontact','$blocation','$bpassword','$bemail')";



if ($conn->query($sqlquery)==true) {
    echo "<script>location.assign('sellerhome.php');</script>";
}
else
{
    echo "HELLO";
}

?>