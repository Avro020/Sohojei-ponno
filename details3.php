<?php
    include "dbconfig.php";



    if(isset($_GET["p"])){
        $pid = $_GET["p"];
    }else{
        echo "<script>window.location.href='home.php';</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 50%; /* Full width */
  height: 50%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #F84B8F     ;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
    <?php
    include "assets/mcom/assets/inc/stylesheetadd.php";
    ?>

    <title>Cart</title>
</head>
<body class="home">
<!-- TOP BANNER -->
<!--<div id="top-banner" class="top-banner">
    <div class="bg-overlay"></div>
    <div class="container">
        <h1>Special Offer!</h1>
        <h2>Additional 40% OFF For Men & Women Clothings</h2>
        <span>This offer is for online only 7PM to middnight ends in 30th July 2018</span>
        <span class="btn-close"></span>
    </div>
</div>-->

<div class="row">
    <div class="container">

        <div class="row">

            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="container" id="center_column">
                <!-- Product -->
                <?php
                                    try{
	$conn = new PDO("mysql:host=localhost;dbname=sohoj;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('product.php');</script>";
}
                    $sql = "SELECT * from product where product_id='$pid'";
                    $run = $conn->prepare($sql);
                    $run->execute();

                    if($run->rowCount() > 0) {
                        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                $title = $row["Name"];
                                            $price = $row["price"];
                                            $description = $row["descriptiom"];
                                            $image1 = $row["imagename"];
                                           $location=$row["Location"];
                                            $entry=$row["entry_date"];
                                            $contact=$row["Contact_no"];
                                            $pid = $row["product_id"];
                            $avail=$row["availability"];
                            session_start();
                    $_SESSION['p'] = $row["product_id"];
                            $uid =$_SESSION['u_id'];
                            
                        }
                    }
                ?>
                <div id="product">
                    <div class="primary-box row">
                        <div class="pb-left-column col-xs-12 col-sm-3"></div>
                        <div class="pb-left-column col-xs-12 col-sm-6">

                            <div class="product-image">
                                <div class="product-full">
                                    <img id="product-zoom" src="assets/img/products/<?php echo $image1;?>">
                                </div>

                            </div>
      
                        </div>
                        <div class="pb-right-column col-xs-12 col-sm-3">
                            <h1 class="product-name"><?php echo $title;?></h1>

                            <div class="product-price-group">
                                <span class="price">&#2547; <?php echo $price;?></span>
                            </div>
                           <div class="info-orther">
                                <p>Location: <?php echo $location;?></p>
                                
                            </div>
                            <div class="product-desc">
                                <?php echo $description;?>
                            </div>
			            <p>
  <?php if($avail > 0): ?>
   <?php echo "available"; ?>
  <?php else: ?>
    view only
  <?php endif; ?>
</p>
							
							<form 
                            <div class="form-action=">
                                <div class="button-group" >
                                    <?php
								  if($avail>0){
                                      echo'
								   <button class="btn-add-cart" id="addtocarthome" formaction="cart.php" pid = "<?php echo $pid;?>">Order</button>';
                                  }
                                       ?>
                                </div>
								
                            </div>
                                </form>
    
                                

                    <!-- tab product -->
                    <div class="product-tab">
                        <ul class="nav-tab">
                            <li class="active">
                                <a aria-expanded="false" data-toggle="tab" href="#product-detail">Product Details</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews">reviews</a>
                            </li>
                        </ul>
                        <div class="tab-container">
                            <div id="product-detail" class="tab-panel active">
                                <?php echo $description;?>
                            </div>
                            <head>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Comment Box</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

	function commentSubmit(){
		if(form1.comments.value == ''){ //exit if one of the field is blank
			alert('Enter your message !');
			return;
		}
        var name=<?php echo $pid; ?> ;
		var comments = form1.comments.value;
        var person=<?php echo $uid; ?> ;
		var xmlhttp = new XMLHttpRequest(); //http request instance
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments+'&person='+person, true); //open and send http request
		xmlhttp.send();
	}
	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
		});
		
</script>
</head>
<body>
<div id="container">

    <div class="comment_input">
        <form name="form1">
        
            <textarea name="comments" placeholder="Leave Comments Here..." style="width:635px; height:100px;"></textarea></br></br>
            <a href="#" onClick="commentSubmit()" class="button">Post</a></br>
        </form>
    </div>
    <div id="comment_logs">
    	Loading comments...
    <div>
</div>
</body>

                        </div>
                    </div>
                    <!-- ./tab product -->

                    <!-- ./box product -->
                </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>





<?php
include "assets/mcom/assets/inc/addscript.php";
?>


</body>
</html>
