<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SIMS - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .preloader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-image: url(images/loader-128x/Preloader_7.gif);
            background-repeat: no-repeat; 
            background-color: #FFF;
            background-position: center;
        }
        body{
            background: url(images/1.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            color: blueviolet;
        }
        h1.page-header {
            margin-top: 20px;
            border-bottom: 0;
            color: white;
        }
    </style>
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
    <!-- Preloader -->
    <div class="preloader"></div>
     
    <!-- Session Check  -->
    <?php

 
        // Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login.php");
                exit;
        }
     ?>

    
    

    <!-- Navigation -->

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>SIMS </span></a>
				<ul class="nav navbar-top-links navbar-right">
					
				</ul>
			</div>
        </div><!-- /.container-fluid -->
        
    </nav>


    <!-- Sidebar -->
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="stock.php"> Stock Items </a></li>
			<li><a href="suppliers.php"> Suppliers </a></li>
			<li><a href="purchase.php"> Purchases </a></li>
			<li><a href="sales.php"> Sales </a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>

    <!-- Main Menu-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!-- Breadcrumb Row -->
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div>
        
        
    
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Purchase</strong>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped ewDBTable">
                            <tbody>
                                <tr>
                                    <th>Total Amount</th>
                                    <td style="text-align:right"> ₦ 500,390,000.00</td>
                                </tr>
                                <tr>
                                    <th>Total Payment</th>
                                    <td style="text-align:right"> ₦ 471,300,000.00</td>
                                </tr>
                                <tr>
                                    <th>Total Balance</th>
                                    <td style="text-align:right"> ₦ 29,090,000.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Sales</strong>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped ewDBTable">
                            <tbody>
                                <tr>
                                    <th>Total Amount</th>
                                    <td style="text-align:right"> ₦ 6,129,000.00</td>
                                </tr>
                                <tr>
                                    <th>Discount Amount</th>
                                    <td style="text-align:right"> ₦ 292,210.00</td>
                                </tr>
                                <tr>
                                    <th>Tax Amount</th>
                                    <td style="text-align:right"> ₦ 584,420.00</td>
                                </tr>
                                <tr>
                                    <th>Total Payment</th>
                                    <td style="text-align:right"> ₦ 4,371,210.00</td>
                                </tr>
                                <tr>
                                    <th>Total Balance</th>
                                    <td style="text-align:right"> ₦ 2,050,000.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Purchases Outstandings</strong>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped ewDBTable">
                            <tbody>
                                <tr>
                                    <th>Total Amount</th>
                                    <td style="text-align:right"> ₦ 500,390,000.00</td>
                                </tr>
                                <tr>
                                    <th>Total Payment</th>
                                    <td style="text-align:right"> ₦ 471,300,000.00</td>
                                </tr>
                                <tr>
                                    <th>Total Balance</th>
                                    <td style="text-align:right"> ₦ 29,090,000.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Sales Outstandings</strong>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped ewDBTable">
                            <tbody>
                                <tr>
                                    <th>Total Amount</th>
                                    <td style="text-align:right"> ₦ 6,129,000.00</td>
                                </tr>
                                <tr>
                                    <th>Discount Amount</th>
                                    <td style="text-align:right"> ₦ 292,210.00</td>
                                </tr>
                                <tr>
                                    <th>Tax Amount</th>
                                    <td style="text-align:right"> ₦ 584,420.00</td>
                                </tr>
                                <tr>
                                    <th>Total Payment</th>
                                    <td style="text-align:right"> ₦ 4,371,210.00</td>
                                </tr>
                                <tr>
                                    <th>Total Balance</th>
                                    <td style="text-align:right"> ₦ 2,050,000.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
        </div>
		</div>
	</div>	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc"
                    });
                };
	</script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script>
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function () {
        setTimeout(function(){
            $('.preloader').fadeOut('slow', function () {
            });
        },1500); // set the time here
    });  
        
    </script>
</body>

</body>
</html>
