<?php
include_once ("../db/db.php");
session_start();
if ($_SESSION["clientUId"] == '') {
    header("Location:../index.php");
}
?>

<title>Reset Client Password </title>
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
			<i class="fa fa-users"></i> Reset Client Password 

		</h1>
		<!-- <p>Payment completed clients</p> -->
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

		<li class="breadcrumb-item active"><a href="dashboard.php">dashboard</a></li>
	</ul>
</div>


<p><strong>Note : </strong><span style="color:red"> After resetting the password, the client new password will be 123</span></p>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								
								
								<th>ClientUId</th>
								<th>Full Name</th>
								<th>Action</th>
								
								
								

							</tr>
						</thead>
						<tbody>
<?php

$query = "SELECT * FROM client_profile  ORDER BY id DESC";


$clientUId = $_SESSION['clientUId'];
$exe = mysqli_query($conn, $query);
if (mysqli_num_rows($exe) > 0) {
    
   
    while ($data = mysqli_fetch_assoc($exe)) {
        
        ?>
                 			<tr style="color:<?php echo $color;?>">       				
								<td><?php echo $data['clientUId'] ?></td>
								<td><?php echo $data['firstName'] .' '. $data['lastName']  ?></td>
								<th>
									<button class="btn btn-success btn-sm resetBtn"
										data-clientUId="<?php echo $data['clientUId']; ?>">Reset</button>
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
 
  $(document).on('click','.resetBtn',function(){
    
      var id = $(this).attr("data-clientUId");
      
        swal({
          title: "Are you sure you want to reset ? ",
          text: "" ,
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {

             $.post("insert/update-client-password.php",
          {
            id:id
          },
          function(data)
          {
             swal("Deleted!", data , "success");
               window.location.href="reset-password.php";         
          });
             
          } else {
            swal("Cancelled", "", "error");
          }
        });
      });
});





</script>

</body>
</html>
