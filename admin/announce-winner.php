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
			<i class="fa fa-trophy"></i> Announce Winner
		</h1>
		<p>
			Showing all clients details who bought coupons <i class="fa fa-tags"></i>
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
				<form class="row" data-bvalidator-validate
					action="announce-winner.php">
					<div class="col-md-4">
						<select class="form-control" name="couponId" required>
							<option value="">Select Coupon</option>
							<?php
    $sel = "SELECT * FROM `coupons` WHERE status = 'active' ORDER BY id DESC";
    $exe = mysqli_query($conn, $sel);
    
    if (mysqli_num_rows($exe) > 0) {
        
        while ($data = mysqli_fetch_assoc($exe)) {
            ?>
               <option value="<?php echo $data['id']  ?>"><?php echo $data['couponName']?></option>			         
                                                                			
                <?php
        }
    }
    ?>
						</select>

					</div>
					<div class="col-md-2">

						<input type="submit" class="form-control btn-danger"
							value="Search">
					</div>
			
			</div>
		</div>

		</form>
	</div>
	
	<div class="col-md-12">

		<div class="tile">
			<div class="tile-body">


				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>ClientUId</th>
								<th>Lucky Number</th>
								<th>Full Name</th>
                                <th>City</th>
								<th>Announce as</th>
							</tr>
						</thead>
						<tbody>
<?php
if (isset($_GET['couponId']) && $_GET['couponId'] != '') {
    $couponId = $_GET['couponId'];
    
    $sel = "SELECT couponName FROM coupons WHERE id = '$couponId'";
    $exe = mysqli_query($conn, $sel);
    $cName = mysqli_fetch_assoc($exe);
    $showMsg = "<h5>Selected coupon name : <sapn style='color: red;'>". $cName['couponName']."</span></h5>";
    
    $clientUId = $_SESSION['clientUId'];
    $q = "SELECT client_address.city,client_profile.clientUId,firstName,lastName,client_profile.winner,luckyNumber FROM `client_profile` INNER JOIN coupons_sold
ON  client_profile.clientUId = coupons_sold.clientUId INNER JOIN client_address ON client_profile.clientUId = client_address.clientUId  WHERE 
(coupons_sold.paymentStatus='complete' AND client_profile.winner = 'no' AND coupons_sold.couponId = '$couponId' and coupons_sold.status='active') ";
    
    $e = mysqli_query($conn, $q);
    
    if (mysqli_num_rows($e) > 0) {
        
        echo $showMsg;
        
        while ($data = mysqli_fetch_assoc($e)) {
            $UId = $data['clientUId'];
            ?>
                	 		<tr>
								<td><?php echo $data['clientUId'] ?></td>
								<td><?php echo $data['luckyNumber'] ?></td>
								<td><?php echo $data['firstName']. ' ' . $data['lastName'] ?></td>
                                <td><?php echo $data['city']?></td>

								<td><button data-luckyNumber="<?php echo $data['luckyNumber'] ?>" data-couponId="<?php echo $couponId?>"
										data-clientUId="<?php   echo $data['clientUId']  ?>"
										class="btn btn-danger btn-sm winnerBtn">Winner</button></td>
							</tr>
<?php
        }
    } else {
        echo "No rocords found";
        echo $showMsg = "";
    }
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

  $(document).on('click','.winnerBtn',function(){
      var clientUId = $(this).attr("data-clientUId");
      var couponId =  $(this).attr("data-couponId");
      var luckyNumber = $(this).attr("data-luckyNumber");
        swal({
          title: "Are you sure you ? ",
          text: "" ,
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {

             $.post("insert/announceWinner.php",
          {
            	 luckyNumber:luckyNumber,
            	 clientUId:clientUId,
            	 couponId:couponId,
            	 
          },
          function(data)
          {
             swal("Done!", data , "success");
             window.location.href="announce-winner.php";         
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