<?php
session_start();
error_reporting(0);
include('includes/config.php');
$mysqli = new mysqli("localhost", "root", "", "ccms");

				// Check connection
				if ($mysqli->connect_errno) {
					echo "Failed to connect to MySQL: " . $mysqli->connect_error;
					exit();
				}
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // Code for Booking
    if (isset($_POST['book'])) {
		
        $ptype = $_POST['packagetype'];
        $wpoint = $_POST['carcoatingpoint'];
        $fname = $_POST['fname'];
		$noplat = $_POST['noplat'];
        $mobile = $_POST['contactno'];
        $date = $_POST['coatingdate'];
        $time = $_POST['coatingtime'];
        $message = $_POST['message'];
        $status = 'New';
        $bno = mt_rand(100000000, 999999999);

        $sql = "INSERT INTO tblcarcoatingbooking (bookingId, packageType, carcoatingPoint, fullName, noplate, mobileNumber, coatingDate, coatingTime, message, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('isssssssss', $bno, $ptype, $wpoint, $fname, $noplat, $mobile, $date, $time, $message, $status);

        if ($stmt->execute()) {
            $lastInsertId = $stmt->insert_id;
            if ($lastInsertId) {
                echo '<script>alert("Your booking done successfully. Booking number is ' . $bno . '")</script>';
                echo "<script>window.location.href ='new-booking.php'</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }

        $stmt->close();
    }	
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Crystal Care | Add Car Coating Booking</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
              <!--header start here-->
<?php include('includes/header.php');?>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Add Car Coating Booking </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Add Car Coating Booking</h3>

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="washingpoint" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
									<div class="col-sm-8">
								 <select name="packagetype" required class="form-control">
                <option value="<?php echo htmlentities($row['coating']); ?>(₹<?php echo htmlentities($row['price']); ?>)">Select Package Type</option>
                <?php
				$mysqli = new mysqli("localhost", "root", "", "ccms");

				// Check connection
				if ($mysqli->connect_errno) {
					echo "Failed to connect to MySQL: " . $mysqli->connect_error;
					exit();
				}

$sql = "SELECT * FROM tblcoatingplans";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo htmlentities($row['coating']); ?>(<?php echo htmlentities($row['price']); ?>)"><?php echo htmlentities($row['coating']); ?>(₹<?php echo htmlentities($row['price']); ?>)</option>
        <?php
    }
}
?>
              </select>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Coating Point</label>
									<div class="col-sm-8">
								<select name="carcoatingpoint" required class="form-control">
                <option value="">Select Coating Point</option>
				<?php
				$mysqli = new mysqli("localhost", "root", "", "ccms");

				// Check connection
				if ($mysqli->connect_errno) {
					echo "Failed to connect to MySQL: " . $mysqli->connect_error;
					exit();
				}

$sql = "SELECT * FROM tblcoatingpoints";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['coatingPointName']) . ' (' . htmlentities($row['coatingPointAddress']) . ')'; ?></option>
        <?php
    }
}
?>

				
            </select>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Full Name</label>
									<div class="col-sm-8">
										<input type="text" name="fname" class="form-control" required placeholder="Full Name">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Number Plate</label>
									<div class="col-sm-8">
										<input type="text" name="noplat" class="form-control" required placeholder="Number plate">
									</div>
								</div>								

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile No</label>
									<div class="col-sm-8">
										<input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No.">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Coating Date</label>
									<div class="col-sm-8">
									<input type="date" name="coatingdate" required class="form-control">
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Coating Time</label>
									<div class="col-sm-8">
										<input type="time" name="coatingtime" required class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Message (if any)</label>
									<div class="col-sm-8">
								<textarea name="message"  class="form-control" placeholder="Message if any"></textarea>
									</div>
								</div>
														
	

					
								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="book" class="btn-warning btn">Add</button>

				<button type="reset" class="btn">Reset</button>
			</div>
		</div>
						
						
						
					</div>
					
					</form>  
      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
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

</body>
</html>
<?php } ?>