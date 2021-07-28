<html>
<head>

	<title>Cart</title>
		
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
$pid =$_SESSION['p'];
$uid =$_SESSION['u_id'];

$sql = "SELECT * from product where product_id='$pid'";
                    $run = $conn->prepare($sql);
                    $run->execute();

if($run->rowCount() > 0) {
                        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                $title = $row["Name"];
                                            $price = $row["price"];
											$selid=$row["sellerid"];
									$sql = "SELECT * from seller where Seller_id='$selid'";
                    $run2 = $conn->prepare($sql);
                    $run2->execute();	
if($row2 = $run2->fetch(PDO::FETCH_ASSOC)) {
                                $phone = $row2["contact_no"];					
                        }
}
}
        ?>
        
        
                            <h2 
                                class="product-name">
                                <label for="Name" class="uname" data-icon="u" > Name: </label>
                                <?php echo $title;?></h2>

                            <div
                                 class="product-price-group">
                                <label for="price" class="uname" data-icon="u" > Price: </label>
                                <span class="price">&#2547; <?php echo $price;?></span>
                            </div><br>
							<div
                                 class="product-price-group">
                                <label for="price" class="pno" data-icon="u" > Phone: </label>
                                <span class="price"> <?php echo $phone;?></span>
                            </div><br>
							
							 <form action="checkcart.php" method="post">
							    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pay</label>
                                        <div class="col-sm-10">
										<input type="text" class="form-control" id="money" name="money" required>
                                            <span class="form-text m-b-none">Write the amount here!</span>
                                        </div>
										<br>
                                    </div>
									
									<form action="checkcart.php" method="post">
							    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Transaction ID</label>
                                        <div class="col-sm-10">
										<input type="text"  class="form-control"  id="tran" name="tran" required>
                                            <span class="form-text m-b-none">Verify through it!</span>
                                        </div>
										<br>
                                    </div>
									
							
		  <form action="checkcart.php" method="post">
			<input type="submit" value="Confirm">
		</form>
    
                        </body>   
                          </html>