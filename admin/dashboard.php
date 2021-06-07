
<?php
include_once ("../db/db.php");
session_start();
if ($_SESSION["clientUId"] == '') {
    header("Location:../index.php");
}
?>
<title>Dashboard</title>
<?php include_once ("includes/head.php");?>


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
			<i class="fa fa-dashboard"></i> Dashboard
		</h1>
		<p></p>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-6 col-lg-3">
		<div class="widget-small primary coloured-icon">
			<i class="icon fa fa-users fa-3x"></i>
			<div class="info">
				<h4>Active Clients</h4>
              <?php
            $sel = "SELECT COUNT(id) as totalClients from client_profile";
            $exe = mysqli_query($conn, $sel);
            $totalClients = mysqli_fetch_assoc($exe);
            
            ?>
              <p>
					<b><?php echo $totalClients['totalClients']; ?></b>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="widget-small info coloured-icon">
			<i class="icon fa fa-tags fa-3x"></i>
			<div class="info">
				<h4>Total Coupons</h4>
              <?php
            $sel = "SELECT SUM(totalCoupons) as totalCoupons from coupons";
            $exe = mysqli_query($conn, $sel);
            $totalCoupons = mysqli_fetch_assoc($exe);
            
            ?>
              <p>
					<b><?php echo $totalCoupons['totalCoupons']; ?></b>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="widget-small warning coloured-icon">
			<i class="icon fa fa-tags fa-3x"></i>
			<div class="info">
				<h4>Sold Coupons</h4>
              <?php
            $sel = "SELECT SUM(boughtQty) as boughtQty from coupons_sold WHERE paymentStatus= 'complete'";
            $exe = mysqli_query($conn, $sel);
            $soldCoupons = mysqli_fetch_assoc($exe);
            
            ?>
              <p>
					<b><?php echo $soldCoupons['boughtQty']; ?></b>
				</p>
			</div>
		</div>
	</div>

	<div class="col-md-6 col-lg-3">
		<div class="widget-small danger coloured-icon">
			<i class="icon fa fa-money fa-3x"></i>
			<div class="info">
				<h4>Target Profit</h4>
              <?php
            $sel = "SELECT SUM(totalCoupons * couponPrice) as targetProfit from coupons";
            $exe = mysqli_query($conn, $sel);
            $targetProfit = mysqli_fetch_assoc($exe);
            
            ?>
              <p>
					<b><?php echo "Rs ".$targetProfit['targetProfit']." /-"; ?></b>
				</p>
			</div>
		</div>
	</div>

	<div class="col-md-6 col-lg-3">
		<div class="widget-small primary coloured-icon">
			<i class="icon fa fa-money fa-3x"></i>
			<div class="info">
				<h4>Reached Profit</h4>
              <?php
            $sel = "SELECT SUM(paidAmt) as paidAmt from coupons_sold WHERE paymentStatus= 'complete'";
            $exe = mysqli_query($conn, $sel);
            $earnings = mysqli_fetch_assoc($exe);
            
            ?>
              <p>
					<b><?php echo "Rs ".$earnings['paidAmt']." /-"; ?></b>
				</p>
			</div>
		</div>
	</div>
	
	<div class="col-md-6 col-lg-3">
		<div class="widget-small danger	 coloured-icon">
			<i class="icon fa fa-trophy fa-3x"></i>
			<div class="info">
				<h4>Total Winners</h4>
              <?php
            $sel = "SELECT COUNT(id) as winner from winner_coupons WHERE published= 'yes'";
            $exe = mysqli_query($conn, $sel);
            $winnerCount = mysqli_fetch_assoc($exe);
            
            ?>
              <p>
					<b><?php echo $winnerCount['winner']; ?></b>
				</p>
			</div>
		</div>
	</div>
	
	

</div>
<div class="row">
	<div class="col-md-6">
		<div class="tile">
			<h3 class="tile-title">Total Coupons v/s Sold Coupons</h3>
			<div class="embed-responsive embed-responsive-16by9">
				<canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="tile">
			<h3 class="tile-title">Targeted Profit v/s Reached Profit</h3>
			<div class="embed-responsive embed-responsive-16by9">
				<canvas class="embed-responsive-item" id="earnings"></canvas>
			</div>
		</div>
	</div>
</div>
</main>

<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="js/plugins/chart.js"></script>
<script type="text/javascript">
      
      var pdata = [
      	{
      		value: <?php echo $totalCoupons['totalCoupons']; ?>,
      				color: "#46BFBD",
      	      		highlight: "#5AD3D1",
      		label: "Total Coupons"
      	},
      	{
      		value: <?php echo $soldCoupons['boughtQty']; ?>,
      				color:"#F7464A",
      	      		highlight: "#FF5A5E",
      		label: "Sold Coupons"
      	}
      ]


      var edata = [
      	{
      		value: <?php echo $targetProfit['targetProfit'] ?>,
      				color: "#46BFBD",
      	      		highlight: "#5AD3D1",
      		label: "Target Profit ( Rs )"
      	},
      	{
      		value: <?php echo $earnings['paidAmt']; ?>,
  					color:"#F7464A",
      	      		highlight: "#FF5A5E",
      		label: "Reached Profit ( Rs )"
      	}
      ]

	
      
      /* var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data); */
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);

      var ctxp = $("#earnings").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(edata);
    </script>
<!-- Google analytics script-->
<script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
</body>
</html>