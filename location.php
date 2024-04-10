<?php error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Crystal Care | Coatting & Painting Points</title>


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
        }>
        </style>
    </head>

    <body>
        <!-- Top Bar Start -->
<?php include_once('includes/header.php');?>
        
        
        <!-- Page Header Start -->
        <div class="k page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Coating Points</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="location.php">Coating Points</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-header text-left">
                            <p>Coating Points</p>
                            <h2>Car Coating & Care Points</h2>
                        </div>
                        <div class="row">
                        <?php
                        $mysqli = new mysqli("localhost","root","","ccms");
// Assuming you have already established a MySQLi database connection
// Replace $mysqli with your MySQLi connection variable

$sql = "SELECT * FROM tblcoatingpoints";
$query = $mysqli->query($sql);

if ($query) {
    while ($result = $query->fetch_object()) {
?>
        <div class="col-md-6">
            <div class="location-item">
                <i class="fa fa-map-marker-alt"></i>
                <div class="location-text">
                    <h3><?php echo htmlentities($result->coatingPointName); ?></h3>
                    <p><?php echo htmlentities($result->coatingPointAddress); ?></p>
                    <p><strong>Call:</strong><?php echo htmlentities($result->contactNumber); ?></p>
                </div>
            </div>
        </div>
<?php
    }
    $query->close(); // Close the query
} 
?></div>
</div>
</div>
</div>
</div>


        <!-- Location End -->
        
        
<?php include_once('includes/footer.php');?>

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