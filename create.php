<?php  
$result='';
$mysqli = new mysqli("localhost",'root','','school');
  if(isset($_POST['insert'])){
     
    extract($_POST);
    $sql="SELECT * FROM `create` WHERE username='$username'";
    $search_result = mysqli_query($mysqli, $sql);
    if(mysqli_num_rows($search_result) > 0)
    {
       $result='<div class="alert alert-success">Username Exists</div>'; 
    }else if($password!=$cpassword) {
$result='<div class="alert alert-success">Password Mismatch</div>';
    }
        else{    
   
    $sql = "INSERT INTO `create`(`tname`, `username`, `password`) VALUES ('$tname','$username','$password')";
    $res = $mysqli->query($sql);
          header("location: tlogin.php");   
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
				<h3>Create Account</h3>
                <strong><?php echo $result; ?></strong>
			</div>

                
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="create.php" method="POST" id="f1" >
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Name of Teacher</label>
                                    <input type="text" class="form-control" id="tname" name="tname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div> 
                                <div class="form-group col-lg-12">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword">
                                </div>  
                            </div>
                            <div class="text-center">
                                <input type="submit" name="insert" class="btn btn-success loginbtn" value="Create">                            
                            </div>
                        </form>
                    </div>

                </div>

			</div>

			
		</div>   
    </div>
    
    
</body>

</html>