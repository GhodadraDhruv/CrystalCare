<?php
session_start();
include('includes/config.php');
if(@($_SESSION['alogin'])==0)
	{	
header('location:dashboard.php');
}
else{
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Crystal Care | Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style>
	.y{
		background-color:skypink;
	}
	.p{
		background-color:red;
	}
	.d{
		background-color:yellow;
	}
	.e{
		background-color:purple;
	}
	.f{
		background-color:blue;
	}
</style>
</head> 
<body>
   <div class="y page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
<!--header start here-->
<?php include('includes/header.php');?>
<!--header end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i></li>
            </ol>
<!--four-grids here-->
		<div class="four-grids">

			<a href="all-bookings.php">
					<div class="col-md-4 four-grid">
						<div class="d four-agileits">
							<div class="icon">
									<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Total Bookings</h3>
		
								<?php
// Assuming you have already established a mysqli database connection
$mysqli = new mysqli("localhost", "root", "", "ccms");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql5 = "SELECT id from tblcarcoatingbooking";
$query5 = $mysqli->query($sql5);

if (!$query5) {
    printf("Error: %s\n", $mysqli->error);
    exit();
}

$results5 = $query5->fetch_all(MYSQLI_ASSOC);
$cnt = $query5->num_rows;

// Close the connection
$mysqli->close();
?>
			<h4> <?php echo htmlentities($cnt);?> </h4>
				
								
							</div>
							
						</div>
					</div>
				</a>
<a href="new-booking.php">
					<div class="col-md-4 four-grid">
						<div class="e four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>New Bookings</h3>
								<?php
// Assuming you have already established a mysqli database connection
$mysqli = new mysqli("localhost", "root", "", "ccms");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql5 = "SELECT id from tblcarcoatingbooking  where status='New'";
$query5 = $mysqli->query($sql5);

if (!$query5) {
    printf("Error: %s\n", $mysqli->error);
    exit();
}

$results5 = $query5->fetch_all(MYSQLI_ASSOC);
$newbookings = $query5->num_rows;

// Close the connection
$mysqli->close();
?>
					
								<h4><?php echo htmlentities($newbookings);?></h4>

							</div>
							
						</div>
					</div>
				</a>
		<a href="completed-booking.php">
					<div class="col-md-4 four-grid">
						<div class="f four-wthree">
							<div class="icon">
							<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Completed Bookings</h3>
								<?php
// Assuming you have already established a mysqli database connection
$mysqli = new mysqli("localhost", "root", "", "ccms");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql5 = "SELECT id from tblcarcoatingbooking  where status='Completed'";
$query5 = $mysqli->query($sql5);

if (!$query5) {
    printf("Error: %s\n", $mysqli->error);
    exit();
}

$results5 = $query5->fetch_all(MYSQLI_ASSOC);
$completedbookings = $query5->num_rows;

// Close the connection
$mysqli->close();
?>

								<h4><?php echo htmlentities($completedbookings);?></h4>
								
							</div>
							
						</div>
					</div>
</a>
	

						<div class="clearfix"></div>
				</div>

		<div class="four-grids">
		<a href="manage-enquires.php">
			<div class="col-md-4 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Enquiries</h3>
								<?php
// Assuming you have already established a mysqli database connection
$mysqli = new mysqli("localhost", "root", "", "ccms");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql5 = "SELECT id from tblenquiry";
$query5 = $mysqli->query($sql5);

if (!$query5) {
    printf("Error: %s\n", $mysqli->error);
    exit();
}

$results5 = $query5->fetch_all(MYSQLI_ASSOC);
$cnt2 = $query5->num_rows;

// Close the connection
$mysqli->close();
?>
								<h4><?php echo htmlentities($cnt2);?></h4>
								
							</div>
							
						</div>
					</div>
				</a>
			<a href="managecar-washingpoints.php">
					<div class="col-md-4 four-grid">
						<div class="p four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Coating Points</h3>
												
								<?php
// Assuming you have already established a mysqli database connection
$mysqli = new mysqli("localhost", "root", "", "ccms");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql5 = "SELECT id from tblcoatingpoints";
$query5 = $mysqli->query($sql5);

if (!$query5) {
    printf("Error: %s\n", $mysqli->error);
    exit();
}

$results5 = $query5->fetch_all(MYSQLI_ASSOC);
$washingpoint = $query5->num_rows;

// Close the connection
$mysqli->close();
?>

								<h4><?php echo htmlentities($washingpoint);?></h4>
								
							</div>
							
						</div>
					</div>
</a>

					<div class="clearfix"></div>
				</div>
<!--//four-grids here-->


<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
</div>
</div>
				<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
	
</body>
</html>
<?php } ?>