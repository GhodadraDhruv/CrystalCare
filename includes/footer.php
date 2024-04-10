<style>
    .b{
           background-color:#ff66cc; 
    }
    .s{
        background-color:#ff66cc;
        color:white;
        padding:40px;
    }    
</style>
<div class="b footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-contact">
                            <h2>Get In Touch</h2>
                            <?php 
                            
    $mysqli = new mysqli("localhost", "root", "", "ccms");
$sql = "SELECT * FROM tblpages WHERE type='contact'";
$query = $mysqli->query($sql);

if ($query) {
    while ($result = $query->fetch_object()) {
?>

<p><i class="fa fa-map-marker-alt"></i><?php echo $result->detail; ?></p>
<p><i class="fa fa-phone-alt"></i>+<?php echo $result->phoneNumber; ?></p>
<p><i class="fa fa-envelope"></i><?php echo $result->emailId; ?></p>

<?php 
    }
    $query->close(); // Close the query
} 
?>

                            <div class="footer-social">
                                <a class="btn" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                <a class="btn" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                              <a href="index.php">Home</a>
                            <a href="about.php">About Us</a>
                            <a href="coating-plans.php">Coating Plans</a>
                            <a href="location.php">Coating Points</a>
                            <a href="contact.php">Contact Us</a>
                            <a href="more-enquire.php">More Enquiry</a>                     
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="container copyright">
                <p><a href="index.php">Crystal Care</a></p>
            </div>
            
        </div>
        
      </div>
      

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>   