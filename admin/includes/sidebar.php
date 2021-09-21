<?php 
$_SESSION['clientName']="Prakash";
 $_SESSION["clientUId"]= "Admin";
 $_SESSION['clientProfile'] = "";
?>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" 
        src="<?php echo $_SESSION['clientProfile']; ?>" width=50px alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['clientName']  == '' ? 'User' : $_SESSION['clientName'] ;?></p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION["clientUId"] ;?></p>
        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="../index.php"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Visit Home</span></a></li>
        <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="notice-board.php"><i class="app-menu__icon fa fa-bell"></i><span class="app-menu__label">Notice Board </span></a></li>
        
        <li><a class="app-menu__item" href="https://samruddhi-lucky-draw.herokuapp.com/admin/coupons/coupon-analysis"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Who bought more  </span></a></li>
        <li><a class="app-menu__item" href="todays-summury.php"><i class="app-menu__icon fa fa-clock-o"></i><span class="app-menu__label">Today's Summary </span></a></li>
        <li><a class="app-menu__item" href=" today-sold-coupons.php"><i class="app-menu__icon fa fa-tags"></i><span class="app-menu__label">Today's sold</span></a></li>
       
       
        <li><a class="app-menu__item" href="sale-back-request.php"><i class="app-menu__icon fa fa-refresh"></i><span class="app-menu__label">Sale Back Request</span></a></li>
        <li><a class="app-menu__item" href="cloth-order-request.php"><i class="app-menu__icon fa fa-external-link-square"></i><span class="app-menu__label">Cloth Order Request</span></a></li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-trophy"></i><span class="app-menu__label">Winner</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

            <li><a class="treeview-item" href="announce-winner.php"><i class="icon fa fa-arrow-up"></i> Announce</a></li>
            <li><a class="treeview-item" href="publish-winner.php"><i class="icon fa fa-bullhorn"></i> Publish</a></li>

          </ul>
        </li>
       
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Clients</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

			  <li><a class="treeview-item" href="registered-client-list.php"><i class="icon fa fa-users"></i> Registered Clients</a></li>
            <li><a class="treeview-item" href="client-list.php"><i class="icon fa fa-users"></i> Coupon Purchased Clients</a></li>
            <li><a class="treeview-item" href="client-payment-issue.php"><i class="icon fa fa-money"></i> Payment Issue</a></li>

          </ul>
        </li>
        
        
        
        
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tags"></i><span class="app-menu__label">Coupon</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

            <li><a class="treeview-item" href="add-new-coupon.php"><i class="icon fa fa-plus"></i> Add</a></li>
            <li><a class="treeview-item" href="show-all-coupons.php"><i class="icon fa fa-eye"></i> Coupon summary</a></li>
            <li><a class="treeview-item" href="show-purchased-coupons.php"><i class="icon fa fa-eye"></i> Show Client Purchsed</a></li>
            <!-- <li><a class="treeview-item" href="pending-payment.php"><i class="icon fa fa-clock-o"></i>  Pending Payment</a></li> -->

          </ul>
        </li>
       
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-product-hunt"></i><span class="app-menu__label">Product</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

            <li><a class="treeview-item" href="products-add.php"><i class="icon fa fa-plus"></i> Add</a></li>
            <li><a class="treeview-item" href="products-delete.php"><i class="icon fa fa-pencil"></i> Edit</a></li>
            <li><a class="treeview-item" href="products-delete.php"><i class="icon fa fa-trash"></i> Delete</a></li>

          </ul>
        </li>


        

        <li><a class="app-menu__item" href="reset-password.php"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">Reset Client Password</span></a></li>


        
        
        
       
        
      </ul>
    </aside>