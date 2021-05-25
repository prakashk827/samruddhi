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
          <h1><i class="fa fa-tags"></i> My Coupons</h1>
           <p>Showing all coupons</p> 
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          
          <li class="breadcrumb-item active"><a href="dashboard.php">dashboard</a></li>
        </ul>
      </div>

       
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Coupon Name</th>
                      <th>Price (Rs)</th>
                      <th>Total Coupons</th>
                      <th>Coupons Left</th>
                      <th>Delete</th>
                      <th>Edit</th>
                       

                    </tr>
                  </thead>
                  <tbody>
<?php
$clientUId = $_SESSION['clientUId'];
$query = "SELECT * FROM `coupons`  ORDER BY id DESC";
$exe = mysqli_query($conn, $query);
if (mysqli_num_rows($exe) > 0)
{

    while ($data = mysqli_fetch_assoc($exe))
    {
?>
                 <tr>
                      <td><?php echo $data['id']; ?></td>
                      <td><?php echo $data['couponName']; ?></td>
                      <td><?php echo $data['couponPrice']; ?></td>
                      <td><?php echo $data['totalCoupons']; ?></td>
                      <td><?php echo $data['leftCoupons']; ?></td>
                    <td><button data-id="<?php ?>" class="btn btn-sm btn-danger delete">Delete</button></td>
                    <td><button class="btn btn-sm btn-warning">Edit</button></td>
                      
                    </tr>
<?php
    }
?>
        
<?php

}
else
{
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
