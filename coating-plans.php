<?php
// error_reporting(0);
include('includes/config.php');

if (isset($_POST['book'])) {
    $ptype = $_POST['packagetype'];
    $wpoint = $_POST['coatingpoint'];
    $fname = $_POST['fname'];
    $noplat=$_POST['noplat'];    
    $mobile = $_POST['contactno'];
    $date = $_POST['coatingdate'];
    $time = $_POST['coatingtime'];
    $message = $_POST['message'];
    $status = 'New';
    $bno = mt_rand(100000000, 999999999);

    $conn = new mysqli("localhost", "root", "", "ccms");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tblcarcoatingbooking(bookingId,packageType,carcoatingPoint,fullName,noplate,mobileNumber,coatingDate,coatingTime,message,status) VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isssssssss', $bno, $ptype, $wpoint, $fname, $noplat, $mobile, $date, $time, $message,$status);

    if ($stmt->execute() === TRUE) {
        echo '<script>alert("Your booking done successfully. Booking number is ' . $bno . '")</script>';
        echo "<script>window.location.href ='coating-plans.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Crystal Care | Coating Plans</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style>
        .k{
            background-color:skyblue;
        }
        .q{
            margin-right:20px;
        }
        </style>
    </head>

    <body>
    
        <?php include_once('includes/header.php');?>
        
        <!-- Page Header Start -->
        <div class="k page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Coating Plans</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="coating-plans.php">Coating Plans</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Price Start -->
        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Coating Plan</p>
                    <h2>Choose Your Plan</h2>
                </div>
                
                <?php 
			$SITE="http://localhost/CrystalCare/";
				$con=mysqli_connect("localhost","root","","ccms");
				$sel = "SELECT * FROM tblcoatingplans";
				$res = mysqli_query($con,$sel);
			 	if (mysqli_num_rows($res) > 0)
				{
                    echo "<div class='row'>";
                    while($row = mysqli_fetch_assoc($res))
					{
					echo "<div class='col-md-4'>";
                     echo "<div class='q price-item featured-item'>";
                           echo "<div class='price-header'>";
                                echo "<h3>".$row['coating']."</h3>";
                                echo "<h2><span>₹</span><strong>".$row['price']."</strong></h2>";
                                echo "</div>";
                                echo "<div class='price-body'>";
                                echo "<ul>";
                                echo "<li><i class='far fa-check-circle'></i>Interior Coating</li>";
                                echo "<li><i class='far fa-check-circle'></i>Exterior Painting</li>";
                                echo "<li><i class='far fa-check-circle'></i>Seats washing</li>";
                                echo "<li><i class='far fa-check-circle'></i>Vacuum cleaning</li>";
                                echo "<li><i class='far fa-check-circle'></i>Interior wet cleaning</li>";
                                echo "<li><i class='far fa-check-circle'></i>Window wiping</li>";
                                echo "</ul>";
                                //  echo "<li><i class='far fa-check-circle'></i>".$row['service']."</li>";
                                echo "</div>";
                                echo "<div class='price-footer'>";
                                echo "<a class='btn btn-custom'  data-toggle='modal' data-target='#myModal'>Book Now</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
					}
                    echo "</div>";                
				}
				else
				{
					echo "<script>
					alert('No record found');
					</script>";
				}
				?>                  
                </div>
            </div>

        <!-- Footer Start -->
   <?php include_once('includes/footer.php');?>

<!--Model-->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Car Coating And Painting Booking</h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="packagetype" required class="form-control">
                <option>Package Type</option>
                <?php

 $mysqli = new mysqli("localhost","root","","ccms");

$sql = "SELECT * FROM tblcoatingplans";
$query = $mysqli->query($sql);

if ($query) {
    while ($result = $query->fetch_object()) {
?>
         <option value="<?php echo htmlentities($result->coating); ?> (<?php echo htmlentities($result->price); ?>)"><?php echo htmlentities($result->coating); ?> (₹<?php echo htmlentities($result->price); ?>)</option>
<?php
    }
    $query->close(); // Close the query
} 
?>

              </select>

          <p>
            <select name="coatingpoint" required class="form-control">
                <option>Select Coating Point</option>
                            
<?php $mysqli = new mysqli("localhost","root","","ccms");

$sql = "SELECT * FROM tblcoatingpoints";
$query = $mysqli->query($sql);

if ($query) {
    while ($result = $query->fetch_object()) {
        ?>
    <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->coatingPointName);?> (<?php echo htmlentities($result->coatingPointAddress);?>)</option>
<?php } $query->close(); } ?>
            </select></p>
            <p><input type="text" name="fname" class="form-control" required placeholder="Full Name"></p>
            
            <p><input type="text" name="noplat" class="form-control" required placeholder="No.plate"></p>
            <p><input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No."></p>
            
            <p>Coating Date <br /><input type="date" name="coatingdate" required class="form-control"></p>
             <p>Coating Time <br /><input type="time" name="coatingtime" required class="form-control"></p>
             <p><textarea name="message"  class="form-control" placeholder="Message if any"></textarea></p>
             <p><input type="submit" class="btn btn-custom" name="book" value="Book Now"></p>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>