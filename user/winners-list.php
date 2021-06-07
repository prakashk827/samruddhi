<title>Winners List</title>

<?php
session_start();
if (!isset($_SESSION["clientUId"])) {
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


		<!--           <p>Start a beautiful journey here</p> -->
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	</ul>
</div>


<a href="show-all-coupons.php"><button class="btn btn-success">Try One's</button></a><br><br>
<div class="row">
	
	<?php
	$clientUId = $_SESSION["clientUId"];
$sel = "SELECT client_profile.clientUId,winner_coupons.date,winner_coupons.time,couponId,couponWorth,firstName,lastName,image,city FROM winner_coupons
 INNER JOIN client_profile ON client_profile.clientUId = winner_coupons.clientUId INNER JOIN client_address ON client_profile.clientUId = client_address.clientUId 
WHERE published='yes' ";
$exe = mysqli_query($conn, $sel);

if (mysqli_num_rows($exe) > 0) {
    
    while ($data = mysqli_fetch_assoc($exe)) {
        $couponId = $data['couponId'];
        $query = "SELECT couponName FROM coupons WHERE id = '$couponId'";
        $execute = mysqli_query($conn, $query);
        $coupons = mysqli_fetch_assoc($execute)
        
  ?>
        
        <div class="col-md-6">
		<div class="tile">
			<img width="80px"  src="<?php  echo $data['image']; ?>"><span></span><br>
			 <strong>Full Name : </strong> <?php  echo $data['firstName'].' '.$data['lastName'];  ?><br>
			 <strong> Published On <br> Date : </strong>   <?php  echo $data['date']; ?> <strong>&</strong> <span><strong>Time : </strong>  <?php  echo $data['time']; ?></span>
			<br><strong>Coupon Name : </strong>   <?php  echo $coupons['couponName']; ?><br>
			<strong> Coupon Worth  :</strong>  <?php  echo 'Rs ' .$data['couponWorth'] . ' /-'; ?><br>
			<strong>City :</strong>   <?php  echo $data['city'] == '' ? 'Not Provided' : $data['city'] ; ?><br>
			<?php if($data['clientUId'] == $clientUId ){
			    ?>
			  
			<button class="btn btn-success">Buy Cloth</button>
			<button class="btn btn-danger">Sale Back</button>    
			<?php } else {
			    ?>
			    
			   
			    <button style="visibility:hidden" class="btn btn-success">Buy Cloth</button>
			    <button style="visibility:hidden" class="btn btn-danger">Sale Back</button> 
		<?php	}?>
			
		</div>
	</div>
        
    <?php
    }
} else{
    echo "Winners are not announced.";
}
?>
	





</div>

</main>


<!-- Footer Starts-->
<?php include_once("includes/footer.php");?>
<!-- Footer Ends-->
<script type="text/javascript">
      
     /* $(document).ready(function(){
 //Add save class in submit form before use.
$(".save").click(function(){

  var name  = $("#name").val();
  var price = $("#price").val();
  var des = $("#description").val();
  var sDate = $("#startDate").val();
  var eDate = $("#endDate").val();


        $.post("insert/couponController.php",
          {
            name:name,
            price:price,
            des:des,
            sDate:sDate,
            eDate:eDate
          },
          function(data)
          {
            $("#warning").html(data);
           
            
          });
        
      });
            
    });

*/




    </script>

</body>
</html>