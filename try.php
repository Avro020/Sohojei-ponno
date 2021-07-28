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
							
							
                            <div class="form-action">
                                <div class="button-group" >
                                    <button class="btn-add-cart" id="addtocarthome" formaction="checkout.php" pid = "<?php echo $pid;?>">Order</button>
                                </div>
                            </div>
    
                        </div>
                    </div>
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
                            <div id="reviews" class="tab-panel">
                                <div class="product-comments-block-tab">
                                    <div class="comment row">
                                        <div class="col-sm-3 author">
                                            <div class="grade">
                                                <span>Grade</span>
                                                <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                            </div>
                                            <div class="info-author">
                                                <span><strong>Jame</strong></span>
                                                <em>017/08/2019</em>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 commnet-dettail">
                                            I'm loving this glass set. Very impressive quality.
                                        </div>
                                    </div>
                                    <div class="comment row">
                                        <div class="col-sm-3 author">
                                            <div class="grade">
                                                <span>Grade</span>
                                                <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                            </div>
                                            <div class="info-author">
                                                <span><strong>Author</strong></span>
                                                <em>04/08/2018</em>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 commnet-dettail">
                                           
                                        </div>
                                    </div>
                                    <p>

		
                                        <!--<a class="btn-comment" href="#">Write your review !</a>-->
										
										<div>
										<textarea name="comments" id="comments" style="font-family:sans-serif;font-size:1.4em;"
										>
										Write a review!
										</textarea>
										</div>
										<input type="submit" value="Submit">
										</form>
										
                                    </p>
                                </div>

                            </div>

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




<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<?php
include "assets/mcom/assets/inc/addscript.php";
?>


</body>
</html>
