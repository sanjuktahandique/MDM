<?php 
ob_start();
session_start();
$username = $_SESSION['username'];
?>
<?php 
$con=mysqli_connect("localhost","root","","school");
$tname="";
if(isset($_GET['username']))
    $username=$_GET['username'];
else

    $sql="SELECT * FROM `create` WHERE username='$username'";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result))
    {
        $tname=$row['tname'];
    }

?>
<?php  
$sdate="";
$sdate = date("d-m-Y");
$result='';
  if(isset($_POST['insert'])){

    extract($_POST);
    if($total<=$ptotal){
$result='<div class="alert alert-success">Value is greater than Total Enrollment</div>';
    }else{
       
    $mysqli = new mysqli("localhost",'root','','school');
     $sql="SELECT * FROM `class` WHERE cdate='$sdate' AND class='$class'";
    $search_result = mysqli_query($con, $sql);
    if(mysqli_num_rows($search_result) > 0)
    {
       $result='<div class="alert alert-success">Class already added</div>'; 
    }else{
    $sql = "INSERT INTO `class`(`cdate`, `tname`, `class`, `total`, `ptotoal`, `status`) VALUES ('$cdate','$tname','$class','$total','$ptotal','$status')";
    $res = $mysqli->query($sql);
    if($res>0)
    {
        $result='<div class="alert alert-success">Data Inserted Successfully</div>';
          //header("location: index.php");   
    }else{
        $result='<div class="alert alert-success">Invalid Entry</div>';
    }
  }
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
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
    
     
</head>
<script type = "text/javascript" 
         src = "https://www.tutorialspoint.com/jquery/jquery-3.6.0.js">
      </script>

<body>
    
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        
                        <li>
                            <a title="Landing Page" href="thome.php" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Manage Class</span></a>
                        </li>
                        
                         <li>
                            <a title="Landing Page" href="tlogin.php" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Logout</span></a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    
    <div class="all-content-wrapper">
        
        <div class="header-advance-area">
            
            <!-- Mobile Menu start -->
     <center><h2>Rashtra Bhasha Deep Vidyalaya</h2></center> 
            <center><h3>Mid-Day Meal Regulation System</h3></center>
            <!-- Mobile Menu end -->
            
        </div>
        <!-- Basic Form Start -->
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    
                    </div>
                </div>
                <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Manage Class</h1>
                                     <strong><?php echo $result; ?></strong>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="thome.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date</label>
      <input type="text" class="form-control" id="cdate" name="cdate" value="<?php echo date("d-m-Y"); ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Teacher Name</label>
      <input type="text" readonly class="form-control" id="tname" value="<?php echo $tname; ?>" name="tname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Class Name</label>
      <select class="form-control" id="class" name="class">
        <option value="">Select Any</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Total Student</label>
      <input type="text" class="form-control" id="total" name="total" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Present Student</label>
      <input type="text" class="form-control" id="ptotal" name="ptotal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
      <input type="hidden" name="status" value="Applied">
    </div>
  </div>
  </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="form-row">
     <div class="form-group col-md-6">
  <button type="submit" name="insert" class="btn btn-primary">Submit</button>
</div>
</div>
</form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br>
        <!-- Basic Form End-->
        
    </div>

    
    

</body>

</html>