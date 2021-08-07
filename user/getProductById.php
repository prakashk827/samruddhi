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
	
	$fabric = rtrim( $data['fabricId'], ',');
	$fabricArr =  (explode(",",$fabric));
	
	$category =  rtrim($data['categoryId'], ',');
	$categoryArr =  (explode(",",$category));
	
	$size =  rtrim($data['sizeId'], ',');
	$sizeArr = (explode(",",$size));

	
 
}
//Getting coupin worth
$query = "SELECT couponWorth FROM `coupons` WHERE id='$coupounIdForModal'";
$exe = mysqli_query($conn, $query);
if (mysqli_num_rows($exe) > 0) {
    $data = mysqli_fetch_assoc($exe);
   echo  $_SESSION['discount'] = $data['couponWorth'];
 
    
 
}
?>
			<div class="col-md-12">
				<form method="POST" action="insert/buyCloth.php">
					<div class="form-group">
						<p style="color:red">
							<?php echo $name?>
						</p>
					</div>
                    <input type="hidden" name="couponId" value="<?php echo $coupounIdForModal?>">
					<div class="form-group">
						<label for="">Qty</label>
						<input class="form-control" maxlength="2" value="1" type="text" name="qtyModal" id="qtyModal"> 
					</div>
					
					<div class="form-group">
						<label for="">Choose Size</label>
						<select class="form-control" name="" id="">
						<option value="">Please select</option>
							<?php
								foreach ($sizeArr as $value) { ?>
									<option value=""><?php echo $value ?></option>
								<?php  }
							?>
						</select>
					</div>


					<div class="form-group">
						<label for="">Choose Fabric</label>
						<select class="form-control" name="" id="">
						<option value="">Please select</option>
							<?php
								foreach ($fabricArr as $value) { ?>
								
									<option value=""><?php echo $value ?></option>
								<?php  }
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="">Choose Category</label>
						<select class="form-control" name="" id="">
						<option value="">Please select</option>
							<?php
								foreach ($categoryArr as $value) { ?>
									<option value=""><?php echo $value ?></option>
								<?php  }
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="">Total Price</label>
						<input disabled class="form-control" type="text" name="totalPriceModal" id="totalPriceModal"> </div>
					<div class="form-group">
						<label for="">Discount</label>
						<input disabled class="form-control" value="<?php echo $_SESSION['discount']  ?>" type="text" name="discountModal" id="discountModal"> </div>
					<div class="form-group">
						<label for="">Price After Discount</label>
						<input disabled class="form-control" type="text" name="afterDiscountModal" id="afterDiscountModal"> </div>
					<div class="form-group">
						<input class="form-control btn btn-primary" name="orderCloth" value="Order Now" type="submit"> </div>
			</div>
			</form>
			</div>
			<script>
			function calculate() {
				var discount = $("#discountModal").val();
				var qty = $("#qtyModal").val();
				var ourPrice = "<?php echo  $productPrice; ?>";
				var totalPrice = (qty * ourPrice);
				var priceAfterDiscount = totalPrice - discount;
				if(priceAfterDiscount <= 0) {
					priceAfterDiscount = 0;
				}
				$("#totalPriceModal").val(totalPrice);
				$("#afterDiscountModal").val(priceAfterDiscount);
			}
			$(document).ready(function() {
				calculate();
				$("#qtyModal").keyup(function() {
					calculate();
				});
			});
			</script>