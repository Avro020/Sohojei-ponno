<html>

<head>


	<title>Pending</title>
		
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
$uid =$_SESSION['u_id'];



$sqlquery = "SELECT *
from cart c 
join product p 
on(c.Productproduct_id=p.product_id)
where BuyerBuyer_id='$uid'";
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
            

                $contact=$row["Contact_no"];
                                            $location= $row["Location"];
            
            echo '
                                                    <li>
								

								
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
							
					  
                                                    </li>
                                                ';
        }
 }
else{
	  echo "<h3>Right now You have no pending orders..</h3>
	  <h4>May be orders are on the way!!</h4>";
 }

?>
   </body> 
    
    </html>

