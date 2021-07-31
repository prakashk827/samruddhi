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

<?php
$prodcutId =$_POST['productId'];
$coupounIdForModal = $_POST['coupounIdForModal'];

$query = "SELECT * FROM `product_list` WHERE id='$prodcutId'";
$exe = mysqli_query($conn, $query);
if (mysqli_num_rows($exe) > 0) {
    $data = mysqli_fetch_assoc($exe);
    $name = $data['name'];
    $productPrice = $data['ourPrice'];
 
}
//Getting coupin worth
$query = "SELECT couponWorth FROM `coupons` WHERE id='$coupounIdForModal'";
$exe = mysqli_query($conn, $query);
if (mysqli_num_rows($exe) > 0) {
    $data = mysqli_fetch_assoc($exe);
    $_SESSION['discount'] = $data['couponWorth'];
 
    
 
}
?>

<div class="col-md-12">
                  <div class="form-group">
                        <p>Product Name: <?php echo $name?> </p>
                       
                  </div>
                  <div class="form-group">
                        <label for="">Qty</label>
                        <input class="form-control" maxlength="2" value="1" type="text" name="qtyModal" id="qtyModal">
                  </div>
                  <div class="form-group">
                        <label for="">Total Price</label>
                        <input disabled class="form-control" type="text" name="totalPriceModal" id="totalPriceModal">
                  </div>

                  <div class="form-group">
                        <label for="">Discount</label>
                        <input disabled class="form-control" value="<?php echo $_SESSION['discount']  ?>" type="text" name="discountModal" id="discountModal">
                  </div>

                  <div class="form-group">
                        <label for="">Price After Discount</label>
                        <input  disabled class="form-control" type="text" name="afterDiscountModal" id="afterDiscountModal">
                  </div>

                  </div>
                
                   
</div>

<script>
    function calculate(){
        var discount = $("#discountModal").val();
         var qty = $("#qtyModal").val();
         var ourPrice = "<?php echo  $productPrice; ?>";
        var totalPrice = (qty*ourPrice);
        var priceAfterDiscount = totalPrice - discount;
        if (priceAfterDiscount <= 0) {
            priceAfterDiscount = 0 ;
        }
         $("#totalPriceModal").val(totalPrice);
         $("#afterDiscountModal").val(priceAfterDiscount );
    }
      $(document).ready(function(){
         
         calculate();
         $("#qtyModal").keyup(function(){
            
            calculate();
         });
         
      });
</script>