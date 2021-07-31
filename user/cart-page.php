<?php
include_once ("../db/db.php");
$couponId = $_GET['id'];


session_start();
if ($_SESSION["clientUId"] == '')
{
    header("Location:../index.php");
}
?>
<?php
$totalCoupons = 0; 
$clientUId = $_SESSION["clientUId"];
$query = "SELECT * FROM `coupons` WHERE status='active' and id ='$couponId'";
$exe = mysqli_query($conn, $query);

if (mysqli_num_rows($exe) > 0){
    
    $count = "SELECT COUNT(id) AS totalPurchasedCoupons FROM `coupons_sold` WHERE clientUId = '$clientUId' and couponId='$couponId' and paymentStatus = 'complete'";
    $execute = mysqli_query($conn, $count);
    $soldCoupons = mysqli_fetch_assoc($execute); 
    $totalCoupons = $soldCoupons['totalPurchasedCoupons'];
    
    if($totalCoupons == 10){
        $_SESSION["message"] = "You are allowed to buy only 10 coupons";
        $_SESSION["msgClr"] = "red";
        header("Location:status.php");
    }
    $data = mysqli_fetch_assoc($exe);
}
else{
    header("Location:show-all-coupons.php");
}
?>

<style type="text/css">
  
.order{
  border:  3px solid #007D71;
  background: #CDCDCD;


}
.summury{
  padding: 1%;
   
}

</style>


<title>Add new coupon</title>
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
          <h1><i class="fa fa-cart-plus "></i> Coupon Cart  </h1>

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
        <div class="col-md-7">
          

            
           <div class="col-md-12">
            <h4>INSTRUCTIONS</h4>
            <ul>
              <li>You are allowed to buy only 10 coupons at a time.</li>

            </ul>
             <h4>NEED HELP ?</h4>
             <a href="#">Contact us</a>

           </div>
           <div class="col-md-12" style="margin-top:35%">
            <h4>ACCEPTED PAYMENT METHODS</h4>
            <img width=180px src="images/we-accept.jpg">
            
           </div>
          

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4 order">
          
            <!-- <h3 class="tile-title">Subscribe</h3> -->
            <div class="tile-body">
              <form  class="row" method="post" data-bvalidator-validate action="razorpay/pay.php">
                <input type="hidden" id="clientUId" name="clientUId" value="<?php echo $_SESSION['clientUId']; ?>">
                <input type="hidden" id="couponId" name="couponId" value="<?php echo $data['id']; ?>">
                <input type="hidden" id="couponPrice" name="couponPrice" 
                value="<?php echo $data['couponPrice']; ?>">
                <center>
                  <strong>
                    <br>By placing your order, you agree to the terms and condition
                </strong>
                  </center>
                  
                  <div class="form-group col-md-12">
                    <h3><br>PLACE ORDER</h3>
                  <p>Coupon Name :  <strong style="color:#007D71"><?php echo $data['couponName']; ?></strong> </p>
                  <p>Coupon Price :  <strong style="color:#007D71">Rs <?php echo $data['couponPrice']; ?>/-</strong>  </p>
                    
                    <p style="background: red;color:white;padding:1%;">Coupons left to buy :
                        <?php  echo $couponsLeft =  $data['totalCoupons'] - $data['soldCoupons'] ;?>
                    </p>
					<p style="background: #007D71;color:white;padding:1%;" id="previouCoupons"></p>
					<hr>
                    <div class="form-group col-md-12">
                  <label class="control-label">Qty</label>
                  <input class="form-control" type="text" id="qty" name="qty" data-bvalidator="required" min="1" max="10">
                </div>

                 <div class="form-group col-md-12">
                  <label class="control-label">Total amount to be paid</label>
                  
                  <h4 id="amt"></h4>
                </div>

                <input type="hidden" id="price" name="price" value="<?php echo $data['couponPrice']; ?>">
                <div class="col-md-12">
                
                <p class="warn alert alert-dismissible alert-danger" id="warning"></p>

                </div>

                 <div class="form-group col-md-12 ">
                  
                  <button  class="btn btn-primary btn-lg btn-block payNow" type="submit">
                   Pay Now</button>
                
                </div>
                
                
  </div>

         </form>


            </div>
         
        </div>
      </div>



            </div>
          </div>
        </div>
      </div>
    </main>


    <!-- Footer Starts-->
     <?php include_once ("includes/footer.php"); ?>
    <!-- Footer Ends-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    



    <script type="text/javascript">
    var totalCoupons  = "<?php echo $totalCoupons?>";
    var couponsLeft = "<?php echo $couponsLeft ?>";

      $(document).ready(function(){
          $("#previouCoupons").css('display','none');
          if(totalCoupons != 0){
              if(totalCoupons == 1){
            	  $("#previouCoupons").css('display','block');
            	  $("#previouCoupons").html("Previouly purchased coupon : "+totalCoupons+" ");
            	  
              }else{
            	  $("#previouCoupons").css('display','block');
	         	  $("#previouCoupons").html("Previouly purchased coupons : "+totalCoupons+" ");
              }
          }
		
        $(".warn").css("display",'none');
        $(".payNow").click(function(e){
			var qty = $("#qty").val();
            if( qty != ''){
            	$(".warn").css("display",'block');

            	if(qty > (10-totalCoupons)){
                	  e.preventDefault();
                	
                      $("#warning").html('You\'re  allowed to buy less than or equals to '+(10-totalCoupons)+' coupons.');
              }
            	if( qty > couponsLeft ) {
                        e.preventDefault();
                        $("#warning").html('You\'re  allowed to buy less than or equals to '+(couponsLeft)+' coupons.');
              }
                $("#warning").html("Please wait..");

          }  
          
          
        });
        $("#qty").keyup(function(){
          var price = $("#price").val();
          var qty = $("#qty").val();
          var onlyNumRg='^[0-9]+$';
          if(!qty.match(onlyNumRg)){
            $("#qty").val('');
            $("#amt").html('');
          } else if(qty > 10 ) {
            $("#qty").val('');
            $("#amt").html('');
            $(".warn").css("display",'block');
            $("#warning").html("You are allowed to buy only 10 coupons");
          } else if( qty <= 0  || qty == '') {

            $("#qty").val('');
            $("#amt").html('');
            $(".warn").css("display",'block');
            $("#warning").html("Please enter valid Qty.");
          }
            else{
              $(".warn").css("display",'none');
              $("#warning").html("");
             total = price*qty;
             $("#amt").html('Rs '+ total+'/-');

          }
         
          
        });
            
    });
    </script>



    
  </body>
</html>
