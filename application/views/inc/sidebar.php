<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="text-align-last: center;">
      <img src="<?=base_url()?>asset/img/itbs-corp-logo.png" alt="AdminLTE Logo"  style="opacity: .8" height="50px">
      <p class="brand-text mb-0">PMS</p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mb-3 d-flex">
        <!-- <div class="image">
          <img src="<?=base_url()?>asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
					<?php $uid = $this->session->userdata('id');
					$row = $this->globalmodel->sqlSelectRow("*", "users u", "", "u.id = '$uid' ");?>
          <p href="#" class="d-block mb-0"><?=$row['first_name'].' '.$row['middle_name'].' '.$row['last_name'].' '?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
			<?php if ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == ''){ $active = 'active';}else{ $active = '';} ?>
            <a href="<?=base_url()?>user" class="nav-link <?=$active?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
					<?php if ($this->uri->segment(1) == 'project'){ $active = 'active';}else{ $active = '';} ?>
            <a href="<?=base_url()?>project" class="nav-link <?=$active?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Projects
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
					<?php if($this->session->userdata('role_id')==3){ ?>
          <li class="nav-item">
					<?php if ($this->uri->segment(1) == 'employees'){ $active = 'active';}else{ $active = '';} ?>
            <a href="<?=base_url()?>employees" class="nav-link <?=$active?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employees
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
					<?php } ?>
					<?php if ($this->uri->segment(2) == 'account'){ $menu = 'menu-is-opening menu-open';$active = 'active';}else{  $menu = '';$active = ''; }?>
					<li class="nav-item <?=$menu?>">
            <a href="#" class="nav-link <?=$active?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
								<?php if ($this->uri->segment(2) == 'account'){ $active = 'active';}else{  $active = ''; }?>
								<a href="<?php base_url()?>user/account" class="nav-link <?=$active?>" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account Settings</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a  class="nav-link "  data-toggle="modal" data-target="#logoutModal">
          		<i class="fas fa-sign-out-alt nav-icon"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
