
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=ucfirst($this->fungsi->user_login()->username)?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
         <a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
         <li <?=$this->uri->segment(1) == 'supplier' ? 'class="active"' : ''?>>
          <a href="<?=base_url('supplier')?>"><i class="fa fa-truck"></i> <span>Supliers</span></a></li>
         <li <?=$this->uri->segment(1) == 'customer' ? 'class="active"' : ''?>>
          <a href="<?=base_url('customer')?>"><i class="fa fa-users"></i> <span>Customers</span></a></li>
        <li class="treeview <?=$this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : ''?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'category' ? 'class="active"' : ''?>>
              <a href="<?=base_url('category')?>"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li <?=$this->uri->segment(1) == 'unit' ? 'class="active"' : ''?>>
              <a href="<?=base_url('unit')?>"><i class="fa fa-circle-o"></i> Units</a></li>
            <li <?=$this->uri->segment(1) == 'item' ? 'class="active"' : ''?>>
              <a href="<?=base_url('item')?>"><i class="fa fa-circle-o"></i> Items</a></li> 
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> Sales</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Stock In</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Stock Out</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Sales</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Stock</a></li>
          </ul>
        </li>
        <?php if($this->fungsi->user_login()->level == 1) { ?>
        <li class="header">SETTINGS</li>
        <li><a href="<?=base_url('user')?>"><i class="fa fa-users"></i> <span>Users</span></a></li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>