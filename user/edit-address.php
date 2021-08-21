<?php
session_start();
if($_SESSION["clientUId"] == '') {
  header("Location:index.php");
}


  include_once("../db/db.php");
  $clientUId = $_SESSION["clientUId"];

  $query="SELECT * FROM `client_profile` WHERE clientUId='$clientUId' LIMIT 1";
  $exe=mysqli_query($conn,$query);

   if(mysqli_num_rows($exe)>0)
      {

         $data=mysqli_fetch_assoc($exe);


         $image = $data['image'];
         $_SESSION['clientProfile'] = $data['image'];
      }


   $query="SELECT * FROM `client_address` WHERE clientUId='$clientUId' LIMIT 1";
   $exe=mysqli_query($conn,$query);

   if(mysqli_num_rows($exe)>0)
      {
        
         $data=mysqli_fetch_assoc($exe);
         $houseNo = $data['houseNo'];
         $street = $data['street'];
         $area = $data['area'];
         $country = $data['country'];
         $state = $data['state'];
         $city = $data['city'];
         $pincode = $data['pincode'];
         
          
      }else{
        echo "No Records found";
      }




?>
<title>Edit Address</title>
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
          <h1><i class="fa fa-address-book"></i> Edit Address</h1>
<!--           <p>Start a beautiful journey here</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
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
             <p><blink style="color:red">Note:</blink> This address is used to ship your gift, so please provide valid address.</p>
            <div class="tile-body">
              <form  class="row" method="post" data-bvalidator-validate action="profile/update-address.php">
               
                
                <input type="hidden" name="clientUId" value="<?php echo $_SESSION["clientUId"] ?>">

                <div class="form-group col-md-4">
                  <label class="control-label">House/Flat Number <span style="color:red">*</span></label></label>
                <input class="form-control" type="text"   id="houseNo" name="houseNo" data-bvalidator="required" value="<?php echo $houseNo ?>">
                </div>

                

                <div class="form-group col-md-4">
                  <label class="control-label">Street Name <span style="color:red">*</span></label> </label>
                  <input class="form-control" type="text"   id="street" name="street" data-bvalidator="required" value="<?php echo $street ?>">
                </div>

                <div class="form-group col-md-4">
                  <label class="control-label">Area Name<span style="color:red">*</span></label></label>
                <input class="form-control" type="text"   id="area" name="area" data-bvalidator="required" value="<?php echo $area ?>" >
                </div>

                <div class="form-group col-md-4">
                  <label class="control-label">Country<span style="color:red">*</span></label></label>
                <input class="form-control" type="text"   id="country" value="India" name="country" data-bvalidator="required" value="<?php echo $country ?>">
                </div>

                <div class="form-group col-md-4">
                  <label class="control-label">State<span style="color:red">*</span></label></label>
                <input class="form-control" type="text"   id="state" value="Karnataka" name="state" data-bvalidator="required" value="<?php echo $state ?>">
                </div>

                <div class="form-group col-md-4">
                  <label class="control-label">City<span style="color:red">*</span></label></label>
                <input class="form-control" type="text"   id="city"  name="city" data-bvalidator="required" value="<?php echo $city ?>">
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">Pincode<span style="color:red">*</span></label></label>
                <input class="form-control" type="text"   id="pincode"  name="pincode" data-bvalidator="number,required" value="<?php echo $pincode ?>">
                </div>

                <div class="form-group col-md-4 align-self-end">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-refresh"></i>Update</button>
                </div>

                <div class="col-md-12"> <center id="warning"></center></div>

               
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