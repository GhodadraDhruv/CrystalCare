<?php
session_start();
include('includes/config.php');
if(isset($_POST['login'])) {
    $mysqli = new mysqli("localhost", "root", "", "ccms");

				// Check connection
				if ($mysqli->connect_errno) {
					echo "Failed to connect to MySQL: " . $mysqli->connect_error;
					exit();
				}
    $uname = $_POST['UserName'];
    $password = $_POST['Password'];
    $sql = "SELECT UserName, Password FROM admin WHERE UserName=? AND Password=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $uname, $password);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0) {
        $_SESSION['alogin'] = $_POST['UserName'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
    $stmt->close();
}
?>

<html>
<head>
<title>Crystal Care</title>
<link href="images/favicon.png" rel="icon">
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="mycss.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
</head>
<body>

<div class="login-form">
    <h2>Admin Login</h2>
    <form method="post">
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Admin Name" name="UserName">
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>  
            <input type="password" placeholder="Password" name="Password">
        </div>
        
        <button type="submit" name="login">Sign In</button>
        <button type="button"><a href="http://localhost/CrystalCare/index.php">Back</a></button>
        
    </form>
</div>
</body>
</html>