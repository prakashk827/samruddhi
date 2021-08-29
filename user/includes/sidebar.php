<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" 
        src="<?php echo 'images/clientProfile/'.$_SESSION['clientProfile']; ?>" width=50px alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['clientName']  == '' ? 'User' : $_SESSION['clientName'] ;?></p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION["clientUId"] ;?></p>
        </div>
      </div>
      <ul class="app-menu">
       <!--  <li><a class="app-menu__item" href="dashboard.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li> -->
        
        <li><a class="app-menu__item" href=winners-list.php><i class="app-menu__icon fa fa-trophy"></i><span class="app-menu__label">Winners</span></a></li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Profile</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

            <li><a class="treeview-item" href="edit-profile.php"><i class="icon fa fa-user"></i> Profile</a></li>
            <li><a class="treeview-item" href="edit-address.php"><i class="fa fa-address-book"></i> &nbsp;Address</a></li>

          </ul>
        </li>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tags"></i><span class="app-menu__label">Coupon</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

            <li><a class="treeview-item" href="show-all-coupons.php"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp; Buy</a></li>
              <li><a class="treeview-item" href="show-all-purchased-coupons.php"><i class="fa fa-tags" aria-hidden="true"></i></i> &nbsp;My Coupons </a></li>
            <!-- <li><a class="treeview-item" href="pending-payment.php"><i class="icon fa fa-clock-o"></i>  Pending Payment</a></li> -->

          </ul>
        </li>

        <li><a class="app-menu__item" href="reset-pssword.php"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">Reset Password</span></a></li>


        
        
        
       
        
      </ul>
    </aside>