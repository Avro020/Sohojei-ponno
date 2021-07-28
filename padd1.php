<?php

 session_start();
$uid =$_SESSION['u_id'];
  

$productid="";
$prname="";
$location="";
$price="";
$entry="";
$contact="";
$description="";
$image="";
$avaiability= 1;


if( isset($_POST['prname']) ){
	$prname=$_POST['prname'];
}

if( isset($_POST['lname']) ){
	$location=$_POST['lname'];
}

if( isset($_POST['pprice']) ){
	$price=$_POST['pprice'];
}

if( isset($_POST['edate']) ){
	$entry=$_POST['edate'];
}

if( isset($_POST['pcon']) ){
	$contact=$_POST['pcon'];
}

if( isset($_POST['description']) ){
	$description=$_POST['description'];
}
if( isset($_POST['fileToUpload']) ){
	$image=$_POST['fileToUpload'];
}

try{
	$conn = new PDO("mysql:host=localhost;dbname=sohoj;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('product.php');</script>";
}
 $target_dir = "assets/img/products/";
                                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                    if($check !== false) {
                                        //echo "File is an image - " . $check["mime"] . ".";
                                        $uploadOk = 1;
                                    } else {
                                        //echo "File is not an image.";
                                        $uploadOk = 0;
                                    }


                                    // Check file size
                                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                                        echo "Sorry, your file is too large.";
                                        $uploadOk = 0;
                                    }
                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                        && $imageFileType != "gif" ) {
                                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                        $uploadOk = 0;
                                    }
                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) {
                                        echo "Sorry, your file was not uploaded.";
                                    // if everything is ok, try to upload file
                                    } else {
                                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                                            $filename = basename( $_FILES["fileToUpload"]["name"]);
                                            
                                            $sql = "INSERT INTO product (Name,Location, price,entry_date,Contact_no,imagename,descriptiom,availability,sellerid)
                                             VALUES ('$prname','$location','$price','$entry','$contact','$filename','$description','$avaiability= 1;','$uid')";

                                            $runupload = $conn->prepare($sql);
                                            $runupload->execute();
                                            $_SESSION["msg"] = "Product uploaded Successfully";
                                             echo "<script>location.assign('sellerhome.php');</script>";
                                            
                                          

                                        } else {
                                            echo "Sorry, there was an error uploading your file.";
                                        }
                                    }

                                            






?>