<?php
include "dbconfig.php";
session_start();
$pid =$_SESSION['p'];
$uid =$_SESSION['u_id'];

$money="";
$pay="";

if( isset($_POST["money"]) ){
	$money=$_POST["money"];
}

if( isset($_POST["tran"]) ){
	$pay=$_POST["tran"];
}
$sql = "SELECT * from product where product_id='$pid'";
                    $run = $conn->prepare($sql);
                    $run->execute();

if($run->rowCount() > 0) {
                        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                $title = $row["Name"];
                                            $price = $row["price"];
                            $due=$price-$money;
                            
                            $sqlquery = "INSERT INTO cart (BuyerBuyer_id,Productproduct_id,price,payed_money,due,tid)
                            VALUES ('$uid','$pid','$price','$money','$due','$pay')";
                            $object=$conn->query($sqlquery);
if($object->rowCount()==1){
    echo "<script>location.assign('buyerhome.php');</script>";

}
else{
	echo "<script>location.assign('login.html');</script>";
    
}
                        }
}





?>