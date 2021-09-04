<title>Winners List</title>

<?php
session_start();
if (!isset($_SESSION["clientUId"])) {
    header("Location:index.php");
}
?>
<?php
include_once("../db/db.php");
$clientUId = $_SESSION["clientUId"];
?>

<?php include_once("includes/head.php"); ?>



<!-- Navbar starts-->
<?php include_once("includes/navbar.php"); ?>
<!-- Navbar Ends-->


<!-- Sidebar menu starts-->
<?php include_once("includes/sidebar.php"); ?>
<!-- Sidebar menu ends-->

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-trophy"></i> Winners List
            </h1>


            <!--<p>Start a beautiful journey here</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>


    <a href="show-all-coupons.php"><button class="btn btn-success">Try One's</button></a>
    <br>

    <h1 style="text-align:center;color:#81CA00">Congratulations </h1>
    <h2 style="text-align:center;color:#F84F2B">To Our Lucky Draw Winners</h2>
    <br>

    <?php
    $clientUId = $_SESSION["clientUId"];
    $sel = "SELECT client_profile.clientUId,luckyNumber,winner_coupons.date,winner_coupons.time,couponId,firstName,lastName,image,city,orderType FROM winner_coupons
 INNER JOIN client_profile ON client_profile.clientUId = winner_coupons.clientUId INNER JOIN client_address ON client_profile.clientUId = client_address.clientUId 
WHERE published='yes' AND orderShipped = 'no'  ORDER BY winner_coupons.id DESC ";
    $exe = mysqli_query($conn, $sel);

    if (mysqli_num_rows($exe) > 0) {

        while ($data = mysqli_fetch_assoc($exe)) {
            $couponId = $data['couponId'];
            $query = "SELECT * FROM coupons WHERE id = '$couponId'";
            $execute = mysqli_query($conn, $query);
            $coupons = mysqli_fetch_assoc($execute);
            $orderType =  $data['orderType'];
            $background = 'white';
            if ($orderType != "" && $data['clientUId'] == $clientUId) {
                $background = '#E1E1E1';
            }
    ?>
            <div class="row tile">

                <div class="col-md-6">
                    <h5><strong>Lucky Number : </strong><?php echo $data['luckyNumber']; ?> <br></h5>

                    <img style="width:250px;height:250px;object-fit:cover;" src="<?php echo 'images/clientProfile/' . $data['image']; ?>"><span></span><br>
                </div>
                <div class="col-md-6">
                    <h5><strong></strong></h5><br>
                    <strong>Full Name : </strong> <?php echo $data['firstName'] . ' ' . $data['lastName'];  ?><br>

                    <strong> Published On <br> Date :
                    </strong> <?php echo $data['date']; ?> <strong>&</strong> <span><strong>Time
                            : </strong> <?php echo $data['time']; ?></span> <br>

                    <strong>Coupon
                        Name : </strong> <span style="color:red"> <?php echo $coupons['couponName']; ?> </span>
                    <strong> & Coupon Id :</strong><?php echo $couponId; ?>
                    <br> <strong>
                        Coupon Worth :</strong> <?php echo 'Rs ' . $coupons['couponWorth'] . ' /-'; ?><br>
                    <strong> Sale Back Amt. :</strong> <?php echo 'Rs ' . $coupons['salebackAmt'] . ' /-'; ?><br>
                    <strong>Place :</strong> <?php echo $data['city'] == '' ? 'Not Provided' : $data['city']; ?><br>
                    <br>
                    <?php

                    if ($data['clientUId'] == $clientUId && $orderType == '') { ?>
                        <form action="product-list.php" method="POST">

                            <input type="hidden" name="coupounIdForModal" value="<?php echo $couponId; ?>">
                            <input type="submit" class="btn btn-success disableInputField" value="Buy Cloth">
                            <a href="sale-back.php"><button type="button" class="btn btn-danger disableInputField">Sale Back</button></a>
                        </form>

                    <?php
                    } else { ?>

                        <form style="visibility:hidden" action="product-list.php" method="POST">
                            <!-- hideing purpose -->
                            <input type="hidden">
                            <input type="submit">
                            <button class="btn btn-danger disableInputField">Sale Back</button>
                        </form>

                    <?php }

                        $whatsapp = 'SAMRUDDHI LUCKY WINNER %0a CONGRATULATIONS %0a  '; 
                        $whatsapp .='Lucky Draw Number '.$data['luckyNumber'].' %0a';
                        $whatsapp .= 'Full Name '. $data['firstName'] . ' ' . $data['lastName'].'%0a';
                        $whatsapp .= 'Published date '. $data['date'] . '%0a';
                        

                    ?>
                    <a href="whatsapp://send?text=<?php echo $whatsapp ; ?>">
                        <button class="btn btn-sm btn-success">Share via WhatsApp <i class="fa fa-whatsapp" aria-hidden="true"></i></button>
                    </a>
                    <!-- <a href="https://api.whatsapp.com/send?phone=<?php echo $data['clientUId'] ?>&text=http%3A%2F%2Fwww.svluckydraw.in%2F">
                  
                    </a> -->

                </div>

            </div>



    <?php
        }
    } else {
        echo "Winners are not announced.";
    }
    ?>
    </div>

</main>


<!-- Footer Starts-->
<?php include_once("includes/footer.php"); ?>
<!-- Footer Ends-->


</body>

</html>