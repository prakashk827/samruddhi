<?php
include_once ('db/db.php');
?>
<!DOCTYPE html>
<html lang="en">


<!-- index-515:19-->
<head>
<!-- Basic Page Needs ================================================== -->
<meta charset="utf-8">

<!-- Mobile Specific Metas ================================================== -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, user-scalable=0">

<!-- Site Title -->
<title>Samruddhi</title>



<!-- CSS
         ================================================== -->
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- FontAwesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Animation -->
<link rel="stylesheet" href="css/animate.css">
<!-- magnific -->
<link rel="stylesheet" href="css/magnific-popup.css">
<!-- carousel -->
<link rel="stylesheet" href="css/owl.carousel.min.css">
<!-- isotop -->
<link rel="stylesheet" href="css/isotop.css">
<!-- ico fonts -->
<link rel="stylesheet" href="css/xsIcon.css">
<!-- Template styles-->
<link rel="stylesheet" href="css/style.css">
<!-- Responsive styles-->
<link rel="stylesheet" href="css/responsive.css">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

<!-- bValidator Starts -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="user/js/jquery.bvalidator.min.js"></script>
<script src="user/themes/gray4/gray4.js"></script>
<script src="user/themes/presenters/default.min.js"></script>
<link rel="stylesheet" href="user/themes/gray4/gray4.css" />
<!-- bValidator Ends -->

</head>

<body>
	<div class="body-inner">

		<!-- Header start -->
		<header id="header" class="header header-transparent">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
					<!-- logo-->
					<a class="navbar-brand" href="index-2.html"> <img
						src="images/logos/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav ml-auto">
							<li class="dropdown nav-item active"><a href="#" class=""
								data-toggle="dropdown">Home <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="index-2.html">Home One</a></li>
									<li><a href="index-3.html">Home Two</a></li>
									<li><a href="index-4.html">Home Three</a></li>
									<li><a href="index-5.html">Home Four</a></li>
									<li><a href="index-6.html">Home Five</a></li>
								</ul></li>
							<li class="dropdown nav-item"><a href="#" class=""
								data-toggle="dropdown">About <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="about-us.html">About Us</a></li>
									<li><a href="gallery.html">Gallery</a></li>
									<li><a href="faq.html">FAQ</a></li>
									<li><a href="pricing.html">Pricing Table</a></li>
									<li><a href="sponsors-1.html">Sponsors</a></li>
									<li><a href="venue.html">Venue</a></li>
									<li><a href="404.html">Erro Page</a></li>
								</ul></li>
							<li class="nav-item dropdown"><a href="#" class=""
								data-toggle="dropdown">Speakers <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="speakers-1.html">Speakers-1</a></li>
									<li><a href="speakers-2.html">Speakers-2</a></li>
								</ul></li>
							<li class="nav-item dropdown"><a href="#" class=""
								data-toggle="dropdown">Schedule <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="schedule-list.html">Schedule List</a></li>
									<li><a href="schedule-tab-1.html">Schedule Tab 1</a></li>
									<li><a href="schedule-tab-2.html">Schedule Tab 2</a></li>
								</ul></li>
							<li class="nav-item dropdown"><a href="#"> Blog <i
									class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="blog.html">Blog</a></li>
									<li><a href="news-single.html">Blog Details</a></li>
								</ul></li>
							<li class="nav-item"><a href="contact.html">Contact</a></li>
							<li class="header-ticket nav-item"><a class="ticket-btn btn"
								href="pricing.html"> Buy Ticket </a></li>
						</ul>
					</div>
				</nav>
			</div>
			<!-- container end-->
		</header>
		<!--/ Header end -->

		<!-- banner start-->
		<section class="hero-area hero-speakers">
			<div class="banner-item overlay"
				style="background-image: url(images/background.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="banner-content-wrap">

								<p class="banner-info wow fadeInUp" data-wow-duration="1.5s"
									data-wow-delay="500ms">Buy Rs.10 coupon and win up to Rs.1000
									Cloths or Gift</p>
								<h1 class="banner-title wow fadeInUp" data-wow-duration="1.5s"
									data-wow-delay="700ms">SAMRUDDHI VASTHRALAYA LUCKY DRAW</h1>


								<div class="banner-btn wow fadeInUp" data-wow-duration="1.5s"
									data-wow-delay="800ms">
									<a href="user" class="btn">Login </a> <a href="#"
										class="btn fill">Shipping</a>
								</div>

							</div>
							<!-- Banner content wrap end -->
						</div>
						<!-- col end-->
						<div class="col-lg-4 offset-lg-1">
							<div class="hero-form-content">
								<h2>Register Now</h2>
								<p>
									<!--  Coming Soon -->
								</p>
								<form action="insert/createClientAccount.php" method="POST" class="hero-form"
									data-bvalidator-validate>
									<input class="form-control form-control-name"
										placeholder="First Name" name="fName" id="fname" type="text"
										data-bvalidator="required"> <input
										class="form-control form-control-phone"
										placeholder="Last Name" name="lName" id="f-phone" type="text" data-bvalidator="required">
									<input class="form-control form-control"
										placeholder="Mobile Number" name="mobile" id="mobile"
										type="text" data-bvalidator="required" maxlength="10"> 
										<input class="form-control form-control"
										placeholder="Password" name="pwd" id="pwd"
										type="password" data-bvalidator="required"> 
										<select name="agree"
										id="agree" data-bvalidator="required">
										<option value="">Please Select</option>
										<option value="ticket">I agreed to T&C</option>

									</select>

									<button class="btn" type="submit">Register Now</button>

								</form>
								<!-- form end-->
							</div>
							<!-- hero content end-->
						</div>
						<!-- col end-->
					</div>
					<!-- row end-->
				</div>
				<!-- Container end -->
			</div>
		</section>
		<!-- banner end-->

		<!-- ts intro start -->
		<section class="ts-event-outcome event-intro">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="">
							<div class="outcome-content ts-exp-content">
								<h2 class="column-title">
									<span>Event Outcomes</span> Learn new things and connect people
								</h2>
								<p>How you transform your business technology consumer, habits
									industry dynamic change the Find out from those leading</p>
								<a href="#" class="btn">Leanr More</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="outcome-content">
							<div class="outcome-img overlay">
								<img class="" src="images/about/learn_img.jpg" alt="">
							</div>
							<h3 class="img-title text-white">
								<a href="#" class="text-white">Learn Things</a>
							</h3>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="outcome-content">
							<div class="outcome-img overlay">
								<img class="" src="images/about/connect_img.jpg" alt="">
							</div>
							<h3 class="img-title">
								<a href="#" class="text-white">connect People</a>
							</h3>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- ts intro end-->
		<!-- ts funfact start-->
		<section class="ts-funfact"
			style="background-image: url(images/funfact_bg.jpg)">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="ts-single-funfact">
                  <?php
                $sel = "SELECT COUNT(id) as totalClients from client_profile";
                $exe = mysqli_query($conn, $sel);
                $totalClients = mysqli_fetch_assoc($exe);
                
                ?>
                     <h3 class="funfact-num">
								<span class="counterUp"
									data-counter="<?php echo $totalClients['totalClients']; ?>"><?php echo $totalClients['totalClients']; ?>
							
							
							
							</h3>
							<h4 class="funfact-title">Active Clients</h4>
						</div>
					</div>
					<!-- col end-->
					<div class="col-lg-3 col-md-6">
						<div class="ts-single-funfact">
                  <?php
                $sel = "SELECT SUM(totalCoupons) as totalCoupons from coupons";
                $exe = mysqli_query($conn, $sel);
                $totalCoupons = mysqli_fetch_assoc($exe);
                
                ?>
                     <h3 class="funfact-num">
								<span class="counterUp"
									data-counter="<?php echo $totalCoupons['totalCoupons']; ?>"><?php echo $totalCoupons['totalCoupons']; ?></span>
							</h3>
							<h4 class="funfact-title">Total Coupons</h4>
						</div>
					</div>
					<!-- col end-->
					<div class="col-lg-3 col-md-6">
						<div class="ts-single-funfact">
                   <?php
                $sel = "SELECT SUM(boughtQty) as boughtQty from coupons_sold";
                $exe = mysqli_query($conn, $sel);
                $soldCoupons = mysqli_fetch_assoc($exe);
                
                ?>
                     <h3 class="funfact-num">
								<span class="counterUp"
									data-counter="<?php echo $soldCoupons['boughtQty']; ?>"><?php echo $soldCoupons['boughtQty']; ?></span>
							</h3>
							<h4 class="funfact-title">Sold Coupons</h4>
						</div>
					</div>
					<!-- col end-->
					<?php
    $sel = "SELECT COUNT(id) as winners from winner_coupons";
    $exe = mysqli_query($conn, $sel);
    $winners = mysqli_fetch_assoc($exe);
    
    ?>
					<div class="col-lg-3 col-md-6">
						<div class="ts-single-funfact">
							<h3 class="funfact-num">
								<span class="counterUp"
									data-counter="<?php echo $winners['winners']; ?>"><?php echo $winners['winners']; ?></span>
							</h3>
							<h4 class="funfact-title">Total Winners</h4>
						</div>
					</div>
					<!-- col end-->
				</div>
				<!-- row end-->
			</div>
			<!-- container end-->
		</section>
		<!-- ts funfact end-->
		<!-- ts speaker start-->
		<section id="ts-speakers" class="ts-speakers"
			style="background-image: url(images/speakers/speaker_bg.png)">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 mx-auto">
						<h2 class="section-title text-center">
							<!-- <span>Listen to the</span> -->
							ಈ ದಿನದ ಅದ್ರುಷ್ಠವಂತರು <br> Today's Lucky Draw Winners
						</h2>
					</div>
					<!-- col end-->
				</div>
				<!-- row end-->
				<div class="row">
					<?php
    $sel = "SELECT firstName,lastName,image,city FROM client_profile INNER JOIN winner_coupons ON client_profile.clientUId = winner_coupons.clientUId 
INNER JOIN client_address ON client_profile.clientUId = client_address.clientUId  ";
    $exe = mysqli_query($conn, $sel);
    while ($winner = mysqli_fetch_assoc($exe)) {
        ?>
					<div class="col-lg-3 col-md-6 wow fadeInUp"
						data-wow-duration="1.5s" data-wow-delay="400ms">
						<div class="ts-speaker">
							<div class="speaker-img">
								<img class="img-fluid"
									title="Icon will displayed in case user not provide his image"
									src="<?php echo 'user/'.$winner['image']?>"
									alt="Lucky draw winner">
							</div>
							<div class="ts-speaker-info">
								<h3 class="ts-title">
									<a><?php echo $winner['firstName'].' '.$winner['lastName']?></a>
								</h3>
								<p>
									<span style="color: red;">City : </span><?php echo  $winner['city']  == '' ? 'Not Provided' : $winner['city'] ;?></p>
							</div>
						</div>
					</div>    
	<?php
    }
    
    ?>
					

					<!-- col end-->
				</div>
				<!-- row end-->
			</div>
			<!-- popup end-->
	
	</div>
	<!-- col end-->

	<!-- col end-->

	<!-- col end-->
	</div>
	<!-- row end-->
	</div>
	<!-- popup end-->
	</div>
	<!-- col end-->

	<!-- col end-->


	<!-- col end-->
	</div>
	<!-- row end-->
	</div>
	<!-- container end-->

	<!-- shap img-->
	<div class="speaker-shap">
		<img class="shap1" src="images/shap/home_speaker_memphis1.png" alt="">
		<img class="shap2" src="images/shap/home_speaker_memphis2.png" alt="">
		<img class="shap3" src="images/shap/home_speaker_memphis3.png" alt="">
	</div>
	<!-- shap img end-->
	</section>
	<!-- ts speaker end-->

	<!-- ts experience start-->
	<section id="ts-experiences" class="ts-experiences">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 no-padding">
					<div class="exp-img"
						style="background-image: url(images/cta_img.jpg)">
						<!-- <img class="img-fluid" src="images/cta_img.jpg" alt=""> -->
					</div>
				</div>
				<!-- col end-->
				<div class="col-lg-6 no-padding align-self-center wow fadeInUp"
					data-wow-duration="1.5s" data-wow-delay="500ms">
					<div class="ts-exp-wrap">
						<div class="ts-exp-content">
							<h2 class="column-title">
								<span>Get Experience</span> Shift your perspective on digital
								business
							</h2>
							<p>How you transform your business as technology, consumer,
								habits industry dynamic s change? Find out from those leading
								the charge.</p>
						</div>
					</div>

				</div>
				<!-- col end-->
			</div>
			<!-- row end-->
		</div>
		<!-- container fluid end-->
	</section>
	<!-- ts experience end-->

	<!-- ts experience start-->
	<section class="ts-schedule">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<h2 class="section-title">
						<span>Schedule Details</span> Event Schedules
					</h2>
					<div class="ts-schedule-nav">
						<ul class="nav nav-tabs justify-content-center" role="tablist">
							<li class="nav-item"><a class="active" title="Click Me"
								href="#date1" role="tab" data-toggle="tab">
									<h3>5th June</h3> <span>Friday</span>
							</a></li>
							<li class="nav-item"><a class="" href="#date2" title="Click Me"
								role="tab" data-toggle="tab">
									<h3>6th June</h3> <span>Saturday</span>
							</a></li>
							<li class="nav-item"><a class="" href="#date3" title="Click Me"
								role="tab" data-toggle="tab">
									<h3>7th June</h3> <span>Sunday</span>
							</a></li>
						</ul>
						<!-- Tab panes -->
					</div>
				</div>
				<!-- col end-->

			</div>
			<!-- row end-->
			<div class="row">
				<div class="col-lg-12">
					<div class="tab-content schedule-tabs schedule-tabs-item">
						<div role="tabpanel" class="tab-pane active" id="date1">
							<div class="row">
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-left">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker1.jpg" alt=""> <span
											class="schedule-slot-time">10.30 - 11.30 AM</span>
										<h3 class="schedule-slot-title">Marketing Matters</h3>
										<h4 class="schedule-slot-name">@ Henrikon Rebecca</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-right">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker2.jpg" alt=""> <span
											class="schedule-slot-time">11.30 - 12.30 PM</span>
										<h3 class="schedule-slot-title">Reinventing Experiences</h3>
										<h4 class="schedule-slot-name">@ Johnsson Agaton</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-left">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker3.jpg" alt=""> <span
											class="schedule-slot-time">12.30 - 01.30 PM</span>
										<h3 class="schedule-slot-title">Cultures of Creativity</h3>
										<h4 class="schedule-slot-name">@ Lundryn Melisa</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-right">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker4.jpg" alt=""> <span
											class="schedule-slot-time">01.30 - 02.30 PM</span>
										<h3 class="schedule-slot-title">Human Centered Design</h3>
										<h4 class="schedule-slot-name">@ Fredric Martinsson</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
							</div>
							<!-- row end-->
							<div class="schedule-listing-btn">
								<a href="#" class="btn">More Details</a>
							</div>
						</div>
						<!-- tab pane end-->

						<div role="tabpanel" class="tab-pane" id="date2">
							<div class="row">
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-left">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker5.jpg" alt=""> <span
											class="schedule-slot-time">02.30 - 03.30 PM</span>
										<h3 class="schedule-slot-title">Marketing Matters</h3>
										<h4 class="schedule-slot-name">@ Rebecca Henrikon</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-right">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker6.jpg" alt=""> <span
											class="schedule-slot-time">03.30 - 04.30 PM</span>
										<h3 class="schedule-slot-title">Reinventing Experiences</h3>
										<h4 class="schedule-slot-name">@ Fredric Martinsson</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-left">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker7.jpg" alt=""> <span
											class="schedule-slot-time">04.30 - 05.30 PM</span>
										<h3 class="schedule-slot-title">Cultures of Creativity</h3>
										<h4 class="schedule-slot-name">@ Melisa Lundryn</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-right">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker8.jpg" alt=""> <span
											class="schedule-slot-time">05.30 - 06.30 PM</span>
										<h3 class="schedule-slot-title">Human Centered Design</h3>
										<h4 class="schedule-slot-name">@ Agaton Johnsson</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
							</div>
							<!-- row end-->
							<div class="schedule-listing-btn">
								<a href="#" class="btn">More Details</a>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="date3">
							<div class="row">
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-left">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker1.jpg" alt=""> <span
											class="schedule-slot-time">10.30 - 11.30 AM</span>
										<h3 class="schedule-slot-title">Marketing Matters</h3>
										<h4 class="schedule-slot-name">@ Rebecca Henrikon</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-right">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker2.jpg" alt=""> <span
											class="schedule-slot-time">11.30 - 12.30 PM</span>
										<h3 class="schedule-slot-title">Reinventing Experiences</h3>
										<h4 class="schedule-slot-name">@ Hall Building</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-left">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker3.jpg" alt=""> <span
											class="schedule-slot-time">01.30 - 02.30 PM</span>
										<h3 class="schedule-slot-title">Cultures of Creativity</h3>
										<h4 class="schedule-slot-name">@ Fredric Martinsson</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
								<div class="col-lg-6">
									<div class="schedule-listing-item schedule-right">
										<img class="schedule-slot-speakers"
											src="images/speakers/speaker4.jpg" alt=""> <span
											class="schedule-slot-time">03.30 - 04.30 PM</span>
										<h3 class="schedule-slot-title">Human Centered Design</h3>
										<h4 class="schedule-slot-name">@ Henrikon Rebecca</h4>
										<p>How you transform your business technolog consumer habits
											industry dynamics change Find out from those leading the
											charge How you</p>
									</div>
								</div>
								<!-- col end-->
							</div>
							<!-- row end-->
							<div class="schedule-listing-btn">
								<a href="#" class="btn">More Details</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- container end-->
	</section>
	<!-- ts experience end-->

	<!-- ts pricing start-->
	<section class="ts-pricing gradient"
		style="background-image: url(images/pricing/pricing_img.jpg)">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="section-title white">
						<span>Pricing Plans</span> Get your Ticket
					</h2>
				</div>
				<!-- section title end-->
			</div>
			<!-- col end-->
			<!-- row end-->
			<div class="row">
				<div class="col-lg-4 wow fadeInUp" data-wow-duration="1.5s"
					data-wow-delay="400ms">
					<div class="pricing-item">
						<img class="pricing-dot " src="images/pricing/dot.png" alt="">
						<div class="ts-pricing-box">

							<div class="ts-pricing-header">
								<h2 class="ts-pricing-name">Early Bird</h2>
								<h3 class="ts-pricing-price">
									<span class="currency">$</span>219
								</h3>
							</div>
							<div class="ts-pricing-progress">
								<p class="amount-progres-text">Available tickets for this price</p>
								<div class="ts-progress">
									<div class="ts-progress-inner" style="width: 100%"></div>
								</div>
								<p class="ts-pricing-value">500/500</p>
							</div>
							<div class="promotional-code">
								<p class="promo-code-text">Enter Promotional Code</p>
								<a href="#" class="btn pricing-btn">Buy Ticket</a>
								<p class="vate-text">All prices exclude 25% VAT</p>
							</div>
						</div>
						<!-- ts pricing box-->
						<img class="pricing-dot1 " src="images/pricing/dot.png" alt="">
					</div>
				</div>
				<!-- col end-->
				<div class="col-lg-4 wow fadeInUp" data-wow-duration="1.5s"
					data-wow-delay="500ms">
					<div class="pricing-item">
						<img class="pricing-dot " src="images/pricing/dot.png" alt="">
						<div class="ts-pricing-box">
							<span class="big-dot"></span>
							<div class="ts-pricing-header">
								<h2 class="ts-pricing-name">Regular</h2>
								<h3 class="ts-pricing-price">
									<span class="currency">$</span>399
								</h3>
							</div>
							<div class="ts-pricing-progress">
								<p class="amount-progres-text">Available tickets for this price</p>
								<div class="ts-progress">
									<div class="ts-progress-inner" style="width: 75%"></div>
								</div>
								<p class="ts-pricing-value">350/500</p>
							</div>
							<div class="promotional-code">
								<p class="promo-code-text">Enter Promotional Code</p>
								<a href="#" class="btn pricing-btn">Buy Ticket</a>
								<p class="vate-text">All prices exclude 25% VAT</p>
							</div>
						</div>
						<!-- ts pricing box-->
						<img class="pricing-dot1 " src="images/pricing/dot.png" alt="">
					</div>
				</div>
				<!-- col end-->
				<div class="col-lg-4 wow fadeInUp" data-wow-duration="1.5s"
					data-wow-delay="600ms">
					<div class="pricing-item">
						<img class="pricing-dot " src="images/pricing/dot.png" alt="">
						<div class="ts-pricing-box">
							<span class="big-dot"></span>
							<div class="ts-pricing-header">
								<h2 class="ts-pricing-name">Platinum</h2>
								<h3 class="ts-pricing-price">
									<span class="currency">$</span>699
								</h3>
							</div>
							<div class="ts-pricing-progress">
								<p class="amount-progres-text">Available tickets for this price</p>
								<div class="ts-progress">
									<div class="ts-progress-inner" style="width: 50%"></div>
								</div>
								<p class="ts-pricing-value">250/500</p>
							</div>
							<div class="promotional-code">
								<p class="promo-code-text">Enter Promotional Code</p>
								<a href="#" class="btn pricing-btn">Buy Ticket</a>
								<p class="vate-text">All prices exclude 25% VAT</p>
							</div>
						</div>
						<!-- ts pricing box-->
						<img class="pricing-dot1 " src="images/pricing/dot.png" alt="">
					</div>
				</div>
				<!-- col end-->
			</div>
		</div>
		<!-- container end-->
		<div class="speaker-shap wow fadeInUp" data-wow-duration="1.5s"
			data-wow-delay="400ms">
			<img class="shap2" src="images/shap/pricing_memphis1.png" alt="">
		</div>
	</section>
	<!-- ts pricing end-->
	<!-- ts blog start-->
	<section class="ts-blog section-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="section-title">
						<span>Info Update</span> Latest News
					</h2>
				</div>
				<!-- col end-->
			</div>
			<!-- row end-->
			<div class="row">
				<div class="col-lg-4 wow fadeInUp" data-wow-duration="1.5s"
					data-wow-delay="400ms">
					<div class="post">
						<div class="post-media post-image">
							<a href="#"><img src="images/blog/blog1.jpg" class="img-fluid"
								alt=""></a>
						</div>

						<div class="post-body">
							<div class="post-meta">
								<span class="post-author"> <a href="#">BY Admin</a>
								</span>

								<div class="post-meta-date">October 8, 2018</div>
							</div>
							<div class="entry-header">
								<h2 class="entry-title">
									<a href="#">Check upcoming Events</a>
								</h2>
							</div>
							<!-- header end -->

							<div class="entry-content">
								<p>How you transform your business asap technology, consumer,</p>
							</div>

							<div class="post-footer">
								<a href="news-single.html" class="btn-link">Read More <i
									class="icon icon-arrow-right"></i></a>
							</div>

						</div>
						<!-- post-body end -->
					</div>
					<!-- post end-->
				</div>
				<!-- col end-->
				<div class="col-lg-4 wow fadeInUp" data-wow-duration="1.5s"
					data-wow-delay="500ms">
					<div class="post">
						<div class="post-media post-image">
							<a href="#"><img src="images/blog/blog2.jpg" class="img-fluid"
								alt=""></a>
						</div>

						<div class="post-body">
							<div class="post-meta">
								<span class="post-author"> <a href="#">BY Admin</a>
								</span>

								<div class="post-meta-date">October 8, 2018</div>
							</div>
							<div class="entry-header">
								<h2 class="entry-title">
									<a href="#">Adding a New Digital</a>
								</h2>
							</div>
							<!-- header end -->

							<div class="entry-content">
								<p>How you transform your business asap technology, consumer,</p>
							</div>

							<div class="post-footer">
								<a href="news-single.html" class="btn-link">Read More <i
									class="icon icon-arrow-right"></i></a>
							</div>

						</div>
						<!-- post-body end -->
					</div>
					<!-- post end-->
				</div>
				<!-- col end-->
				<div class="col-lg-4 wow fadeInUp" data-wow-duration="1.5s"
					data-wow-delay="600ms">
					<div class="post">
						<div class="post-media post-image">
							<a href="#"><img src="images/blog/blog3.jpg" class="img-fluid"
								alt=""></a>
						</div>

						<div class="post-body">
							<div class="post-meta">
								<span class="post-author"> <a href="#">BY Admin</a>
								</span>

								<div class="post-meta-date">October 8, 2018</div>
							</div>
							<div class="entry-header">
								<h2 class="entry-title">
									<a href="#">West Elm At Evantor</a>
								</h2>
							</div>
							<!-- header end -->

							<div class="entry-content">
								<p>How you transform your business asap technology, consumer,</p>
							</div>

							<div class="post-footer">
								<a href="news-single.html" class="btn-link">Read More <i
									class="icon icon-arrow-right"></i></a>
							</div>

						</div>
						<!-- post-body end -->
					</div>
					<!-- post end-->
				</div>
				<!-- col end-->
			</div>
			<!-- row end-->
		</div>
		<!-- container end-->
		<!-- shap image-->
		<div class="speaker-shap">
			<img class="shap2" src="images/shap/news_memphis2.png" alt=""> <img
				class="shap1" src="images/shap/news_memphis1.png" alt="">
		</div>
	</section>
	<!-- ts blog end-->

	<!-- ts sponsors start-->
	<section class="ts-intro-sponsors"
		style="background-image: url(images/sponsors/sponsor_img.jpg)">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="section-title white">
						<span>Who helps us</span> Our Sponsors
					</h2>
					<!-- section title end-->
				</div>
				<!-- col end-->
			</div>
			<!-- row end-->
			<div class="row">
				<div class="col-lg-12">
					<div class="sponsors-logo text-center">
						<a href="#"><img src="images/sponsors/sponsor1.png" alt=""></a> <a
							href="#"><img src="images/sponsors/sponsor2.png" alt=""></a> <a
							href="#"><img src="images/sponsors/sponsor3.png" alt=""></a> <a
							href="#"><img src="images/sponsors/sponsor4.png" alt=""></a> <a
							href="#"><img src="images/sponsors/sponsor5.png" alt=""></a> <a
							href="#"><img src="images/sponsors/sponsor6.png" alt=""></a> <a
							href="#"><img src="images/sponsors/sponsor7.png" alt=""></a> <a
							href="#"><img src="images/sponsors/sponsor8.png" alt=""></a> <a
							href="#"><img src="images/sponsors/sponsor9.png" alt=""></a>
						<div class="sponsor-btn text-center">
							<a href="#" class="btn">Become a Sponsor</a>
						</div>
					</div>
					<!-- sponsors logo end-->
				</div>
				<!-- col end-->
			</div>
			<!-- row end-->
		</div>
		<!-- container end-->
	</section>
	<!-- ts sponsors end-->

	<!-- ts map direction start-->
	<section class="ts-map-direction wow fadeInUp" data-wow-duration="1.5s"
		data-wow-delay="400ms">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<h2 class="column-title">
						<span>Reach us</span> Get Direction to the Shop
					</h2>

					<div class="ts-map-tabs">
						<ul class="nav" role="tablist">
							<li class="nav-item"><a class="nav-link active" href="#profile"
								role="tab" data-toggle="tab">Address</a></li>
							
						</ul>

						<!-- Tab panes -->
						<div class="tab-content direction-tabs">
							<div role="tabpanel" class="tab-pane active" id="profile">
								<div class="direction-tabs-content">
									<h3>Samruddhi Vasthralaya</h3>
									<p class="derecttion-vanue">
										Amarapura Road,
										Jyothi Nagara <br>
										 Sira - 572137<br /> India- Karnataka
									</p>
									<div class="row">
										<div class="col-md-6">
											<div class="contact-info-box">
												<h3>Contact Info</h3>
												<p>
													<strong>Name:</strong> Nagabhushana N
												</p>
												<p>
													<strong>Phone:</strong> +91 8553621521
												</p>
												<p>
													<strong>Email: </strong> info@example.com
												</p>
											</div>

										</div>
										<div class="col-md-6">
											
										</div>
									</div>
									<!-- row end-->
								</div>
								<!-- direction tabs end-->
							</div>
							<!-- tab pane end-->
							<div role="tabpanel" class="tab-pane fade" id="buzz">
								<div class="direction-tabs-content">
									<h3>Brighton Waterfront Hotel, Brighton, London</h3>
									<p class="derecttion-vanue">
										1Hd- 50, 010 Avenue, NY 90001<br /> United States
									</p>
									<div class="row">
										<div class="col-md-6">
											<div class="contact-info-box">
												<h3>Tickets info</h3>
												<p>
													<strong>Name:</strong> Ronaldo KÃ¶nig
												</p>
												<p>
													<strong>Phone:</strong> 009-215-5595
												</p>
												<p>
													<strong>Email: </strong> info@example.com
												</p>
											</div>

										</div>
										<div class="col-md-6">
											
										</div>
									</div>
									<!-- row end-->
								</div>
								<!-- direction tabs end-->
							</div>
							<div role="tabpanel" class="tab-pane fade" id="references">
								<div class="direction-tabs-content">
									<h3>Brighton Waterfront Hotel, Brighton, London</h3>
									<p class="derecttion-vanue">
										1Hd- 50, 010 Avenue, NY 90001<br /> United States
									</p>
									<div class="row">
										<div class="col-md-6">
											<div class="contact-info-box">
												<h3>Tickets info</h3>
												<p>
													<strong>Name:</strong> Ronaldo KÃ¶nig
												</p>
												<p>
													<strong>Phone:</strong> 009-215-5595
												</p>
												<p>
													<strong>Email: </strong> info@example.com
												</p>
											</div>

										</div>
										<div class="col-md-6">
											<div class="contact-info-box">
												<h3>Programme Details</h3>
												<p>
													<strong>Name:</strong> Ronaldo KÃ¶nig
												</p>
												<p>
													<strong>Phone:</strong> 009-215-5595
												</p>
												<p>
													<strong>Email: </strong> info@example.com
												</p>
											</div>
										</div>
									</div>
									<!-- row end-->
								</div>
								<!-- direction tabs end-->
							</div>
						</div>

					</div>
					<!-- map tabs end-->

				</div>
				<!-- col end-->
				<div class="col-lg-6 offset-lg-1">
					<div class="ts-map">
						<div class="mapouter">
							<div class="gmap_canvas">
								<iframe
									src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9028133968723!2d-73.99208268505396!3d40.74216397932861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a4119ce269%3A0x9dec0c979b575972!2sEataly+NYC+Flatiron!5e0!3m2!1sen!2sbd!4v1541577288827"></iframe>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- col end-->
		</div>
		<!-- container end-->
		<div class="speaker-shap">
			<img class="shap1 wow fadeInLeft" data-wow-duration="1.5s"
				data-wow-delay="300ms" src="images/shap/Direction_memphis3.png"
				alt=""> <img class="shap2 wow fadeInRight" data-wow-duration="1.5s"
				data-wow-delay="400ms" src="images/shap/Direction_memphis2.png"
				alt=""> <img class="shap3 wow fadeInLeft" data-wow-duration="1.5s"
				data-wow-delay="500ms" src="images/shap/Direction_memphis4.png"
				alt=""> <img class="shap4 wow fadeInUp" data-wow-duration="1.5s"
				data-wow-delay="600ms" src="images/shap/Direction_memphis1.png"
				alt="">
		</div>
	</section>
	<!-- ts map direction end-->

	<!-- ts footer area start-->
	<?php include_once ('public/footer.php');?>
	<!-- ts footer area end-->




	
	<!-- Body inner end -->
</body>


<!-- index-515:53-->
</html>