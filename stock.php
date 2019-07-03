<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

	include "db/config.php";

	if (!$mysqli) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	
	
	if(isset($_POST['submit'])){
		// Items to be added
		$category = $_POST['category'];
		$supplier = $_POST['supplier'];
		$stock_no = $_POST['stock_no'];
		$stock_name = $_POST['stock_name'];
		$pp = $_POST['pp'];
		$sp = $_POST['sp'];
		$note = $_POST['note'];

		// Prepare a select statement
		$sql = "INSERT INTO stock (category, supplier_no, stock_no, stock_name, purchasing_price, selling_price, notes) 
		VALUES ('$category', '$supplier', '$stock_no', '$stock_name', '$pp', '$sp', '$note')";
			
		$query = mysqli_query($mysqli, $sql);

		if (!$query){
			die('Error: ' .mysqli_error($mysqli));
			}
		echo "1 record added";
		header("location: stock.php");

			
		mysql_close($mysqli);

	}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMS - Stock Items</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
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
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="stock.php"> Stock Items </a></li>
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
				<li class="active">Stock Items</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Stock Items</h1>
			</div>
		</div>
            
    
		<div class="row">
		<!-- Stock -->
		<div class="col-md-12 col-sm-12 col-lg-12">
                <div class="panel panel-default col-lg-12 col-md-12 col-sm-12">
                    <div class="panel-heading">
                        <strong>Stocks</strong>
                    </div>
                    <div class="panel-body">
						<table class='table table-striped table-responsible'>
							<thead>
								<tr>
								<th><strong>Category</strong></th>
								<th><strong>Supplier</strong></th>
								<th><strong>Stock Name</strong></th>
								<th><strong>Stock Number</strong></th>
								<th><strong>Purchasing Price</strong></th>
								<th><strong>Selling Price</strong></th>
								</tr>	
							</thead>
							<tbody>
								<?php
									$count=1;
									$sel_query="Select * from stock;";
									$result = mysqli_query($mysqli,$sel_query);
									while($row = mysqli_fetch_assoc($result)) { ?>
									<tr>
									<td align="center"><?php echo $row["category"]; ?></td>
									<td align="center"><?php echo $row['supplier_no']; ?></td>
									<td align="center"><?php echo $row["stock_name"]; ?></td>
									<td align="center"><?php echo $row['stock_no']; ?></td>
									<td align="center"><?php echo '₦ '.$row['purchasing_price']; ?></td>
									<td align="center"><?php echo '₦ '.$row['selling_price']; ?></td>
									<td align="center">
									<a href="stock_delete.php?id=<?php echo $row["stock_no"]; ?>" class="btn btn-info">Delete</a>
									</td>
									</tr>
								<?php $count++; } ?>
							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Add Stock -->
		<div class="col-md-12 col-sm-12 col-lg-12">
                <div class="panel panel-default col-lg-12 col-md-12 col-sm-12">
                    <div class="panel-heading">
						<strong>Add Stocks</strong>
                    </div>
                    <div class="panel-body">
                        <form action="stock.php" method="POST" class="form-horizontal">
							<div class="form-group">
								<label for="category" class="control-label col-sm-4">Category </label>
								<div class="col-md-5">
									<select class="form-control" id="category" name="category">
										<option value="RAW MATERIALS">RAW MATERIALS</option>
										<option value="WORK-IN-PROCESS">WORK-IN-PROCESS</option>
										<option value="FINISHED GOODS">FINISHED GOODS</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="supplier" class="control-label col-sm-4">Suppliers </label>
								<div class="col-md-5">
								<select class="form-control" id="supplier" name="supplier">
										<option value="Xaoumi China">Xaoumi China</option>
										<option value="Philix Usa">Philix Usa</option>
										<option value="Musk Germany">Musk Germany</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="stock_no" class="control-label col-sm-4">Stock Number </label>
								<div class="col-md-5">
								<input type="text" class="form-control" id="stock_no" name="stock_no" value="<?php echo uniqid('stock-', $more_entropy=false) ?>"  readonly="readonly">
								</div>
							</div>
							<div class="form-group">
								<label for="stock_name" class="control-label col-sm-4">Stock name </label>
								<div class="col-md-5">
									<input type="text" class="form-control" id="stock_name" name="stock_name" required='required'>
								</div>
							</div>
							<div class="form-group">
								<label for="pp" class="control-label col-sm-4">Purchasing Price </label>
								<div class="col-md-5">
									<input type="text" class="form-control" id="pp" name="pp" required='required'>
								</div>
							</div>
							<div class="form-group">
								<label for="sp" class="control-label col-sm-4">Selling Price </label>
								<div class="col-md-5">
									<input type="text" class="form-control" id="sp" name="sp" required='required'>
								</div>
							</div>
							<div class="form-group">
								<label for="note" class="control-label col-sm-4">Note </label>
								<div class="col-md-5">
									<input type="text" class="form-control" id="note" name="note" required='required'>
								</div>
							</div>
							<div class="form-group">        
								<div class="col-sm-offset-7 col-sm-5">
									<button type="submit" name="submit" class="btn btn-info">Add</button>
									<button type="submit" class="btn btn-danger"><a href="stock.php">Cancel</a></button>
								</div>
							</div>
						</form>
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
