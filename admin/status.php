<?php
session_start();
if($_SESSION["clientUId"] == '') {
  header("Location:index.php");
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
      <div class="page-error tile">
        <center>
          <h2 style="color: <?php echo  $_SESSION["msgClr"] ;?>"><i class="fa fa-exclamation-circle"></i><?php echo $_SESSION["message"]?></h2>
           <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
        </center>
        
        <!-- <p>The page you have requested is not found.</p> -->
       
      </div>
    </main>


    <!-- Footer Starts-->
     <?php include_once("includes/footer.php");?>
    <!-- Footer Ends-->

    
  </body>
</html>