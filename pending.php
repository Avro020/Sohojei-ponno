<html>

<head>

	<title>Ordered Items</title>
		
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
$uid =$_SESSION['d'];



$sqlquery = "SELECT *
from cart c
join product p 
on(c.Productproduct_id=p.product_id)
where p.sellerid='$uid'";
$run = $conn->prepare($sqlquery);
$run->execute();


 if($run->rowCount() > 0){
        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                        $orderid = $row["orderid"];
                                            $buyer = $row["BuyerBuyer_id"];
                                            $price = $row["price"];
                                            $payed = $row["payed_money"];
                                            $tra=$row["tid"];
                                            $status=$row["status"];
                                            $due = $row["Due"];
                                            $name=$row["Name"];
            
            
                                            $sqlquery ="SELECT Contact,Location
from buyer
where Buyer_id='$buyer'";
                                                $run2 = $conn->prepare($sqlquery);
$run2->execute();
            if($row2 = $run2->fetch(PDO::FETCH_ASSOC)){
                $contact=$row2["Contact"];
                                            $location= $row2["Location"];
            }
            echo '
                                                    <li>
								
                            <a href="orderdetails.php?p='.$orderid.'">
								
                            <h2 class="product-name">'.$name.'</h2>

													
                            <div class="content_price">
                                <label for="price" class="uname" data-icon="u" > Price: </label>
                                 <span class="price product-price">&#2547; '.$price.'</span>
                            </div><br>
							
							<div class="content_price">
                                <label for="price" class="uname" data-icon="u" > Payed Amount: </label>
                                 <span class="price product-price">&#2547; '.$payed.'</span>
                            </div><br>
							
							
							<div class="content_price">
                                <label for="price" class="uname" data-icon="u" > Due Amount: </label>
                                  <span class="price product-price">&#2547; '.$due.'</span>
                            </div><br>
							
							
							
							<div class="content_price">
                                <label for="price" class="uname" data-icon="u" > Transaction_id: </label>
                                 <span class="price product-price"> '.$tra.'</span>
                            </div><br>
							
							<div class="content_price">
                                <label for="price" class="uname" data-icon="u" > Contact_No: </label>
                                  <span class="price product-price"> '.$contact.'</span>
                            </div><br>
							
							<div class="content_price">
                                <label for="price" class="uname" data-icon="u" > Location: </label>
                                   <span class="price product-price"> '.$location.'</span>
                            </div><br>
							
							
							<div class="content_price">
                                <label for="price" class="uname" data-icon="u" > Status: </label>
                                   <span class="product-name">'.$status.'</span>
                            </div><br>
							
													</a>
                                                    </li>
                                                ';
        }
 }
 
 else{
	  echo "<h3>You haven't ordered anything!!</h3>
	  <h4>Hurry Up then!!</h4>";
 }


?>
   </body> 
    
    </html>

