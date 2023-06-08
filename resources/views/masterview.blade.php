<!DOCTYPE html>
<html>
    <head>
   
  
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name='csrf-token' content='{{ csrf_token() }}' />
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
  <link href="css/jquery-ui.css" rel="stylesheet">
  <link href="css/jquery-ui.theme.css" rel="stylesheet">
  
  

        
    </head>
    <body id='mainbody'>
        @yield('content')


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
        <script src="js/accountjs.js" type='module'></script>
        <script src="js/jquery-ui.js" ></script>
        <script src="js/picker.js" ></script>
        <script src="js/picker.date.js"></script>
        
        
        

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
    </body>
</html>