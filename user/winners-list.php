<title>Winners List</title>

<?php
session_start();
if (! isset($_SESSION["clientUId"])) {
    header("Location:index.php");
}
?>
<?php
include_once ("../db/db.php");
$clientUId = $_SESSION["clientUId"];
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
		<h1>
			<i class="fa fa-trophy"></i> Winners List
		</h1>


		<!--<p>Start a beautiful journey here</p> -->
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	</ul>
</div>


<a href="show-all-coupons.php"><button class="btn btn-success">Try One's</button></a>
<br>
<br>
<div class="row">
	
	<?php
$clientUId = $_SESSION["clientUId"];
$sel = "SELECT client_profile.clientUId,winner_coupons.date,winner_coupons.time,couponId,firstName,lastName,image,city,orderType FROM winner_coupons
 INNER JOIN client_profile ON client_profile.clientUId = winner_coupons.clientUId INNER JOIN client_address ON client_profile.clientUId = client_address.clientUId 
WHERE published='yes' AND orderShipped = 'no'  ORDER BY winner_coupons.id DESC ";
$exe = mysqli_query($conn, $sel);

if (mysqli_num_rows($exe) > 0) {
    
    while ($data = mysqli_fetch_assoc($exe)) {
        $couponId = $data['couponId'];
        $query = "SELECT * FROM coupons WHERE id = '$couponId'";
        $execute = mysqli_query($conn, $query);
        $coupons = mysqli_fetch_assoc($execute);
        $orderType =  $data['orderType'];
        $background = 'white';
        if($orderType !="" && $data['clientUId'] == $clientUId ){
            $background = '#E1E1E1';
       }
        ?>
        
        
        <div class="col-md-6">
		<div class="tile" style="background:<?php echo $background ?>">
			<img width="80px" src="<?php  echo $data['image']; ?>"><span></span><br>
			<strong>Full Name : </strong> <?php  echo $data['firstName'].' '.$data['lastName'];  ?><br>
			<strong> Published On <br> Date :
			</strong>   <?php  echo $data['date']; ?> <strong>&</strong> <span><strong>Time
					: </strong>  <?php  echo $data['time']; ?></span> <br>
                   
                    <strong>Coupon
				Name : </strong>  <span style="color:red"> <?php  echo $coupons['couponName']; ?> </span> 
                <strong> & Coupon Id :</strong><?php echo $couponId; ?>
                <br> <strong>
				Coupon Worth :</strong>  <?php  echo 'Rs ' .$coupons['couponWorth'] . ' /-'; ?><br>
			<strong> Sale Back Amt. :</strong>  <?php  echo 'Rs ' .$coupons['salebackAmt'] . ' /-'; ?><br>
			<strong>City :</strong>   <?php  echo $data['city'] == '' ? 'Not Provided' : $data['city'] ; ?><br>
			<br>
			<?php

        if ( $data['clientUId'] == $clientUId && $orderType == '') {?>
            <form action="product-list.php" method="POST">
               
                <input type="hidden" name="coupounIdForModal" value="<?php echo $couponId; ?>">
                <input  type="submit"  class="btn btn-success disableInputField" value="Buy Cloth">
                <a href="sale-back.php"><button type="button" class="btn btn-danger disableInputField">Sale Back</button></a>
            </form>
            
			<?php
        } else{ ?>

            <form style="visibility:hidden" action="product-list.php" method="POST">
               <!-- hideing purpose -->
               <input type="hidden">
               <input  type="submit">
               <button class="btn btn-danger disableInputField">Sale Back</button>
           </form>

        <?php }
        
        ?>
			
		</div>
	</div>
        
    <?php
    }
} else {
    echo "Winners are not announced.";
}
?>
</div>

</main>


<!-- Footer Starts-->
<?php include_once("includes/footer.php");?>
<!-- Footer Ends-->


</body>
</html>