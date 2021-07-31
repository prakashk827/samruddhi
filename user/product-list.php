<title>Product List </title>

<?php
session_start();
if(! isset($_SESSION["clientUId"])) {
  header("Location:index.php");
}
?>

<?php
  include_once("../db/db.php");
  $clientUId = $_SESSION["clientUId"];
  $coupounIdForModal = $_POST['coupounIdForModal'];
  

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
          <h1><i class="fa fa-list"></i> Product List</h1>

        
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
              <div class="tile-footer"><a data-productId="<?php echo $data['id'] ?>" data-toggle="modal" data-target="#myModal" class="buyNowBtn btn btn-primary" >Buy Now</a></div>
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
      
    </script>


<?php include_once('productModal.php');?>

    
  </body>
</html>