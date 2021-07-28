<html>
<head>

	<title>Status</title>
		
		<style>
		body {
  background-color: #D0ECE7;
}

		</style>

</head>
    <body>
<?php
    include "dbconfig.php";



    if(isset($_GET["p"])){
        $oid = $_GET["p"];
    }else{
        echo "<script>window.location.href='home.php';</script>";
    }

 $sql = "SELECT * from cart where orderid='$oid'";
                    $run = $conn->prepare($sql);
                    $run->execute();

                    if($run->rowCount() > 0) {
                        if ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                          $orderid = $row["orderid"];
                                            $buyer = $row["BuyerBuyer_id"];
                                            $price = $row["price"];
                                            $payed = $row["payed_money"];
                                           $tra=$row["tid"];
                                            $due = $row["Due"];
                            session_start();
                    $_SESSION['o'] = $row["orderid"];
                            
                        }
                    }
        ?>
         <form  method="post" autocomplete="on"> 
               <div class="col-sm-4 col-sm-offset-2">
                                   <h2> <label for="Status" class="status" data-icon="u" > Product Status </label></h2><br>
                                    <input id="status" name="status" required="required" type="text"/>
                            
                                
                                <br><br>
                               
                                            <button class="btn btn-white btn-sm" type="submit" formaction="sellerhome.php">Cancel</button>
                                            <input class="btn btn-primary btn-sm" type="submit" value="Update" name="update" formaction="sadd.php">
                                             <input class="btn btn-primary btn-sm"  type="submit" value="Delete" formaction="odelete.php">
                                        </div><br>
                            </form>

                
        </body> 
    
    </html>