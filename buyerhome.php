<!doctype html>
<html lang="en">
  <head>
  <?php
    include "assets/mcom/assets/inc/stylesheetadd.php";
    ?>
 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Buyer Homepage</title>
	
	<style>

		
	</style>
  </head>
  <body>
   
 
  <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">-->
  
 <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <h1 style="font-family: times, serif; font-size:14pt; font-style:oblique"> Sohojei_Ponno</h1>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
	  
	        <li class="nav-item active">
        <a class="nav-link" href="pp.php"> Product Add <span class="sr-only">(current)</span></a>
      </li>
	  
	 
	  
	  <li class="nav-item">
        <a class="nav-link" href="order.php">Ordered Items</a>
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
  



  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="s.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="g.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="bag.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   

    
	

	
	<div class="page-top">
        <div class="container">
            <div class="row"> 
     <div class="col-xs-12 col-sm-9 page-top-left">
                    <div class="popular-tabs">
                        <ul class="nav-tab">
                            <li class=""><a data-toggle="tab" href="#tab-1" aria-expanded="false">All Product</a></li>
                        </ul>
                        <div class="tab-container">
                            <div id="tab-1" class="tab-panel active">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                    <?php
                                    try{
	$conn = new PDO("mysql:host=localhost;dbname=sohoj;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('product.php');</script>";
}
                                    
                                    $sql = "SELECT * from product";
                                    $run = $conn->prepare($sql);
                                    $run->execute();

                                    if($run->rowCount() > 0){
                                        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                            $title = $row["Name"];
                                            $price = $row["price"];
                                            $description = $row["descriptiom"];
                                            $image1 = $row["imagename"];
                                           $location=$row["Location"];
                                            $entry=$row["entry_date"];
                                            $contact=$row["Contact_no"];
                                            $pid = $row["product_id"];

                                            echo '
                                                    <li  style="display:inline-block;width:300px;height:350px;">  <a href="details3.php?p='.$pid.'">
                                                        
                                                            <div class="left-block">
                                                                <img class="img-responsive" alt="product" src="assets/img/products/'.$image1.'" />
                                                                
                                                                <div class="quick-view">
                                                                </div>
                                                                <!--<div class="group-price">
                                                                    <span class="product-sale">Sale</span>
                                                                </div>-->
                                                            </div>
                                                            <div class="right-block">
                                                                <h5 class="product-name">'.$title.'</h5>
                                                                <div class="content_price">
                                                                    <span class="price product-price">&#2547; '.$price.'</span>
                                                                </div>
                                                                <div class="product-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                ';
                                        }
                                    }
                                    ?>




                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 page-top-right">
                    <div class="latest-deals">
                        <h2 class="latest-deal-title">latest deals</h2>
                        <div class="latest-deal-content">
                            <ul class="product-list owl-carousel owl-theme owl-loaded" data-dots="false" data-loop="true" data-nav="true" data-autoplaytimeout="1000" data-autoplayhoverpause="true" data-responsive="{&quot;0&quot;:{&quot;items&quot;:1},&quot;600&quot;:{&quot;items&quot;:3},&quot;1000&quot;:{&quot;items&quot;:1}}">
                                <?php
                                $sql = "SELECT * from product order by product_id desc limit 3";
                                $run = $conn->prepare($sql);
                                $run->execute();

                                if($run->rowCount() > 0){
                                    while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                                        $title = $row["Name"];
                                            $price = $row["price"];
                                            $description = $row["descriptiom"];
                                            $image1 = $row["imagename"];
                                           $location=$row["Location"];
                                            $entry=$row["entry_date"];
                                            $contact=$row["Contact_no"];
                                            $pid = $row["product_id"];

                                        echo '
                                                    <li>
                                                        <a href="details.php?p='.$pid.'">
                                                            <div class="left-block">
                                                                <img class="img-responsive" alt="product" src="assets/img/products/'.$image1.'" />
                                                                
                                                                <div class="quick-view">
                                                                </div>
                                                                <div class="group-price">
                                                                    <span class="product-sale">Latest</span>
                                                                </div>
                                                            </div>
                                                            <div class="right-block">
                                                                <h5 class="product-name">'.$title.'</h5>
                                                                <div class="content_price">
                                                                    <span class="price product-price">&#2547; '.$price.'</span>
                                                                </div>
                                                                <div class="product-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                ';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
              </div>
    </div>
	
	
        </div>
    </div>
    <!--Page Top End-->
    <!-- Footer -->
    <footer id="footer">
        <div class="container">
      

           
            <!-- #trademark-text-box -->
            <div id="footer-menu-box">
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Company Info - Partnerships</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Online Shopping</a></li>
                        <li><a href="#" >Promotions</a></li>
                        <li><a href="#" >My Orders</a></li>
                        <li><a href="#" >Help</a></li>
                        <li><a href="#" >Site Map</a></li>
                        <li><a href="#" >Customer Service</a></li>
                        <li><a href="#" >Support</a></li>
                    </ul>
                </div>

                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Terms & Conditions</a></li>
                        <li><a href="#" >Policy</a></li>
                        <li><a href="#" >Shipping</a></li>
                        <li><a href="#" >Payments</a></li>
                        <li><a href="#" >Returns</a></li>
                        <li><a href="#" >Refunds</a></li>
                        <li><a href="#" >Warrantee</a></li>
                        <li><a href="#" >FAQ</a></li>
                        <li><a href="#" >Contact</a></li>
                    </ul>
                </div>
                
            </div><!-- /#footer-menu-box -->
        </div>
    </footer>

    <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
    
			<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       
  </body>
</html>