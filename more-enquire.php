<?php
session_start();
// error_reporting(0);
include('includes/config.php');

if (isset($_POST['submit'])) {
    $ptype = $_POST['name'];
    $wpoint = $_POST['address'];
    $fname = $_POST['call'];
    $mobile = $_POST['enquiry'];
    $bno = mt_rand(100000000, 999999999);


   

    $sql = "INSERT INTO tblbunkenquiry(name,address,phonenumber,enquiry) VALUES(?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
   
     // Bind parameters
     $stmt->bind_param('ssis', $ptype, $wpoint, $fname, $mobile);

     // Execute statement
     if ($stmt->execute()) {
         $lastInsertId = $mysqli->insert_id; 
         if ($lastInsertId) {
             echo "<script>alert('Query sent successfully');</script>";
             echo "<script>window.location.href ='more-enquire.php'</script>";
         } else {
             echo "<script>alert('Something went wrong. Please try again.');</script>";
         }
     } else {
         echo "<script>alert('Error executing query: " . $mysqli->error . "');</script>";
     }
 
     // Close statement
     $stmt->close();
 }
 
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Crystal Care | More Enquiry</title>
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
        .s{
            height:480px;
            width:550px;
        }
        </style>
    </head>

    <body> <?php include_once('includes/header.php');?>
    <div class="k page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Enquiry Form</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="more-enquire.php">Enquiry Form</a>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Get In Touch</p>
                    <h2>More Enquiry</h2>
                </div>
                <div class="row">
                <?php 
$sql = "SELECT * FROM tblpages WHERE type='contact'";
$query = $mysqli->query($sql);

if ($query) {
    while ($result = $query->fetch_object()) {
?>

<div class="col-6">
        <img class="s" src="img/enq.png">  
        </div>



<?php 
    }
    $query->close(); // Close the query
} 
?>

                    <div class="col-md-6">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="sentMessage" id="contactForm" method="post">
                                <div class="control-group">
                                <b>Name:</b>   <input type="text" class="form-control" id="name" placeholder="Enter Your Name" required="required" name="name" /><br />
                           
                                </div>
                                <div class="control-group">
                                <b>Address:</b> <input type="text" class="form-control" id="address" placeholder="Enter Your Address" name="address" required="required"  /> <br />
                                
                                </div>
                                <div class="control-group">
                                <b>Phone Number:</b> <input type="text" class="form-control" id="call" placeholder="Enter Phone Number" required="required" name="call" /> <br />
                       
                                </div>
                                <div class="control-group">
                                   <b>Message:</b><textarea class="form-control" id="enquiry" placeholder="Enter Your Enquiry" required="required" name="enquiry" ></textarea><br />
                 
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit" id="button" name="submit">Send Enquiry</button>    
                                </div>
                            </form>
                        </div>
                    </div>
           
                </div>
            </div>
        </div>
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