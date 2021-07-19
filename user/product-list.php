<title>Edit Profile</title>

<?php
session_start();
if(! isset($_SESSION["clientUId"])) {
  header("Location:index.php");
}
?>

<?php
  include_once("../db/db.php");
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
          <h1><i class="fa fa-user"></i> Edit Profile</h1>

        
<!--           <p>Start a beautiful journey here</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        </ul>
      </div>



<?php
      $query = "SELECT * FROM `product_list` ORDER BY id DESC";
      $exe = mysqli_query($conn, $query);
      if (mysqli_num_rows($exe) > 0) {
       ?>
      <div class="row">
     <?php 
      while ($data = mysqli_fetch_assoc($exe)) {
      ?>
          <div class="col-md-4">
            <div class="tile">
              <img class="img-fluid" src="https://rukminim1.flixcart.com/image/495/594/kklhbbk0/t-shirt/n/b/o/l-raw-327-mustard-rawhit-original-imafzwzzwx6yybaq.jpeg?q=50">
              <div class="tile-body">
                t-Shirt <br>
                Rs 4500 /-
              </div>
              <div class="tile-footer"><a class="btn btn-primary" href="#">Buy Now</a></div>
            </div>
          </div>  
                   
          <!-- <td><?php echo $data['id'] ?></td> -->
               
      <?php
          }
          ?>
      <?php
      } else {
          echo "No Products Found";
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