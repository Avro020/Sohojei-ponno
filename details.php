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

</style>
    <?php
    include "assets/mcom/assets/inc/stylesheetadd.php";
    ?>
  
    <!-- Required meta tags 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cart</title>
</head>
<body class="home">
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <h1 style="font-family: times, serif; font-size:14pt; font-style:oblique"> Sohojei_Ponno</h1>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
     
	 
	       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.html">Member(Buyer)</a>
          <a class="dropdown-item" href="index1.html">Registered Member(Seller)</a>
    
        </div>
		

      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Signup
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.html">Member(Buyer)</a>
          <a class="dropdown-item" href="index1.html">Registered Member(Seller)</a>
    
        </div>
		

      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" id="search" name="search" required="required" type="text" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" formaction="search.php">Search</button>
    </form>
  </div>
</nav>
 <br><br><br><br>


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
							
<?php if($avail==1){
?>
     <div class="form-action=">
                                <div class="button-group" >
								  
								   <button class="btn-add-cart" id="addtocarthome" formaction="checkout.php" pid = "<?php echo $pid;?>">Order</button>
                                </div>
<?php

}else{}
?>
    

<?php?>
        
    
                        </div>
                    </div>
                    <!-- tab product -->
                    <div class="product-tab">
                        <ul class="nav-tab">
                            <li class="active">
                                <a aria-expanded="false" data-toggle="tab" href="#product-detail">Product Details</a>
                            </li>
                           
                        </ul>
                  
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




<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<?php
include "assets/mcom/assets/inc/addscript.php";
?>


			<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
