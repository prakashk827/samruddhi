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



<div class="tile mb-4">

	<div class="row" style="margin-bottom: 2rem;">
		<div class="col-lg-12">

			<div class="bs-component">
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab"
						href="#home">Add Product</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab"
						href="#profile">Add Items</a></li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active show" id="home">
						<br> <br>
						<div class="row">
							<div class="col-md-12">
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

													<div class="  col-md-4">
														<label class="control-label">Fabric <span
															style="color: red">*</span></label> <select
															class="form-control displayItems" id="fabrics">
															<option value="">Please select</option>

														</select>
													</div>

													<div class="form-group col-md-4">
														<label class="control-label">Category<span
															style="color: red">*</span></label> <select
															class="form-control displayItems" id="categories">
															<option value="">Please select</option>
														</select>
													</div>


													<div class="form-group col-md-4">
														<label class="control-label">Available size<span
															style="color: red">*</span></label> <select
															class="form-control displayItems" id="sizes">
															<option value="">Please select</option>
														</select>
													</div>

													<div class="form-group col-md-4">
														<label class="control-label">MRP Price <span
															style="color: red">*</span></label> <input
															class="form-control" type="text" placeholder="Rs"
															id="mrpPrice" name="price"
															data-bvalidator="number,required">
													</div>

													<div class="form-group col-md-4">
														<label class="control-label">Our Price <span
															style="color: red">*</span></label> <input
															class="form-control" type="text" placeholder="Rs"
															id="ourPrice" name="ourPrice"
															data-bvalidator="number,required">
													</div>



													<div class="form-group col-md-4">
														<label class="control-label">Discount<span
															style="color: red">*</span></label> <input
															class="form-control" type="text" id="totaldiscount"
															name="totaldiscount" data-bvalidator="number,required">
													</div>
													<div class="form-group col-md-8"></div>




													<div class="form-group col-md-8">
														<label class="control-label">Product Description <span
															style="color: red">*</span></label>
														<textarea class="form-control" cols="40" rows="5"
															id="description" name="description"
															data-bvalidator="required"></textarea>
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
					<div class="tab-pane fade" id="profile">
					<br><br>
						<div class="row">
							<div class="col-md-12">

								<div class="tile-body">


									<div class="row">
										<div class="form-group col-md-3">
											<label class="control-label">Fabric Name</label> <input
												class="form-control" type="text" id="fabric" name="fabric"><br>
											<button class="btn btn-danger fabric" data-item="fabric">Add</button>
										</div>
										<div class="form-group col-md-4">
											<label class="control-label">Category</label> <input
												class="form-control" id="category" type="text" name="fabric"><br>
											<button class="btn btn-danger category" data-item="category">Add</button>

										</div>
										<div class="form-group col-md-4">
											<label class="control-label">Size</label> <input
												class="form-control" id="size" type="text" name="fabric"><br>
											<button class="btn btn-danger size" data-item="size">Add</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="dropdown1">
						<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they
							sold out mcsweeney's organic lomo retro fanny pack lo-fi
							farm-to-table readymade. Messenger bag gentrify pitchfork
							tattooed craft beer, iphone skateboard locavore carles etsy
							salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
							Leggings gentrify squid 8-bit cred pitchfork.</p>
					</div>
					<div class="tab-pane fade" id="dropdown2">
						<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
							art party before they sold out master cleanse gluten-free squid
							scenester freegan cosby sweater. Fanny pack portland seitan DIY,
							art party locavore wolf cliche high life echo park Austin. Cred
							vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
							farm-to-table VHS viral locavore cosby sweater.</p>
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

		$(".fabric").click(function(){
			var inputVal = $("#fabric").val();
			var item = $(this).attr("data-item");
			if(inputVal !=""){
				$.post("insert/add-items.php",
				          {
					 		inputVal:inputVal,
					 		item:item
				          },
				          function(data) {
					          alert(data);
				          }
		         );
			}
		});

		$(".category").click(function(){
			var inputVal = $("#category").val();
			var item = $(this).attr("data-item");
			if(inputVal !=""){
				$.post("insert/add-items.php",
				          {
					 		inputVal:inputVal,
					 		item:item
				          },
				          function(data) {
					          alert(data);
				          }
		         );
			}
		});

		$(".size").click(function(){
			var inputVal = $("#size").val();
			var item = $(this).attr("data-item");
			if(inputVal !=""){
				$.post("insert/add-items.php",
				          {
					 		inputVal:inputVal,
					 		item:item
				          },
				          function(data) {
					          alert(data);
				          }
		         );
			}
		});


		/* Dropdown values start*/
		
		$(".displayItems").click(function(){
			var type = $(this).attr('id'); // getting dropdown id
				$.post("insert/display-items.php",
				          {
					 		type:type
				          },
				          function(data) {
					         $("#"+type).html(data);
				          }
		         );
		});

			
		/* Dropdown values Ends */
		
	  	
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