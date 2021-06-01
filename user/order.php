<?php
session_start();
if ($_SESSION["clientUId"] == '') {
    header("Location:../index.php");
}
?>

<title>Add new coupon</title>
<?php include_once("includes/head.php");?>


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
			<i class="fa fa-tags"></i> Update Profile
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
							<div class="row">
								<div class="form-group col-md-1"></div>
								<div class="form-group col-md-4">
								<a href="order-cloths.php" data-toggle="tooltip" title="If you're interested to buy cloth then click here"> <button class="btn btn-success">I want to order cloth</button> </a>
								<a href="sale-back.php" data-toggle="tooltip" title="If you're not interested to buy cloth then click here"> <button class="btn btn-danger">I want to sale back</button> </a>
								</div>
							</div>
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