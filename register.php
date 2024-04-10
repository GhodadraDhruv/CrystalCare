
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <style>
        .m{
            margin-bottom:10px;
        }
        </style>
</head>
<body  style="background-color:purple;">
	<div class="container m vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-25 my-auto shadow">
				<div class="card-header text-center bg-primary text-white">
					<h2>Register</h2>
				</div>
				<div class="card-body">
					<form action="coo.php" method="post">
                    <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" />
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" />
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label for="male" class="radio-inline">
				  <input type="radio" name="gender" value="m" id="Male" />&nbsp;Male</label >&nbsp;&nbsp;&nbsp;
				  
                  <label for="female" class="radio-inline">
				  <input type="radio" name="gender" value="f" id="female" />&nbsp;Female</label>
				  
                 
                </div>
              </div>
			  
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" />
              </div>
			  
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
			  
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="number" class="form-control" id="number" name="number" />
              </div>
			  
						<input type="submit" class="btn btn-primary w-100" value="Register" name="">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>