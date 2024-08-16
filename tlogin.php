<?php
$result="";
$con=new mysqli("localhost", "root", "", "school");
    ob_start();
    session_start();
    
    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
       $password = $_POST['password'];
        $check_email = "SELECT * FROM `create` WHERE username = '$username' AND password='$password'";
        $check_email_run = mysqli_query($con, $check_email);
        $result = mysqli_num_rows($check_email_run);
        if($result > 0)
        {
            $row1 = mysqli_fetch_assoc($check_email_run);
            $username=$row1['username'];
            $password=$row1['password'];
            header('Location: thome.php');
        $_SESSION['username'] = $username;
        
        }
        else
        {
            $result='<div class="alert alert-success">Invalid Login</div>';

  } 
}


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MDM Regulation System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    
     

</head>

<body>
    
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
                <img src="1.png" class="img-fluid" alt="Responsive image">
				<h3>Teacher Login</h3>
				
                <strong><?php echo $result; ?></strong>
			</div>

                
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="tlogin.php" method="POST" id="f1" >
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                
                                
                            </div>
                            <div class="text-center">
                                <input type="submit" name="login" class="btn btn-success loginbtn" value="Login">

                             <a href="create.php" class="btn btn-success loginbtn">Create</a>  

                                                        <a class="btn btn-default btn-block" href="index.php">Admin Login</a>
                            </div>
                        </form>
                    </div>

                </div>

			</div>

			
		</div>   
    </div>

    
    
    
</body>

</html>