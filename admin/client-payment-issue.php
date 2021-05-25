<?php include_once("../db/db.php")

?>


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
          <h1><i class="fa fa-money"></i> Client Payment Pending</h1>
          <p>Showing all clients who tried to make payment for more than one time</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
      </div>
       <div class="row">

<?php

      $query = "SELECT * FROM `payment_trials` WHERE triedTimes > 0";
      $exe=mysqli_query($conn,$query);
      if(mysqli_num_rows($exe)>0){
          echo mysqli_num_rows($exe);
          while ($data=mysqli_fetch_assoc($exe)) {
               $clientUId = $data['clientUId'];
               $triedTimes = $data['triedTimes'];

             $query = "SELECT * FROM `client_profile` WHERE `clientUId` = '$clientUId'";
              $exe=mysqli_query($conn,$query);
              $data=mysqli_fetch_assoc($exe);
               $fullName = $data['firstName'].$data['lastName'];

             $sel = "SELECT * FROM `coupons_sold` WHERE `clientUId` = '$clientUId'";
             $exe1=mysqli_query($conn,$sel);
             $data1=mysqli_fetch_assoc($exe1);
              $couponName = $data1['couponName'];
              $couponPrice = $data1['couponPrice'];
              $paymentStatus = $data1['paymentStatus'];
              $paidAmt = $data1['paidAmt'];
              $boughtQty = $data1['boughtQty'];
              $paidAmt = $data1['paidAmt'];
              $boughtOn = $data1['boughtOn'];


               ?>

 
              <div class="col-lg-12">
                <div class="card mb-3 text-white bg-danger">
                <div class="card-body">
                  <blockquote class="card-blockquote">
                    <h4>Mr / Mrs. <?php echo $fullName;?></h4>
                    <h5>Tried <?php echo $triedTimes;?> times to make payment on <?php echo $boughtOn?>  </h5>
                   <p>More Details</p>
                    <h5>Mobile Number : <a style="text-decoration:none;color:white;" href="tel:<?php echo $clientUId ?>"><?php echo $clientUId ?></a> </h5>
                    <h5>Coupoun Name : <?php echo $couponName ?>  </h5>
                    <h5>Coupon Price : <?php echo $couponPrice ?>  </h5>
                    <h5>Qty : <?php echo $boughtQty ?>  </h5>
                    <h5>Total Amt : <?php echo $paidAmt ?>  </h5>
                    <h5>Payment Status : <?php echo $paymentStatus ?> </h5>
              </blockquote>
                </div>
              </div>
              </div>


  <?php  }

  }
?>



          
        </div>
    </main>


    <!-- Footer Starts-->
     <?php include_once("includes/footer.php");?>
    <!-- Footer Ends-->

    
  </body>
</html>