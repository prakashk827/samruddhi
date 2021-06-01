<?php
session_start();
include_once ("../db/db.php");

?>

<title>Announce Winner</title>
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
			<i class="fa fa-trophy"></i> Publish Winners
		</h1>
		<p>
			Showing all announced winner list <i class="fa fa-tags"></i>
		</p>
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
			
	</div>
	<div class="col-md-4"><a href="announce-winner.php"><button class="btn btn-warning">Announce Winner </button></a></div><br><br>
	<div class="col-md-12">

		
			<div class="tile-body">

				
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>Coupon Id</th>
								<th>Coupon Name</th>
								<th>Coupon Price</th>
								<th>Total Coupons</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
<?php

   
    $sel = "SELECT DISTINCT coupons.id,couponName,couponPrice,totalCoupons,couponId FROM coupons INNER JOIN winner_coupons ON
    coupons.id = winner_coupons.couponId WHERE published = 'no'";
    
    $exe = mysqli_query($conn, $sel);
    
    if (mysqli_num_rows($exe) > 0) {
        
        while ($data = mysqli_fetch_assoc($exe)) {
            
            ?>
                	 		<tr>
								<td><?php echo $data['id'] ?></td>
								<td><?php echo $data['couponName'] ?></td>
								<td><?php echo $data['couponPrice'] ?></td>
								<td><?php echo $data['totalCoupons'] ?></td>
								<td><button data-couponId="<?php echo  $data['id']?>"class="btn btn-success btn-sm publishBtn">Publish Winners</button></td>
							</tr>
<?php
        }
    } else {
        echo "No rocords found";
    }


?>
                   
                  </tbody>
					</table>
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
 
  $('.publishBtn').click(function(){
      var clientUId = $(this).attr("data-clientUId");
      var couponId =  $(this).attr("data-couponId");
        swal({
          title: "Are you sure you want to publish all winners of this coupon ? ",
          text: "" ,
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {

             $.post("insert/publish-winner.php",
          {
            	 couponId:couponId
          },
          function(data)
          {
             swal("Done!", data , "success");
               //window.location.href="publish-winner.php";         
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
                      
                     
                      
                    });
    

                      
                      
                     
                      
      });



       // window.location.href="cart-page.php?id="+id;
        
        
});



</script>





</body>
</html>
