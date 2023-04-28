<?php $__env->startSection('title',"Dashboard"); ?>
<?php $__env->startSection('content'); ?>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img alt="">
        <span class="d-none d-lg-block" style='font-size:17px;'>UserDashboard</span>
      </a>
      <i class="fas fa-list toggle-sidebar-btn" style='font-size:16px;'></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto" >
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0 float-right" href="#" data-bs-toggle="dropdown" style='float:right;'>
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('logout')); ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link statisticsview" href="#">
          <i class="fas fa-globe"></i>
          <span>Statistics</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.html">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>
         
         
          
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="fas fa-restroom"></i><span>Corpse</span><i class="fas fa-caret-down"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a id='addcorplink' href='#'>
              <i class="fa-solid fa-caret-down"></i><span>Add Corpse</span>
            </a>
          </li>
          <li>
            <a href="#" id='viewcorplink'>
              <i class="bi bi-circle" ></i><span>View Corpse</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="fas fa-file-invoice"></i><span>Billing</span><i class="fas fa-caret-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse">
          <li>
            <a id='addbillinglink' href="#">
              <i class="bi bi-circle"></i><span>Add Billing</span>
            </a>
          </li>
          <li>
            <a id='viewbillinglink' href="#">
              <i class="bi bi-circle"></i><span>View Billing</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#payment-nav" data-bs-toggle="collapse" href="#">
          <i class="fas fa-money"></i><span>Payment</span><i class="fas fa-caret-down ms-auto"></i>
        </a>
        <ul id="payment-nav" class="nav-content collapse">
          <li>
            <a id='addpayment' href="#">
              <i class="bi bi-circle"></i><span>Make Payment</span>
            </a>
          </li>
          <li>
            <a id='viewpayment' href="#">
              <i class="bi bi-circle"></i><span>View Payment</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#clearnace-nav" data-bs-toggle="collapse" href="#">
          <i class="fas fa-check-circle"></i><span>Clearance</span><i class="fas fa-caret-down ms-auto"></i>
        </a>
        <ul id="clearnace-nav" class="nav-content collapse">
          <li>
            <a id='clearacnelink' href="#">
              <i class="bi bi-circle"></i><span>Clear Corpse</span>
            </a>
            <a id='viewclearancelink' href="#">
              <i class="bi bi-circle"></i><span>view Clearance.</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item admin-menu">
        <a class="nav-link collapsed reportlink" data-bs-target="#icons-nav" href="#">
          <i class="fas fa-file"></i><span>Report</span>
        </a>
      </li><!-- End Icons Nav -->
      
      <li class="nav-item admin-menu">
        <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="fas fa-money"></i><span>Users</span><i class="fas fa-caret-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse">
          <li>
            <a id='addpayment' href="#">
              <i class="bi bi-circle"></i><span>Add Users</span>
            </a>
          </li>
          <li>
            <a id='viewpayment' href="#">
              <i class="bi bi-circle"></i><span>view users</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item admin-menu">
        <a class="nav-link collapsed" data-bs-target="#service-nav" data-bs-toggle="collapse" href="#">
          <i class="fas fa-money"></i><span>Services</span><i class="fas fa-caret-down ms-auto"></i>
        </a>
        <ul id="service-nav" class="nav-content collapse">
          <li>
            <a id='addservicelink' href="#">
              <i class="bi bi-circle"></i><span>Add Service</span>
            </a>
          </li>
          <li>
            <a id='viewpayment' href="#">
              <i class="bi bi-circle"></i><span>view Service</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" href="<?php echo e(route('logout')); ?>">
          <i class="fas fa-file"></i><span>Logout</span>
        </a>
      </li><!-- End Icons Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
          <?php echo $__env->make('dashboard.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('corp.addcorpse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('corp.viewcorps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('corp.corpdetail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('billing.addbilling', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('billing.viewbilling', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('billing.billdetails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('payment.addpayment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('payment.viewpayment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('payment.paymentdetail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('clearance.addclearance', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('clearance.viewclearance', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('clearance.clearancedetails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('service.addservices', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('report.viewreport', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          
          </div>

        </div><!-- End Left side columns -->

        
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Perfect Web Ventures</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  

  <!-- <script src="js/bill.js" type='module'></script> -->
  <script src="js/accountjs.js" type='module'></script>
  <script src="js/corpse.js" type='module'></script>
  <script src="js/billing.js" type='module'></script>
  <script src="js/payment.js" type='module'></script>
  <script src="js/statistics.js" type='module'></script>
  <script src="js/clearance.js" type='module'></script>
  <script src="js/report.js" type='module'></script>
  <script src="js/service.js" type='module'></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>