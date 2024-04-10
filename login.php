<?php
session_start();
include('includes/config.php');

if(isset($_POST['login'])) {
    $uname = $_POST['email'];
    $password = $_POST['Password'];

    $sql = "SELECT email, Password FROM registration WHERE email=? AND password=?";
    $stmt = $mysqli->prepare($sql);

    // Bind parameters
    $stmt->bind_param('ss', $uname, $password);

    // Execute query
    $stmt->execute();

    // Store result
    $stmt->store_result();

    if($stmt->num_rows > 0) {
        $_SESSION['alogin'] = $_POST['email'];
        echo "<script>alert('Login successfully...');
                window.location.href='index.php';
              </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }

    // Close statement
    $stmt->close();
}
?>

<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap1.css" />
  <style type="text/css">
    .x{
      margin-top: 10px;
    }
    .d{
      margin-top: 200px;
    }
    
  </style>
</head>
<div class="x">
<body style="background-color:skyblue;">
  <div class="container d">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <h1>Login</h1>
        </div>
        <div class="panel-body">
          <form method="post">
            <div class="form-group">
              <label for="email">E-Mail:</label>
              <input type="email" class="form-control" id="email" name="email" />
            </div>
            <div class="form-group">
              <label for="Password">Password:</label>
              <input type="password" class="form-control" id="Password" name="Password" />
            </div>
            
            <input type="submit" value="Login" name="login" class="btn btn-primary" />
          </form>
          
        </div>
        
        <div class="panel-footer text-right">
          <small>&copy; Dhruv ghodadra</small>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
</html>