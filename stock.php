<?php  
$result='';
  if(isset($_POST['insert'])){
    extract($_POST);   
    $mysqli = new mysqli("localhost",'root','','school');
    if($_POST['type']=='Received' && $_POST['type1']=='Received')
    {
    $sql = "INSERT INTO `stock`(`sdate`, `year`, `month`, `tenrol`, `smdm`, `amountreceived`, `bamount`, `atype`, `btype`, `rexpenditure`, `bquantity`) VALUES ('$sdate','$year','$month','$tenrol','$smdm','$amountreceived','$bamount','$type','$type1','$rexpenditure','$bquantity')";
    $res = $mysqli->query($sql);
    if($res>0)
    {
        $result='<div class="alert alert-success">Data Inserted Successfully</div>';
          //header("location: index.php");   
    }else{
        $result='<div class="alert alert-success">Invalid Entry</div>';
    }
}else if($_POST['type']=='Expenditure' && $_POST['type1']=='Expenditure')
{   extract($_POST);
     $sql="SELECT * FROM `stock` WHERE (sdate='$sdate' AND atype='$type') AND btype='$type1'";
    $search_result = mysqli_query($mysqli, $sql);
    if(mysqli_num_rows($search_result) > 0)
    {
       $result='<div class="alert alert-success">Already Expended on this Date</div>'; 
    }else{
    $sql = "INSERT INTO `stock`(`sdate`, `year`, `month`, `tenrol`, `smdm`, `amountreceived`, `bamount`, `atype`, `btype`, `rexpenditure`, `bquantity`) VALUES ('$sdate','$year','$month','$tenrol','$smdm','$cal','$bamount','$type','$type1','$calc','$bquantity')";
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
  if($_POST['type']=='Received' && $_POST['type1']=='Expenditure')
    {
        extract($_POST);
        $sql="SELECT * FROM `stock` WHERE (sdate='$sdate' AND atype='$type') AND btype='$type1' ";
    $search_result = mysqli_query($mysqli, $sql);
    if(mysqli_num_rows($search_result) > 0)
    {
       $result='<div class="alert alert-success">Already Expended on this Date</div>'; 
    }else{
    $sql = "INSERT INTO `stock`(`sdate`, `year`, `month`, `tenrol`, `smdm`, `amountreceived`, `bamount`, `atype`, `btype`, `rexpenditure`, `bquantity`) VALUES ('$sdate','$year','$month','$tenrol','$smdm','$amountreceived','$bamount','$type','$type1','$calc','$bquantity')";
    $res = $mysqli->query($sql);
    if($res>0)
    {
        $result='<div class="alert alert-success">Data Inserted Successfully</div>';
          //header("location: index.php");   
    }else{
        $result='<div class="alert alert-success">Invalid Entry</div>';
    }
}
}else if($_POST['type']=='Expenditure' && $_POST['type1']=='Received')
{
    extract($_POST);
    $sql="SELECT * FROM `stock` WHERE (sdate='$sdate' AND atype='$type') AND btype='$type1' ";
    $search_result = mysqli_query($mysqli, $sql);
    if(mysqli_num_rows($search_result) > 0)
    {
       $result='<div class="alert alert-success">Already Expended on this Date</div>'; 
    }else{
    $sql = "INSERT INTO `stock`(`sdate`, `year`, `month`, `tenrol`, `smdm`, `amountreceived`, `bamount`, `atype`, `btype`, `rexpenditure`, `bquantity`) VALUES ('$sdate','$year','$month','$tenrol','$smdm','$cal','$bamount','$type','$type1','$rexpenditure','$bquantity')";
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

<?php include("header.php"); ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                      
                    </div>
                </div>
            </div>
        </div>
        <script>
    function addNumbers() {
      var num1 = parseFloat(document.getElementById("amountreceived").value);
      var num2 = parseFloat(document.getElementById("amountbalance").value);
      var num3 = parseFloat(document.getElementById("smdm").value);
       var dropdown = document.getElementById("type");
      var selectedOption = dropdown.options[dropdown.selectedIndex].value;
      if (selectedOption === "Received") {
        if (num1<0) {
            alert('!Error');
        //num1.value="";
        document.getElementById("amountreceived").value = " ";
    }else{
      var result = (num1 + num2);
      document.getElementById("bamount").value = Math.round(result*100)/100;
  }
    }else if(selectedOption === "Expenditure"){
        if (num1>num2) {
           alert("!Error|| Enter value less than" +num2);
        //num1.value = "";
        document.getElementById("amountreceived").value = " ";
        }else{
            
            var x = num1*num3;
      document.getElementById("cal").value = x;
      var num4 = parseFloat(document.getElementById("cal").value);
      if(num2<num4)
      {
       alert('!Not Sufficient Amount'); 
       document.getElementById("amountreceived").value = " ";
      }else{
        var result = num2-x;
        document.getElementById("bamount").value = Math.round(result*100)/100;
      }
    }
}
}


function addNumber() {
      var a = parseFloat(document.getElementById("rexpenditure").value);
      var b = parseFloat(document.getElementById("rreceived").value);
      var c = parseFloat(document.getElementById("smdm").value);
       var dropdown1 = document.getElementById("type1");
      var select = dropdown1.options[dropdown1.selectedIndex].value;
      if (select === "Received") {
        if (a<0) {
            alert('!Error');
         
    }else{
      var result1 = a + b;
      document.getElementById("bquantity").value =  Math.round(result1*100)/100;
  }
    }else if(select === "Expenditure"){
        if (a>b) {
           alert("!Error|| Enter value less than" +b);
           document.getElementById("rexpenditure").value = " ";
        //a.value = "";
        
        }else{
            var i = a*c;
      document.getElementById("calc").value = i;
      var j = parseFloat(document.getElementById("calc").value);
      if(b<j)
      {
       alert('!Not Sufficient Quantity'); 
        document.getElementById("rexpenditure").value = " ";
      }else{
            var result1 = b - i;
      
      document.getElementById("bquantity").value =  Math.round(result1*100)/100;
      }
    }
}
}


function validate() {
      var x = parseFloat(document.getElementById("tenrol").value);
      var y = parseFloat(document.getElementById("smdm").value);
      if (x<0) {
        alert("No Negative Value");
          document.getElementById("tenrol").value = "";
        return false;
        }
      if(y>x){
        alert("Error! Value Bigger than Enrollment click 'OK'");
        document.getElementById("smdm").value = " ";
        }
}


const numInput = document.querySelector("input[type='text']");

numInput.addEventListener("input", () => {
  if (!/^\d+$/.test(numInput.value)) {
    alert("Input must be a number!");
  }
});
  </script>
        <div class="header-advance-area">
            <center><h2>Rashtra Bhasha Deep Vidyalaya</h2></center> 
            <center><h3>Mid-Day Meal Regulation System</h3></center>
            <!-- Mobile Menu start -->
    
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
                                    <h1>Stock Information</h1>
                                     <strong><?php echo $result; ?></strong>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="stock.php" method="POST">
                                                    <?php 
                                                    $tenroll="";
                                                    $smdm="";
                                                    $con = new mysqli("localhost",'root','','school');
                                        if(isset($_POST['search'])){
                                            $count = 1;
                                        //$_POST['station_feature']="";
                                            //if(!empty($_POST['station_category'])||(!empty($_POST['station_feature']))||(!empty($_POST['station_name']))){
                                        
                                             //when no filter is selected
                                            if((isset($_POST['sdate'])) && $_POST['sdate']!=""):
                                                $sdate = $_POST['sdate']; 
                                                $sql="SELECT SUM(total) AS total, SUM(ptotoal) AS ptotal FROM class WHERE cdate='$sdate'";

                                            endif;
                                            
                                            
                                            
                                                
                                         $run_q = mysqli_query($con, $sql);
                                            while($row  = mysqli_fetch_assoc($run_q)){
                                                
                                               $tenroll=$row['total'];
                                               $smdm=$row['ptotal'];
                                           }
                                       }
                                            
                                        ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date</label>
      <!--<input type="date" class="form-control" id="sdate" name="sdate" value="<?php echo isset($_POST['sdate']) ? $_POST['sdate'] : '' ?>">-->
      <input type="text" class="form-control" id="sdate" name="sdate" value="<?php echo date("d-m-Y"); ?>" readonly>
      <br>
      <button type="submit" name="search" class="btn btn-primary" onclick="this.form.submit()">Search</button>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Total Enrollment</label>
      <input type="text" class="form-control" readonly id="tenrol" name="tenrol" value="<?php echo $tenroll; ?>">
      <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
      <input type="hidden" name="month" value="<?php echo date('F'); ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Taken Student MDM</label>
      <input type="text" class="form-control" readonly id="smdm" name="smdm" value="<?php echo $smdm; ?>">
    </div>
   
  </div>
  <br><br><br><br><br><br><br><br>
  <div class="sparkline12-hd">
    <?php 
    $bamount="";
    $bquantity="";
    $id="";
  $localhost = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// db connection
$con = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($con->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}
                    
                      $sql = "SELECT DISTINCT bamount,bquantity,id from `stock` ORDER BY id DESC LIMIT 1";

$run_q = mysqli_query($con, $sql);
                      while($row  = mysqli_fetch_array($run_q)){
                        $bamount=$row['bamount'];
                        $bquantity=$row['bquantity'];
                        $id=$row['id'];
                        } 
                        
?>  
                                <div class="main-sparkline12-hd">
                                    <h1>Amount</h1>
                                </div>
                            </div>
                      <div class="form-row">
    
<div class="form-group col-md-6">
    <label for="inputPassword4">Amount Type</label>
      <select class="form-control" id="type" name="type" onchange="addNumbers()">
        
        <option value="Received">Received</option>
        <option value="Expenditure">Expenditure</option>
      </select>
    </div>
    <div class="form-group col-md-6">
       <label for="inputPassword4">Enter Amount when Received/Expended</label>
      <input type="text" maxlength="6" class="form-control" id="amountreceived" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  onchange="addNumbers()" name="amountreceived">
      
      <input type="hidden" name="cal" id="cal">
      <input type="hidden" name="sid" id="sid" value="<?php echo $id; ?> ">
      <script>
        document.addEventListener("DOMContentLoaded", function() {
        var inputElement = document.getElementById("amountreceived"); 
        inputElement.value = "0";
        });

      </script>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Balance Amount in School Account</label>
      <input type="number" class="form-control" readonly name="amountbalance" id="amountbalance" value="<?php echo $bamount?$bamount:0; ?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Total Amount Left</label>
      <input type="text" class="form-control" id="bamount" readonly name="bamount">
    </div>
    
  </div>      <br><br><br><br><br><br><br><br>
  <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Rice</h1>
                                </div>
                            </div>
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="inputPassword4">Rice Quantity</label>
      <select class="form-control" id="type1" name="type1" onchange="addNumber()">
       
        <option value="Received">Received</option>
        <option value="Expenditure">Expenditure</option>
      </select>
  </div>
      <div class="form-group col-md-6">
      <label for="inputPassword4">Rice Expenditure/Received (In Kilogram)</label>

      <input type="hidden" name="calc" id="calc">
      <input type="text" maxlength="6"  class="form-control"  id="rexpenditure" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  onchange="addNumber()"  name="rexpenditure">
      
      <script>
        document.addEventListener("DOMContentLoaded", function() {
        var inputElement = document.getElementById("rexpenditure"); 
        inputElement.value = "0";
        });

      </script>
    </div>
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Balance Qunatity (In Kilogram)</label>
      <input type="number" class="form-control" readonly name="rreceived" id="rreceived" value="<?php echo $bquantity?$bquantity:0; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Total Qunatity Left(In Kilogram)</label>
      <input type="text" class="form-control" id="bquantity" readonly name="bquantity">
    </div>
    
  </div><br><br><br><br><br><br><br><br>
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
        <!-- Basic Form End-->
        
    </div>

    
    

</body>

</html>