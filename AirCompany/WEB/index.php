<?php 
    include("../BAL/PlaneBAL.php");
    include("../BAL/AirportBAL.php");
    include("../BAL/FlightBAL.php");
    include("../BAL/CheckinBAL.php");
    include("../BAL/LoggingBAL.php");
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
                <!-- Sidebar toggle button-->

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo "Onur CELIK" ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo "Onur CELIK - Web Developer" ?>
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3 id='airportCount'>
                                <?php 
                                    $model = new AirportBAL();
                                    echo $model->GetAirportsCount();                               
                                ?>                               
                                </h3>
                                <p>Airports</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="../WEB/AirportView.php" class="small-box-footer">Add new airport <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3 id='planeCount'>
                                <?php 
                                    $model = new PlaneBAL();
                                    echo $model->GetPlanesCount();                               
                                ?>  
                                </h3>
                                <p>Planes</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-paper-airplane"></i>
                            </div>
                            <a href="../WEB/PlaneView.php" class="small-box-footer">Add new plane <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3 id='flightCount'>
                                <?php 
                                    $model = new FlightBAL();
                                    echo $model->GetFlightsCount();                               
                                ?>  
                                </h3>
                                <p>Flights</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="../WEB/FlightView.php" class="small-box-footer">Add new flight <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id='checkinCount'>
                                <?php 
                                    $model = new CheckinBAL();
                                    echo $model->GetCheckinsCount();                               
                                ?>  
                                </h3>
                                <p>Checkins</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="../WEB/CheckinView.php" class="small-box-footer">Add new checkin <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        <h3 class="box-title"><b>Airports</b></h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>City</th>
                            </tr>

                            <?php 
                            $model = new AirportBAL();
                            foreach($model->GetAirports() as $data): ?>
                                <tr onClick="window.open('../WEB/AirportView.php?id=<?php echo $data->getId(); ?>', '_self');">
                                    <td><?php echo $data->getId(); ?></td>
                                    <td><?php echo $data->getCode(); ?></td>
                                    <td><?php echo $data->getName(); ?></td>
                                    <td><?php echo $data->getCity(); ?></td>
                                </tr>
                            <?php endforeach; ?>            
                        </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><b>Planes</b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Capacity</th>
                                <th>Registration Number</th>
                                <th>Status</th>
                            </tr>

                            <?php 
                            $model = new PlaneBAL();
                            foreach($model->GetPlanes() as $data): ?>
                                <tr onClick="window.open('../WEB/PlaneView.php?id=<?php echo $data->getId(); ?>', '_self');">
                                    <td><?php echo $data->getId(); ?></td>
                                    <td><?php echo $data->getName(); ?></td>
                                    <td><?php echo $data->getCapacity(); ?></td>
                                    <td><?php echo $data->getRegistrationNumber(); ?></td>
                                    <td><?php echo $data->getStatus(); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><b>Flights</b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                            <th>ID</th>
                            <th>Flight Number</th>
                            <th>Plane ID</th>
                            <th>Departure ID</th>
                            <th>Destination ID</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                            <th>Price</th>
                            <th>Gate</th>
                            <th>IsActive</th>
                            </tr>
                            <?php 
                            $model = new FlightBAL();
                            foreach($model->GetFlights() as $data): ?>
                                <tr onClick="window.open('../WEB/FlightView.php?id=<?php echo $data->getId(); ?>', '_self');">
                                    <td><?php echo $data->getId(); ?></td>
                                    <td><?php echo $data->getFlightNumber(); ?></td>
                                    <td><?php echo $data->getPlaneId(); ?></td>
                                    <td><?php echo $data->getDepartureId(); ?></td>
                                    <td><?php echo $data->getDestinationId(); ?></td>
                                    <td><?php echo $data->getDepartureDateTime(); ?></td>
                                    <td><?php echo $data->getArrivalDateTime(); ?></td>
                                    <td><?php echo $data->getPrice(); ?></td>
                                    <td><?php echo $data->getGate(); ?></td>
                                    <td><?php echo $data->getIsActive(); ?></td>
                                </tr>
                            <?php endforeach; ?>   
                        </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><b>Checkins</b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                            <th>ID</th>
                            <th>Flight ID</th>
                            <th>PNR</th>
                            <th>Seat</th>
                            <th>IsChecked</th>
                            </tr>
                            <?php 
                            $model = new CheckinBAL();
                            foreach($model->GetCheckins() as $data): ?>
                                <tr onClick="window.open('../WEB/CheckinView.php?id=<?php echo $data->getCheckId(); ?>', '_self');">
                                    <td><?php echo $data->getCheckId(); ?></td>
                                    <td><?php echo $data->getFlightId(); ?></td>
                                    <td><?php echo $data->getPNR(); ?></td>
                                    <td><?php echo $data->getSeat(); ?></td>
                                    <td><?php echo $data->getIsChecked(); ?></td>
                                </tr>
                            <?php endforeach; ?>   
                        </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><b>Loggings</b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                            <th>ID</th>
                            <th>Entity</th>
                            <th>Operation</th>
                            <th>Create Date</th>
                            </tr>
                            <?php 
                            $model = new LoggingBAL();
                            foreach($model->GetLogs() as $data): ?>
                                <tr>
                                    <td><?php echo $data->getId(); ?></td>
                                    <td><?php echo $data->getEntity(); ?></td>
                                    <td><?php echo $data->getOperation(); ?></td>
                                    <td><?php echo $data->getCreateDate(); ?></td>
                                </tr>
                            <?php endforeach; ?> 
                        </table>
                        </div>
                    </div>
                    <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2017 <a href="index.html">AdamAir</a>.</strong> All rights reserved.
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