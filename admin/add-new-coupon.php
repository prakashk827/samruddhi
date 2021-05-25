<title>Add new coupon</title>
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
			<i class="fa fa-tags"></i> Add new coupon
		</h1>
		<!--           <p>Start a beautiful journey here</p> -->
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item"><a href="#">Blank Page</a></li>
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
									<label class="control-label">Coupon Name <span
										style="color: red">*</span></label> <input
										class="form-control" type="text" id="name" name="name"
										data-bvalidator="required">
								</div>

								<div class="form-group col-md-2">
									<label class="control-label">Coupon Price <span
										style="color: red">*</span></label> <input
										class="form-control" type="text" placeholder="Rs" id="price"
										name="price" data-bvalidator="number,required">
								</div>

								<div class="form-group col-md-2">
									<label class="control-label">Number of Coupons ? <span
										style="color: red">*</span></label> <input
										class="form-control" type="text" id="totalCoupons"
										name="totalCoupons" data-bvalidator="number,required"
										value="1000">
								</div>

								<div class="form-group col-md-8">
									<label class="control-label">Description <span
										style="color: red">*</span></label>
									<textarea class="form-control" cols="50" rows="5"
										id="description" name="description" data-bvalidator="required"></textarea>
								</div>

								<div class="form-group col-md-4"></div>
								<div class="form-group col-md-4">
									<label class="control-label">Coupon Start Date <span
										style="color: red">*</span></label> <input
										class="form-control" type="date" id="startDate"
										name="startDate" data-bvalidator="required">
								</div>

								<div class="form-group col-md-4">
									<label class="control-label">Coupon Expiry Date <span
										style="color: red">*</span></label> <input
										class="form-control" type="date" id="endDate" name="endDate"
										data-bvalidator="required">
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
      
     /* $(document).ready(function(){
 //Add save class in submit form before use.
$(".save").click(function(){

  var name  = $("#name").val();
  var price = $("#price").val();
  var des = $("#description").val();
  var sDate = $("#startDate").val();
  var eDate = $("#endDate").val();


        $.post("insert/couponController.php",
          {
            name:name,
            price:price,
            des:des,
            sDate:sDate,
            eDate:eDate
          },
          function(data)
          {
            $("#warning").html(data);
           
            
          });
        
      });
            
    });

*/




    </script>

</body>
</html>