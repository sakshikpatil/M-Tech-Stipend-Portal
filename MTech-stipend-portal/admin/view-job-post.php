<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: dashboard.php");
  exit();
}


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");


  
$sql1 = "SELECT * FROM stipend_applications WHERE id_application='$_GET[id]'";
$result1 = $conn->query($sql1);
if($result1->num_rows > 0) 
{
  $row = $result1->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Portal</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                  
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">          
          <div class="col-md-9 bg-white padding-2">
            <div class="pull-left">
              <h2><b><i><?php echo $row['name'] ?></i></b></h2>
            </div>
            <div class="pull-right">
              <a href="applications.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div>
              <p><span class="margin-right-10"> <i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['applieddate'])); ?></p>              
            </div>
            <div>
              <p><?php echo 'Month and Year : '. date("d-M-Y", strtotime($row['date'])); ?></h3>
              <p><?php echo 'Name : '. $row['name']; ?></p>
              <p><?php echo 'Roll No : '. $row['roll_no']; ?></p>
              <p></p><?php echo 'Master of Technology in : '. $row['mtech']; ?></p>
              <p></p><?php echo 'Semester : '. $row['sem']; ?> </p>
              <p><?php echo 'Emolument/salary/stipend/and other financial assistance received from any other source during this period : '. $row['financial_ast']; ?></p>
              <p><?php echo 'If YES, details there of from: '. $row['financial_ast_from'];?></p>
              <p><?php echo 'Amount in Rs: '. $row['financial_ast_amt']; ?> </p>

<!-- <label for="ps">Choose a project supervisor:</label>

<select name="ps" id="ps">
  <option selected value='' disabled selected></option>
  <option value="A">Mr. A</option>
  <option value="B">Mr. B</option>
</select>
<div>
  <label for="reas">Reason (if rejected)</label><br>
  <input id="reas" name="reas" rows="4" cols="100">
</div> -->
<table width=100% style="margin:30px 0px">
  <tr>
    <td style="text-align:center">
      <button style="width:50%; background-color:lightgreen" ><a href="accept-application.php?id=<?php echo $row['id_application'];?>">Accept</a></button>
    </td>
    <td style="text-align:center">
      <button style="width:50%; background-color:#FF7377"><a href="reject-application.php?id=<?php echo $row['id_application'];?>">Reject</a></button>
    </td>
  </tr>
</table>
</div>
            
            
          </div>
          
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <!-- <div class="text-center">
      <strong>Copyright &copy; 2016-2017 <a href="jonsnow.netai.net">Job Portal</a>.</strong> All rights
    reserved.
    </div> -->
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>