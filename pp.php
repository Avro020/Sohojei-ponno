<!DOCTYPE html>

<html>

	<head>
		<title>Product</title>
		
		<style>
		body {
  background-color: #D0ECE7;
}

		</style>
	</head>

	<body>
	<h2>Product Add & Update Form</h2>
		<div class="ibox-content">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="prname" required> 
                                            <span class="form-text m-b-none">Write a suitable title for your product</span>
                                        </div>
										<br>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Description</label>
                                        <div class="col-sm-10">
                                            <input type="textarea" class="form-control" name="description" required>
                                            <span class="form-text m-b-none">Write a suitable description for your product</span>
                                        </div><br>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1" class="form-control" name="pprice" required/>
                                            <span class="form-text m-b-none">Write a suitable price for your product</span>
                                        </div><br>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Upload Photo</label>
                                        <div class="col-sm-10 ">

                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="fileToUpload" required/>
                                                <span class="form-text m-b-none">Upload a suitable image for your product</span>
                                            </div><br>

                                        </div>
                                    </div>
                                       Location: <input type="text" id="lname" name="lname" required><br>
			                        <br/>
                                       Entry Date: <input type="date" id="edate" name="edate" required><br>
			                            <br/>
                                        Contact no: <input type="phoneCode" id="pcon" name="pcon" required><br>
			                             <br/>
            
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <input class="btn btn-primary btn-sm" type="submit" value="Upload" name="upload_product" formaction="padd.php">
                                             <input class="btn btn-primary btn-sm"  type="submit" value="Update" formaction="pupdate.php">
                                        </div><br>
                                    </div>
                                    
                             >
                                </form>
                            </div>
            
            <
            
            
            
		</form>
	</body>

</html>