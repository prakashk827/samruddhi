<?php
include_once ("../db/db.php");
session_start();
if ($_SESSION["clientUId"] == '') {
    header("Location:../index.php");
}
?>

<title>Showing All Clients</title>
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
		<h1>
			<i class="fa fa-users"></i> Showing All Clients Who Purchased Coupons

		</h1>
		<p>Payment completed clients</p>
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

		<li class="breadcrumb-item active"><a href="dashboard.php">dashboard</a></li>
	</ul>
</div>
<button style="display: none" type="button" id="modalBtn"
	data-toggle="modal" data-target="#myModal">Open Modal</button>

<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
				<form class="row" method="post">
					<div class="col-md-2">
						<div class="form-group">
							<input class="btn btn-danger" name="all" type="submit"
								value="Show All Clients" data-toggle="tooltip" title="Show both result published and not published clients" />
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<input class="btn btn-danger" name="published" type="submit"
								value="Show Published" data-toggle="tooltip" title="Show  result published  clients" />
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<input class="btn btn-danger" name="notPublished" type="submit"
								value="Show Not Published"  data-toggle="tooltip" title="Show  result not published  clients" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>Date</th>
								<th>Time</th>
								<th>ClientUId</th>
								<th>Coupon Id</th>
								<th>Coupon Name</th>
								<th>No. of Time Purchased</th>
								<th>Purchased Qty</th>
								<th>Coupoun Price (Rs)</th>
								<th>Total Amount Paid (Rs)</th>
								<th>Client Info.</th>

							</tr>
						</thead>
						<tbody>
<?php
if(isset($_POST['all'])){
 $query = "SELECT coupons_sold.status,boughtOn,coupons_sold.time,couponPrice,couponName,couponId,`clientUId`,SUM(paidAmt) AS paidAmt ,SUM(`boughtQty`) AS totalQty ,COUNT(`boughtQty`) AS noOfTimePurchased FROM coupons_sold
 INNER JOIN coupons ON coupons.id = couponId WHERE `paymentStatus`='complete' GROUP BY `clientUId`,`couponId` ORDER BY couponId DESC";
} else if(isset($_POST['published'])){
 $query = "SELECT coupons_sold.status,boughtOn,coupons_sold.time,couponPrice,couponName,couponId,`clientUId`,SUM(paidAmt) AS paidAmt ,SUM(`boughtQty`) AS totalQty ,COUNT(`boughtQty`) AS noOfTimePurchased FROM coupons_sold
 INNER JOIN coupons ON coupons.id = couponId WHERE `paymentStatus`='complete' AND coupons_sold.status='inactive' GROUP BY `clientUId`,`couponId` ORDER BY couponId DESC";
} else if(isset($_POST['notPublished'])){
    $query = "SELECT coupons_sold.status,boughtOn,coupons_sold.time,couponPrice,couponName,couponId,`clientUId`,SUM(paidAmt) AS paidAmt ,SUM(`boughtQty`) AS totalQty ,COUNT(`boughtQty`) AS noOfTimePurchased FROM coupons_sold
 INNER JOIN coupons ON coupons.id = couponId WHERE `paymentStatus`='complete' AND coupons_sold.status='active' GROUP BY `clientUId`,`couponId` ORDER BY couponId DESC";
} else {
    
 $query = "SELECT coupons_sold.status,boughtOn,coupons_sold.time,couponPrice,couponName,couponId,`clientUId`,SUM(paidAmt) AS paidAmt ,SUM(`boughtQty`) AS totalQty ,COUNT(`boughtQty`) AS noOfTimePurchased FROM coupons_sold
 INNER JOIN coupons ON coupons.id = couponId WHERE `paymentStatus`='complete' AND coupons_sold.status !='active' GROUP BY `clientUId`,`couponId` ORDER BY couponId DESC";
    
}
$clientUId = $_SESSION['clientUId'];
$exe = mysqli_query($conn, $query);
if (mysqli_num_rows($exe) > 0) {
    
    $color = "green";
    while ($data = mysqli_fetch_assoc($exe)) {
        if ($data['status'] == 'inactive') {
            $color = "red";
        }
        ?>
                 			<tr style="color:<?php echo $color;?>">
								<td><?php echo $data['boughtOn'] ?></td>
								<td><?php echo $data['time'] ?></td>
								<td><?php echo $data['clientUId'] ?></td>
								<td><?php echo $data['couponId'] ?></td>
								<td><?php echo $data['couponName'] ?></td>
								<td><?php echo $data['noOfTimePurchased'];  ?></td>
								<td><?php echo $data['totalQty'];  ?></td>
								<td><?php echo $data['couponPrice'];  ?></td>
								<td><?php echo $data['paidAmt'];  ?></td>
								<th>
									<button class="btn btn-success btn-sm moreDetails"
										data-clientUId="<?php echo $data['clientUId']; ?>">Show</button>
								</th>
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

</main>
<style type="text/css">
</style>
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title">Client Info.</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm"
					data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>



<!-- Footer Starts-->
<?php include_once ("includes/footer.php"); ?>
<!-- Footer Ends-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript"
	src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

$(document).ready(function(){
 
  $('.cancel').click(function(){
    $("#myModal").modal('show');
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
  $('.moreDetails').click(function(){

      var clientUId = $(this).attr("data-clientUId");

      $.post("display/get-client-list.php",
                    {
                      
                      clientUId:clientUId
                      
                    },
                    function(data)
                    {
                     $(".modal-body").html(data);
                     document.getElementById("modalBtn").click();
                    }
        );
                      
      });



       // window.location.href="cart-page.php?id="+id;
        
        
});



</script>

</body>
</html>
