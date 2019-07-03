<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<?php

include "db/config.php";

if(isset($_POST['submit'])){
	
	// Items to be added
	$purchase_no = $_POST['purchase_no'];
	$purchase_date = $_POST['purchase_date'];
	$category = $_POST['category'];
	$suppliers = $_POST['suppliers'];
	$note = $_POST['note'];
	$total_amt = $_POST['total_amt'];
	$total_pmt = $_POST['total_pmt'];
	$total_bal = $_POST['total_pmt'] + $_POST['total_amt'];

    // Prepare a select statement
    $sql = "INSERT INTO purchase (purchase_no, category, suppliers, notes, total_amt, total_pmt, total_bal) 
	VALUES ('$purchase_no', '$category', '$suppliers', '$note', '$total_amt', '$total_pmt', '$total_bal')";
         
   $query = mysqli_query($mysqli, $sql); 

   if (!$query){
	   die('Error: ' .mysqli_error($mysqli));
	}
	echo "1 record added";
	header("location: purchase.php");
	
	mysql_close($mysqli);

}

?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMS - Purchases</title>
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
			<li><a href="stock.php"> Stock Items </a></li>
			<li><a href="suppliers.php"> Suppliers </a></li>
			<li class="active"><a href="purchase.php"> Purchases </a></li>
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
				<li class="active">Purchases</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Purchases</h1>
			</div>
		</div>
        
        
    
		<div class="row">
			<!-- Purchase -->
		<div class="col-md-12 col-sm-12 col-lg-12">
                <div class="panel panel-default col-lg-12 col-md-12 col-sm-12">
                    <div class="panel-heading">
                        <strong>Suppliers</strong>
                    </div>
              
					<div class="panel-body">
								<table class='table table-striped table-responsible'>
									<thead>
										<tr>
										<th><strong>Purchase Number</strong></th>
										<th><strong>Category</strong></th>
										<th><strong>Suppliers</strong></th>
										<th><strong>Total Amount</strong></th>
										<th><strong>Total Payment</strong></th>
										<th><strong>Total Balance</strong></th>
										<th><strong>Edit</strong></th>
										</tr>	
									</thead>
									<tbody>
										<?php
											$count=1;
											$sel_query="Select * from purchase;";
											$result = mysqli_query($mysqli,$sel_query);
											while($row = mysqli_fetch_assoc($result)) { ?>
											<tr>
											<td align="center"><?php echo $row['purchase_no']; ?></td>
											<td align="center"><?php echo $row['category']; ?></td>`	
											<td align="center"><?php echo $row['suppliers']; ?></td>
											<td align="center"><?php echo $row['total_amt'] ?></td>
											<td align="center"><?php echo $row['total_pmt'] ?></td>
											<td align="center"><?php echo $row['total_bal']?></td>
											<td align="center">
											<a href="purchase_delete.php?id=<?php echo $row["purchase_no"]; ?>" class="btn btn-info">Delete</a>
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
		<!-- Add Purchase -->
		<div class="col-md-12 col-sm-12 col-lg-12">
                <div class="panel panel-default col-lg-12 col-md-12 col-sm-12">
                    <div class="panel-heading">
                        <strong>Add Purchase</strong>
					</div>
                    <div class="panel-body">
                        <form action="purchase.php" method="POST" class="form-horizontal">
							<div class="form-group">
								<label for="purchase_no" class="control-label col-sm-4">Purchase Number </label>
								<div class="col-md-5">
									<input type="text" class="form-control" id="purchase_no" name="purchase_no" value="<?php echo uniqid('Purchase-', $more_entropy=false) ?>"  readonly="readonly">
								</div>
							</div>
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
								<select class="form-control" id="supplier" name="suppliers">
										<option value="Xaoumi China">Xaoumi China</option>
										<option value="Philix Usa">Philix Usa</option>
										<option value="Musk Germany">Musk Germany</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="note" class="control-label col-sm-4">Notes </label>
								<div class="col-md-5">
									<input type="text" class="form-control" id="note" name="note" required='required'>
								</div>
							</div>
							<div class="form-group">
								<label for="total_amt" class="control-label col-sm-4">Total Amount </label>
								<div class="col-md-5">
									<input type="text" class="form-control" id="total_amt" name="total_amt" required='required'>
								</div>
							</div>
							<div class="form-group">
								<label for="total_pmt" class="control-label col-sm-4">Total Payment</label>
								<div class="col-md-5">
									<input type="text" class="form-control" id="total_pmt" name="total_pmt" required='required'>
								</div>
							</div>
							<div class="form-group">        
								<div class="col-sm-offset-7 col-sm-5">
									<button type="submit" name="submit" class="btn btn-info">Add</button>
									<button type="submit" name="submit" class="btn btn-danger"><a href="stock.php">Cancel</a></button>
								</div>
							</div>
						</form>
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
        },2000); // set the time here
    });  
        
    </script>
</body>

</body>
</html>
