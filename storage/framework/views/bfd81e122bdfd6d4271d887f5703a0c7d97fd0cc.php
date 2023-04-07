<!DOCTYPE html>
<html>
    <head>
    <script src="js/corpse.js" type='module'></script>
  <!-- <script src="js/bill.js" type='module'></script> -->
  <script src="js/billing.js" type='module'></script>
  <script src="js/payment.js" type='module'></script>
  <script src="js/statistics.js" type='module'></script>
  
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta charset="UTF-8">
        <meta name='csrf-token' content='<?php echo e(csrf_token()); ?>' />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/select2.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/all.css">
        <link rel="stylesheet" type="text/css" href="css/regular.min.css">
        <link rel="stylesheet" type="text/css" href="css/solid.min.css">
  <link href="css/bootstrap-icons.css" rel="stylesheet">
  <link href="css/boxicons.min.css" rel="stylesheet">
  <link href="css/quill.snow.css" rel="stylesheet">
  <link href="css/quill.bubble.css" rel="stylesheet">
  <link href="css/remixicon.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style1.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">

        
    </head>
    <body id='mainbody'>
        <?php echo $__env->yieldContent('content'); ?>


  <div id="printarea"></div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/printThis.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/select2.js" type="text/javascript"></script>
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/echarts.min.js"></script>
        <script src="js/quill.min.js"></script>
        
        <script src="js/simple-datatables.js"></script>
        <script src="js/tinymce.min.js"></script>
        <script src="js/validate.js"></script>
        <script src="js/jquery.PrintArea.js"></script>
        <script src="js/account.js" type='nodule'></script>
        

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
    </body>
</html>