<?php
session_start();
if($_SESSION["clientUId"] == '') {
  header("Location:index.php");
}






?>
<title>Reset Password</title>
<?php include_once("includes/head.php");

  ?>
    <!-- Navbar starts-->
    <?php include_once("includes/navbar.php");?>
    <!-- Navbar Ends-->
    
    
    <!-- Sidebar menu starts-->
    <?php include_once("includes/sidebar.php");?>
     <!-- Sidebar menu ends-->
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-lock"></i> Reset Password</h1>
<!--           <p>Start a beautiful journey here</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          
          <div class="tile">
            <div class="tile-body">
              

                <div class="row">
       
        
        <div class="clearix"></div>
        <div class="col-md-12">
         
             <!-- <h3 class="tile-title">Address</h3>  -->
             
            <div class="tile-body">
              <form id="form" class="row" method="post" data-bvalidator-validate action="insert/reset-password.php">
               
                
                <input type="hidden" id ="clientUId" name="clientUId" value="<?php echo $_SESSION["clientUId"] ?>">

                <div class="form-group col-md-4">
                  <label class="control-label">New Password<span style="color:red">*</span></label></label>
                <input class="form-control" type="password"   id="pwd" name="pwd" data-bvalidator="required" >
                </div>
                <div class="col-md-8"></div>
                <div class="form-group col-md-4">
                  <label class="control-label">Retype Password<span style="color:red">*</span></label></label>
                <input class="form-control" type="password"   id="rpwd" name="rpwd" data-bvalidator="required" >
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-4">
                  <div class="bs-component warn">
              <div class="alert alert-dismissible alert-danger">
                <p id="warning">55</p>
              </div>
          </div>
          <div class="response">
               
            </div>

                </div>
                
                <div class="form-group col-md-12">
                  <button class="btn btn-primary reset" type="button"><i class="fa fa-refresh"></i>Reset</button>
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
     <?php include_once("includes/footer.php");?>
    <!-- Footer Ends-->
    <script type="text/javascript">
     $(document).ready(function(){
       $(".warn").css("display","none");
        $(".reset").click(function(){
            var pwd = $("#pwd").val();
            var rpwd = $("#rpwd").val();
            var clientUId =$("#clientUId").val();

            if(pwd == "") {
               $(".warn").css("display","block");
              $("#warning").html("Please enter New Password.");
            } else if(rpwd == "" ){
                 $(".warn").css("display","block");
               $("#warning").html("Please enter Retype password.");
            } else if(pwd != rpwd){
               $(".warn").css("display","block");
              $("#warning").html("Your New Password and Retype Password did not match.");
            }else{
              $.post("insert/reset-password.php",
                    {
                      pwd:pwd,
                      clientUId:clientUId
                      
                    },
                    function(data)
                    {
                       $(".response").css("display","block");
                       $(".response").html(data);
                      
                     
                      
                    });
              }

          

         
        });

     });

   </script>

   
  </body>
</html>