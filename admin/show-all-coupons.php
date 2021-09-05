<?php
include_once ("../db/db.php");
session_start();
if ($_SESSION["clientUId"] == '')
{
    header("Location:../index.php");
}
?>

<title>My Coupons</title>
<?php include_once ("includes/head.php"); ?>

  
    <!-- Navbar starts-->
    <?php include_once ("includes/navbar.php"); ?>
    <!-- Navbar Ends-->
    
    
    <!-- Sidebar menu starts-->
    <?php include_once ("includes/sidebar.php"); ?>
     <!-- Sidebar menu ends-->


      <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-tags"></i> Coupon summary</h1>
           <!-- <p>If coupon color is red means,it is expired or removed after announcing results.</p>  -->
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          
          <li class="breadcrumb-item active"><a href="dashboard.php">dashboard</a></li>
        </ul>
      </div>

       <!-- Payment Summury start -->

	<!-- table starts -->
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="sampleTable">
							<thead>
								<tr>
									<th>Coupon Name</th>
									<th>Coupon Id</th>
                  <th>Total Coupons</th>
									<th>Sold Qty</th>
									<th>Collected Amount</th>

								</tr>
							</thead>
							<tbody>
								<?php

$sel = "SELECT totalCoupons,couponName,couponId,SUM(boughtQty) AS boughtQty ,SUM(paidAmt) AS paidAmt FROM `coupons_sold` INNER JOIN 
coupons ON coupons_sold.couponId = coupons.id WHERE paymentStatus = 'complete' GROUP BY couponId ORDER BY coupons.id DESC";



								$exe = mysqli_query($conn, $sel);
								if ($data = mysqli_num_rows($exe) > 0) {


									while ($data = mysqli_fetch_assoc($exe)) {
								?>
										<tr>
											<td><?php echo $data['couponName']; ?></td>
											<td><?php echo $data['couponId']; ?></td>
											<td><?php echo $data['totalCoupons'];?></td>
                      <td><?php echo $data['boughtQty']; ?></td>

											<td><?php echo $data['paidAmt']; ?></td>


										</tr>
									<?php
									}
									?>
								<?php
								} else {
									echo "Error while fetching coupon";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- table ends -->



	<!-- Payemnt Summury ends -->
      
    </main>
    
  


    <!-- Footer Starts-->
     <?php include_once ("includes/footer.php"); ?>
    <!-- Footer Ends-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

$(document).ready(function(){
 
  $('.cancel').click(function(){
      var id = $(this).attr("data-id");
      
        swal({
          title: "Are you sure you want to delete this ? ",
          text: "" ,
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {

             $.post("delete/delete-payment-pending-coupon.php",
          {
            id:id
          },
          function(data)
          {
             swal("Deleted!", data , "success");
               window.location.href="pending-payment.php";         
          });
             
          } else {
            swal("Cancelled", "", "error");
          }
        });
      });

//Payment
  $('.payment').click(function(){

        var id = $(this).attr("data-id");

        window.location.href="cart-page.php?id="+id;
        
        
});


});

</script>

</body>
</html>
