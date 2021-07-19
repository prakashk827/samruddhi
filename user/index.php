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
          <form class="login-form" method="post" data-bvalidator-validate>
          <h3 class="login-head"></i>Login</h3>
          <p class="alert alert-primary" data-dismiss="alert">If you forgot password contact admin</p>
          <div class="form-group">
             <label class="control-label">Registered Mobile Number</label>
            <input class="form-control" type="text" name="mobile" id="mobile" data-bvalidator="required">
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" placeholder="Password" id="pwd" name="pwd">
          </div>
          <div class="form-group">
            <div class="utility">
                 <p class="semibold-text mb-2"><a href="register.php">Register Here</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block loginBtn"></i>Login</button>
            <br>
            <p id="warning" class="alert alert-danger"></p><br>
             <p id="wait" class="alert alert-warning">Please wait..!</p>
            
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
      $(document).ready(function(){
    $("#warning").css("display",'none');
    $("#wait").css('display','none');
    $(".loginBtn").click(function(e){
      e.preventDefault();
      var mobile = $("#mobile").val();
      var mobileRg='^[0-9]{10}$';
      var pwd = $("#pwd").val();
      if(mobile == ''){
        $("#warning").css("display",'block');
        $("#warning").html("Please enter mobile number..!");
      } else if(mobile.length !=10 || !mobile.match(mobileRg)){
        $("#warning").css("display",'block');
        $("#warning").html("Please enter 10 digit mobile number..!");
      }else if(pwd == '' ) {
        $("#warning").css("display",'block');
        $("#warning").html("Please password..!");
      } else {
        $("#wait").css('display','block');
        $.post("insert/loginAccount.php",
                      {
                        mobile : mobile,
                        pwd : pwd
                      },
                      function(data)
                      { $("#wait").css('display','none');
                        
                        if(data == 200){
                          $("#warning").css("display",'none');
                          window.location.href='edit-profile.php';
                        }else if(data == 400 ){
                          $("#warning").css("display",'block');
                          $("#warning").html("Please Enter Valid User Name and Password..!");
                        } 
                        
                        
                      }
            );
      }
        
        
    });
    

  });
    </script>
    
    
    
    
  </body>
</html>