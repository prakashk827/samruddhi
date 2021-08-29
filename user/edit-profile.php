<title>Edit Profile</title>

<?php
session_start();
if(! isset($_SESSION["clientUId"])) {
  header("Location:index.php");
}
?>

<?php
  include_once("../db/db.php");
  $action = $_GET['action'];

  $clientUId = $_SESSION["clientUId"];
  $fName = '';
  $lName = '';
  $query="SELECT * FROM `client_profile` WHERE clientUId='$clientUId' LIMIT 1";
   $exe=mysqli_query($conn,$query);

   if(mysqli_num_rows($exe)>0)
      {

         $data=mysqli_fetch_assoc($exe);


         $image = $data['image'];
         $_SESSION['clientProfile'] = $data['image'];

         $fName = $data['firstName'];
         $_SESSION['clientName'] = $data['firstName'];
         $lName = $data['lastName'];

        
      }


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
          <h1><i class="fa fa-user"></i> Edit Profile</h1>


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
              <form  class="row" method="post" data-bvalidator-validate action="profile/save-profile.php" enctype="multipart/form-data">


                <input type="hidden" name="clientUId" value=" <?php echo $_SESSION["clientUId"] ;?>">

                <div class="form-group col-md-4">
                  <label class="control-label">First Name <span style="color:red">*</span></label></label>
                <input class="form-control" type="text" value="<?php echo $fName ?>"  id="fName" name="fName" data-bvalidator="required">
                </div>



                <div class="form-group col-md-4">
                  <label class="control-label">Last Name <span>(optional)</span></label> </label>
                  <input class="form-control" type="text" value="<?php echo $lName ?>"   id="lName" name="lName">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Upload Profile Image <span>(optional)</span></label> </label>
                  <input class="form-control" type="file" id="photo" name="photo">
                </div>

                <div class="form-group col-md-4 align-self-end">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-arrow-right"></i>Next</button>
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


  </body>
</html>