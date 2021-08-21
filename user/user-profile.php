<title>My Profile</title>
<style>

    .borderless td, .borderless th {
        border: none !important;
    }
</style>
<?php
session_start();
if(! isset($_SESSION["clientUId"])) {
  header("Location:index.php");
}
?>

<?php
  include_once("../db/db.php");
  $clientUId = $_SESSION["clientUId"];

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
          <h1><i class="fa fa-user"></i> My Profile</h1>


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

            <div class="tile-body" style="border:2px solid #009688;">
              <center>
              <table   class="table borderless">
                <head>
                <tr>
                    <th><h2>Profile</h2></th>
                </tr>
                <tr>
                  <th><img class="img-fluid" width="150px" src="<?php echo 'images/clientProfile/'.$image ?>" alt=""></th>
                </tr>
                  <tr>
                    <th>Full Name</th>
                    <td><?php echo $fName . " ".$lName?></td>
                  </tr>

                  <tr>
                    <th>Mobile Number</th>
                    <td><?php echo $clientUId?></td>
                  </tr>
                  <tr>
                  <th>
<!--                    <a href="edit-profile.php?action=edit"><button class="btn btn-primary">Edit my profile</button></a>-->
                      <a href="show-all-coupons.php"><button class="btn btn-danger">Buy Coupon</button></a>
                      <a href="winners-list.php"><button class="btn btn-warning">Show Winners</button></a>
                  </th>

                  </tr>

                </head>
              </table>
              </center>


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