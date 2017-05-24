<?php 
	require_once("Controllers/AirportController.php");            
    require_once("Models/AirportModel.php");

    session_start();
	$user = "User";
    $email = "Welcome";
	
	if(isset($_SESSION['user']) && isset($_SESSION['email'])) {
		$user =  $_SESSION['user'];
        $email =  $_SESSION['email'];
	}
    else{
        header("location: LoginView.php");
    }

    if($_POST["submit"] == "Sign out") {
        session_start();
        unset($_SESSION);
        session_destroy();
        header("location: LoginView.php");
        exit();
    }

    if(isset($_GET['id']))
    {
        $id = htmlspecialchars($_GET['id']);
        $airport = new AirportController();
        $model = $airport->GetAirport($id);

        $code = $model->getCode();
        $name = $model->getName();
        $city = $model->getCity();
    }
    else if(!isset($_GET['id']))
    {
        $id = 0;
    }

    if($_POST['submit'] == 'Delete')
    {
        $airport = new AirportController();
        $result = $airport->DeleteAirport($id);
        header("Location: index.php");
    }
    else if($_POST['submit'] == "Save")
    {
        if(!isset($_GET['id']) && !empty($_POST["code"]) && !empty($_POST["name"]) && !empty($_POST["city"])) 
        {
            $Id = 0;
            $Code = trim($_POST["code"]);
            $Name = trim($_POST["name"]);
            $City = trim($_POST["city"]);
                
            $model = new AirportModel($Id, $Code, $Name, $City);
            $airport = new AirportController();
            $result = $airport->AddAirport($model);

            header("Location: index.php");
        }

        else if(!empty($_POST["code"]) && !empty($_POST["name"]) && !empty($_POST["city"])) 
        {
            $Id = $id;
            $Code = trim($_POST["code"]);
            $Name = trim($_POST["name"]);
            $City = trim($_POST["city"]);
                
            $model = new AirportModel($Id, $Code, $Name, $City);
            $airport = new AirportController();
            $result = $airport->UpdateAirport($model);

            header("Location: index.php");
        }            
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdamAir</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-red sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>A</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Adam</b>Air</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $user ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $user?>
                                        <small><?php echo $email ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <form method="post">
                                            <input type="submit" class="btn btn-default btn-flat" name="submit" value="Sign out">
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="box box-warning">
                    <div class="box-header with-border">
                    <h3 class="box-title"><b>Airport Table</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?> method="post">
                            <div class="form-group">
                                <label>Id</label>
                                <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Enter ..." value="<?php echo $code; ?>">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter ..." value="<?php echo $name; ?>">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" placeholder="Enter ..." value="<?php echo $city; ?>">
                            </div>                
                            <div class="box-footer">    
                                <input type="submit" class="btn btn-default" name="submit" value="Delete"/>
                                <input type="submit" class="btn btn-info pull-right" name="submit" value="Save"/>
                            </div>
                        </form>  
                    </div>
                    <!-- /.box-body -->   
                </div>
                <!-- /.box -->
            </section>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2017 <a href="index.php">AdamAir</a>.</strong> All rights reserved.
            <div class="pull-right">
                    <a href='http://178.62.4.241/api/docs.html'>http://178.62.4.241/api/docs.html<a/>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body> 

</html>