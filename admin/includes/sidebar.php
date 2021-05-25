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
        <li><a class="app-menu__item" href="dashboard.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
         <li><a class="app-menu__item" href="announce-winner.php"><i class="app-menu__icon fa fa-trophy"></i><span class="app-menu__label">Announce winner</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Client</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

            <li><a class="treeview-item" href="client-list.php"><i class="icon fa fa-users"></i> Client list</a></li>
            <li><a class="treeview-item" href="client-payment-issue.php"><i class="icon fa fa-money"></i> Payment Issue</a></li>
            <li><a class="treeview-item" href="edit-address.php"><i class="icon fa fa-circle-o"></i> Address</a></li>

          </ul>
        </li>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tags"></i><span class="app-menu__label">Coupon</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

            <li><a class="treeview-item" href="add-new-coupon.php"><i class="icon fa fa-plus"></i> Add</a></li>
            <li><a class="treeview-item" href="show-all-coupons.php"><i class="icon fa fa-eye"></i> Show</a></li>
            <li><a class="treeview-item" href="pending-payment.php"><i class="icon fa fa-clock-o"></i>  Pending Payment</a></li>

          </ul>
        </li>

        <li><a class="app-menu__item" href="reset-pssword.php"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">Reset Password</span></a></li>


        
        
        
       
        
      </ul>
    </aside>