<?php
include_once ("../db/db.php");
session_start();
if ($_SESSION["clientUId"] == '')
{
    header("Location:../index.php");
}
?>

<title>Pending Payment Details</title>
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
          <h1><i class="fa fa-clock-o"></i> Pending Payments</h1>
          <p>All pending payments will be deleted after 24 hours</p>
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
                      <th>Date</th>
                      <th>Coupon Name</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Amount</th>
                       <th>Action</th>
                      <th>Make Payment</th>

                    </tr>
                  </thead>
                  <tbody>
<?php
$clientUId = $_SESSION['clientUId'];
$query = "SELECT coupons.id,couponName,couponPrice,boughtQty,paidAmt,boughtOn,coupons_sold.id,coupons_sold.couponId
FROM coupons INNER JOIN coupons_sold  ON  coupons.id = coupons_sold.couponId 
WHERE 
coupons_sold.clientUId = '$clientUId' AND coupons_sold.paymentStatus='pending' AND coupons.displayType != 'hide'";
$exe = mysqli_query($conn, $query);

if (mysqli_num_rows($exe) > 0)
{
    while ($data = mysqli_fetch_assoc($exe))
    {
?>
                 <tr>
                      <td><?php echo $data['id']; ?></td>
                      <td><?php echo $data['boughtOn']; ?></td>
                      <td class="payment" data-cName="pk"><?php echo $data['couponName']; ?></td>
                      <td><?php echo $data['couponPrice']; ?></td>
                      <td><?php echo $data['boughtQty']; ?></td>
                      <td><?php echo $data['paidAmt']; ?></td>
                      <td><button  data-id="<?php echo $data['id']; ?>" class="btn btn-danger btn-sm cancel">Cancel</button></td>
                      <td><button data-id="<?php echo $data['couponId'];?>" 
                         class="btn btn-success btn-sm payment">Complete</button></td>
                    </tr>
<?php
    }
    
}
else
{
    echo "No records found";
    
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
