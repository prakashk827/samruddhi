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
    
     <?php 
      while ($data = mysqli_fetch_assoc($exe)) {
      ?>
          <div class="row tile">
            <div class="col-md-5 img-fluid">
            <img style='height: 100%; width: 100%; object-fit: contain' src="../images/product-images/<?php echo $data['photo'];?>">
            </div>
            <div class="col-md-7">
              <h2><?php echo $data['name']?></h2><br>
              <h2>
                 <span style="color:red">
                  <?php echo "Rs ".$data['ourPrice']?>
                </span>
                      <span style="color:#D9D9D9">
                      <del>  <?php echo "Rs".$data['mrpPrice']?> </del>
                     
                    </span>
              </h2>
              <p style="color:#D9D9D9">Samrudhi Vastralaya Exclusive</p>
              <hr>
              <h5 style="color:#C70039">Size</h5>
              <?php $size = rtrim($data['sizeId'], ',')?>
              <h2>  <?php echo $size ; ?>  </h2>
              <h5 style="color:#FF5733">Fabrics</h5>
              <?php $fabric = rtrim($data['fabricId'], ',')?>
              <h2>  <?php echo $fabric ; ?>  </h2>
              <h5 style="color:#FFC300">Category</h5>
              <?php $category = rtrim($data['categoryId'], ',')?>
              <h2>  <?php echo $category ; ?>  </h2>
              <div class="tile-footer">
                  <a data-productId="<?php echo $data['id'] ?>" data-toggle="modal" data-target="#myModal" class="buyNowBtn btn btn-primary" >Buy Now</a>
              </div>
            </div>

           
            
              

   
          
         
                   
          <!-- <td><?php echo $data['id'] ?></td> -->
          </div>  
      <?php
          }
          ?>
      <?php
      } else {
          echo "No Products Found";
      }
      ?>
      


      
    </main>


    <!-- Footer Starts-->
     <?php include_once("includes/footer.php");?>
    <!-- Footer Ends-->
    <script type="text/javascript">
      
    </script>


<?php include_once('productModal.php');?>

    
  </body>
</html>