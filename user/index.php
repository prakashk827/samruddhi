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
    <title>Login </title>

   

  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="login-box">

        <form class="login-form" method="post" action="insert/loginAccount.php" data-bvalidator-validate>
          <h3 class="login-head"></i>Login</h3>
          <div class="form-group">
            <label class="control-label">Registered Mobile Number</label>
            <input class="form-control" type="text" name="mobile" data-bvalidator="required">
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="pwd">
          </div>
          <div class="form-group">
            <div class="utility">
                 <p class="semibold-text mb-2"><a href="register.php">Register Here</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block loginBtn"></i>Login</button>
          </div><br>
				<!-- <p id="warning" class="alert alert-danger"></p>
				<p id="wait" class="alert alert-warning">Please wait..!</p> -->
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
    
    
    
    
    
    
  </body>
</html>