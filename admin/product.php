<title>Product details</title>
<?php include_once ("includes/head.php");?>


<!-- Navbar starts-->
<?php include_once("includes/navbar.php");?>
<!-- Navbar Ends-->


<!-- Sidebar menu starts-->
<?php include_once("includes/sidebar.php");?>
<!-- Sidebar menu ends-->

<main class="app-content">
<div class="app-title">
	<div>
		<h1>
			<i class="fa fa-tags"></i> Product details
		</h1>
		<!--<p>Start a beautiful journey here</p> -->
	</div>
	
		
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">


				<div class="row">


					<div class="clearix"></div>
					<div class="col-md-12">

						<!-- <h3 class="tile-title">Subscribe</h3> -->
						<div class="tile-body">
							<form class="row" method="post" data-bvalidator-validate
								action="insert/couponController.php">
								<div class="form-group col-md-4">
									<label class="control-label">Product Name <span
										style="color: red">*</span></label> <input
										class="form-control" type="text" id="name" name="name"
										data-bvalidator="required">
								</div>

								<div class="form-group col-md-4">
									<label class="control-label">Fabric <span
										style="color: red">*</span></label>
										 <select class="form-control">
										 	<option value="">Please select </option>
										 	<option value="cotton">Cotton </option>
										</select>
								</div>

								

								<div class="form-group col-md-4">
									<label class="control-label">MRP Price <span
										style="color: red">*</span></label> <input
										class="form-control" type="text" placeholder="Rs" id="mrpPrice"
										name="price" data-bvalidator="number,required">
								</div>

								<div class="form-group col-md-4">
									<label class="control-label">Our Price <span
										style="color: red">*</span></label> <input
										class="form-control" type="text" placeholder="Rs" id="ourPrice"
										name="ourPrice" data-bvalidator="number,required">
								</div>



								<div class="form-group col-md-4">
									<label class="control-label">Discount<span
										style="color: red">*</span></label> <input
										class="form-control" type="text" id="totaldiscount"
										name="totaldiscount" data-bvalidator="number,required"
										>
								</div>
								<div class="form-group col-md-4">
									<label class="control-label">Available size<span
										style="color: red">*</span></label> 
										 <select class="form-control" >
                                        <option value="">Please select </option>
                                        <option value="">Please select </option>
                                        <option value="">Please select </option>
										</select>
								</div>



								<div class="form-group col-md-8">
									<label class="control-label">Product Description <span
										style="color: red">*</span></label>
									<textarea class="form-control" cols="40" rows="5"
										id="description" name="description" data-bvalidator="required"></textarea>
								</div>

								<div class="form-group col-md-12 align-self-end">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-floppy-o"></i>Save
									</button>
								</div>

								<div class="col-md-12">  
									<center id="warning"></center>
								</div>


							</form>


						</div>

					</div>
				</div>



			</div>
		</div>
	</div>
</div>
</main>



<!-- Footer Starts-->
<?php include_once("includes/footer.php");?>
<!-- Footer Ends-->
<script type="text/javascript">
      
  $(document).ready(function(){
  		$("#ourPrice").blur(function(){

			var ourPrice= $("#ourPrice").val();
			alert(typeof(ourPrice));
			var mrpPrice= $("#mrpPrice").val();
			var discount=(ourPrice/mrpPrice)*100;
			alert(discount);
		});
});





    </script>

</body>
</html>