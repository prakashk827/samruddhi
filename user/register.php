<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Create Account </title>
  
<!-- bValidator Starts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/jquery.bvalidator.min.js"></script>
	<script src="themes/gray4/gray4.js"></script>
	<script src="themes/presenters/default.min.js"></script>
	<link rel="stylesheet" href="themes/gray4/gray4.css" />
	<!-- bValidator Ends -->

</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="">
      <h2 style="color:white;">
      <!-- <p>
      SAMRUDDHI  VASTHRALAYA
      </p> -->
        <center> <br>
        <h1 >Register Now</h1>
      </center>
      </h2>
    </div>
    <div class="login-box">

      

      <form class="login-form" action="insert/createClientAccount.php" method="POST" class="hero-form" data-bvalidator-validate>
      
        <div class="form-group">
          <label class="control-label">Full Name</label>
          <input class="form-control " placeholder="Full Name" name="fName" id="fname" type="text" data-bvalidator="required">
        </div>
        <input class="form-control form-control-phone" placeholder="Last Name" name="lName" id="f-phone" type="hidden" value="">

        <div class="form-group">
          <label class="control-label">Mobile Number</label>
          <input class="form-control form-control" placeholder="Mobile Number" name="mobile" id="mobile" type="text" data-bvalidator="required" maxlength="10">
        </div>
        <div class="form-group">
          <label class="control-label">Password</label>
          <input class="form-control form-control" placeholder="Password" name="pwd" id="pwd" type="password" data-bvalidator="required">
        </div>

        <div class="form-group">
          <label class="control-label">City</label>
          <input class="form-control form-control" placeholder="Place" name="city" id="city" type="text" data-bvalidator="required">
        </div>



        <div class="form-group">
          <select class="form-control" name="agree" id="agree" data-bvalidator="required">
            <option value="">Please Select</option>
            <option value="ticket">I agreed to T&C</option>

          </select>
        </div>



        <div class="form-group">
          <div class="utility">
            <p class="semibold-text mb-2"><a href="login.php">Login Here</a></p>
          </div>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block btn"></i>Register</button>
        </div>
      </form>

    </div>
  </section>
  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
      $('.login-box').toggleClass('flipped');
      return false;
    });
  </script>
</body>

</html>