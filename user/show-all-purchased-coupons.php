<?php
include_once("../db/db.php");
session_start();
if ($_SESSION["clientUId"] == '') {
  header("Location:../index.php");
}
?>

<title>My Coupons</title>
<?php include_once("includes/head.php"); ?>


<!-- Navbar starts-->
<?php include_once("includes/navbar.php"); ?>
<!-- Navbar Ends-->


<!-- Sidebar menu starts-->
<?php include_once("includes/sidebar.php"); ?>
<!-- Sidebar menu ends-->


<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-tags"></i> My Coupons</h1>
      <!-- <p>Showing all purchased coupons</p> -->
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

      <li class="breadcrumb-item active"><a href="#">dashboard</a></li>
    </ul>
  </div>


  <div class="row">
    <div class="col-md-2">
      <a href="show-all-coupons.php"><button class="btn btn-primary"><i class="fa fa-tag"></i> Buy Coupon</button></a><br><br>
    </div>

    <div class="col-md-2">
      <a href="my-coupons.php"><button class="btn btn-danger"><i class="fa fa-tags"></i> My Coupons</button></a><br><br>
    </div>

    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>

                  <th>Purchased Date</th>
                  <th>Purchased Time </th>
                  <th>Coupon Id</th>
                  <th>Coupon Name</th>
                  <th>Lucky Number</th>
                  <th>Coupon Worth (Rs)</th>
                  <th>Sale Back Amt. (Rs)</th>
                  <th>Price (Rs)</th>
                  <th>Qty</th>
                  <th>Amount (Rs)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $clientUId = $_SESSION['clientUId'];
                $query = "SELECT couponId,luckyNumber,couponWorth,salebackAmt,coupons_sold.time,boughtOn,couponName,couponPrice,paidAmt,boughtQty,paidAmt FROM coupons INNER JOIN coupons_sold ON coupons.id = couponId 
WHERE `clientUId`= '$clientUId' AND paymentStatus = 'complete' AND coupons_sold.status !='inactive'";
                $exe = mysqli_query($conn, $query);
                if (mysqli_num_rows($exe) > 0) {
                  while ($data = mysqli_fetch_assoc($exe)) {
                ?>
                    <tr>

                      <td><?php echo $data['boughtOn']; ?></td>
                      <td><?php echo $data['time']; ?></td>
                      <td><?php echo $data['couponId']; ?></td>
                      <td class="payment"><?php echo $data['couponName']; ?></td>
                      <td class="payment"><?php echo $data['luckyNumber']; ?></td>
                      <td><?php echo $data['couponWorth']; ?></td>
                      <td><?php echo $data['salebackAmt']; ?></td>
                      <td><?php echo $data['couponPrice']; ?></td>
                      <td><?php echo $data['boughtQty']; ?></td>
                      <td><?php echo $data['paidAmt']; ?></td>

                    </tr>
                  <?php
                  }
                  ?>

                <?php

                } else {
                  echo "No history found.";
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
<?php include_once("includes/footer.php"); ?>
<!-- Footer Ends-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $('#sampleTable').DataTable();
</script>
<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
  $(document).ready(function() {

    $('.cancel').click(function() {
      var id = $(this).attr("data-id");

      swal({
        title: "Are you sure you want to delete this ? ",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
      }, function(isConfirm) {
        if (isConfirm) {

          $.post("delete/delete-payment-pending-coupon.php", {
              id: id
            },
            function(data) {
              swal("Deleted!", data, "success");
              window.location.href = "pending-payment.php";
            });

        } else {
          swal("Cancelled", "", "error");
        }
      });
    });

    //Payment
    $('.payment').click(function() {

      var id = $(this).attr("data-id");

      window.location.href = "cart-page.php?id=" + id;


    });


  });
</script>

</body>

</html>