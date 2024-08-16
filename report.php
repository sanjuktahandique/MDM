
<?php include('functions.php'); ?>
<?php 
error_reporting(0);
$n = 3;
function getRandomString($n)
{
  $characters = '0123456789ABCDEF';
  $randomString = 'RBDV-';

  for ($i = 0; $i < $n; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $randomString .= $characters[$index];
  }

  return $randomString;
}
?>
<?php
$mm = new PDO('mysql:host=localhost;dbname=school','root', '');
?>

<?php
//$result='';
 if(isset($_POST["insert"]))
  { 
    
    $statement = $mm->prepare("
      INSERT INTO `report`(`form_id`,`month`, `year`, `scode`, `sname`, `stype`, `category`, `area`, `ward`, `state`, `block`, `shg`, `district`, `kitchen`, `tenrol`, `primary1`, `primary2`, `primary3`, `aopening`, `ramount`, `expenditure`, `cbalance`, `ropening`, `fgrain`, `consumption`, `cbalance1`) VALUES
      (:form_id,:month, :year, :scode, :sname, :stype, :category, :area, :ward, :state, :block, :shg, :district, :kitchen, :tenrol, :primary1, :primary2, :primary3, :aopening, :ramount, :expenditure, :cbalance, :ropening,:fgrain, :consumption, :cbalance1)
    ");
$statement->execute(
      array(
          ':form_id'               =>  trim($_POST["form_id"]),
          ':month'               =>  trim($_POST["month"]),
          ':year'               =>  trim($_POST["year"]),
          ':scode'               =>  trim($_POST["scode"]),
          ':sname'               =>  trim($_POST["sname"]),
          ':stype'               =>  trim($_POST["stype"]),
          ':category'               =>  trim($_POST["category"]),
          ':area'               =>  trim($_POST["area"]),
          ':ward'               =>  trim($_POST["ward"]),
          ':state'               =>  trim($_POST["state"]),
          ':block'               =>  trim($_POST["block"]),
          ':shg'               =>  trim($_POST["shg"]),
          ':district'               =>  trim($_POST["district"]),
          ':kitchen'               =>  trim($_POST["kitchen"]),
          ':tenrol'               =>  trim($_POST["tenrol"]),
          ':primary1'               =>  trim($_POST["primary1"]),
          ':primary2'               =>  trim($_POST["primary2"]),
          ':primary3'               =>  trim($_POST["primary3"]),
          ':aopening'               =>  trim($_POST["aopening"]),
          ':ramount'               =>  trim($_POST["ramount"]),
          ':expenditure'               =>  trim($_POST["expenditure"]),
          ':cbalance'               =>  trim($_POST["cbalance"]),
          ':ropening'               =>  trim($_POST["ropening"]),
          ':fgrain'               =>  trim($_POST["fgrain"]),
          ':consumption'               =>  trim($_POST["consumption"]),
          ':cbalance1'               =>  trim($_POST["cbalance1"]),
          )
    );

    
    $statement = $mm->query("SELECT LAST_INSERT_ID()");
    $rid = $statement->fetchColumn();
     
      
      for($count=0; $count<$_POST["total_row"]; $count++)
      {

        $statement = $mm->prepare("
         INSERT INTO `report1`(`rid`, `cname`, `gender`, `castecategory`, `mop`, `receivedamount`) VALUES
         (:rid, :cname, :gender, :castecategory, :mop, :receivedamount)
          ");

        $statement->execute(
          array(
            ':rid'  =>  $rid,
            ':cname'  =>  trim($_POST["cname"][$count]),
            ':gender'  =>  trim($_POST["gender"][$count]),
            ':castecategory'  =>  trim($_POST["castecategory"][$count]),
            ':mop'  =>  trim($_POST["mop"][$count]),
            ':receivedamount'  =>  trim($_POST["receivedamount"][$count]),
            
            
            
          )
        );
      }
      header("Location:stock.php");
      //$result='<div class="alert alert-success">Data Inserted Successfully</div>';
  }
?>
<?php require_once 'db_connect.php';?>
<?php include("header.php"); ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        
       <center><h2>Rashtra Bhasha Deep Vidyalaya</h2></center> 
            <center><h3>Mid-Day Meal Regulation System</h3></center>
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
                <form action="report.php" id="loginForm" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <center><h1>School Monthly Data Capture Format</h1></center>
                                     <strong>Form ID:</strong> <?php echo getRandomString($n); ?>
                                     <input type="hidden" name="form_id" id="form_id" value="<?php echo getRandomString($n); ?>">
                                     <br><br><br>  
                                     
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                 
                                    <h4>1.School Details</h4>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Month</label>
      <input type="text" class="form-control" id="month" name="month" readonly value="<?php echo date("F"); ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Year</label>
      <input type="text" class="form-control" id="year" name="year" value="<?php echo date("Y") ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">School Code</label>
      <input type="text" class="form-control" id="scode" name="scode" value="18150105701" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">School Name</label>
      <input type="text" class="form-control" id="sname" name="sname" value="Rashtra Bhasha Deep Vidhyalaya (L.P)" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">School Type</label>
      <select class="form-control" id="stype" name="stype">
        <option>Select Any</option>
        <option value="Government">Government</option>
        <option value="Local Body">Local Body</option>
        <option value="EGS/AIE Centres">EGS/AIE Centres</option>
        <option value="NCLP">NCLP</option>
        <option value="Madras/Maqtab">Madras/Maqtab</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Category</label>
      <select class="form-control" id="category" name="category">
        <option>Select Any</option>
        <option value="Primary">Primary</option>
        <option value="Upper Primary">Upper Primary</option>
        <option value="Primary with Upper Primary">Primary with Upper Primary</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Area</label>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="area" id="area" value="Rural">
  <label class="form-check-label" for="inlineRadio1">Rural</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="area" id="area" value="Urban">
  <label class="form-check-label" for="inlineRadio2">Urban</label>
  <br>
  <label for="inputPassword4">State</label>
      <input type="text" class="form-control" id="state" name="state" value="Assam" readonly>
      <br>
  <label for="inputPassword4">NGO/SHG</label>
      <input type="text" class="form-control" id="shg" name="shg" value="SHG" readonly>
      <br>
      <label for="inputPassword4">Type of Kitchen</label>
      <input type="text" class="form-control" id="kitchen" name="kitchen"  value="Pakka" readonly>
      
</div>
    </div>
    <?php 
     $res = 0;
     $mysqli = new mysqli("localhost","root","","school");
     $sdate = date("d-m-Y");
     $result = $mysqli->query("SELECT SUM(total) FROM `class` WHERE cdate='$sdate'");
     while($row=$result->fetch_assoc()){
      $res = $row['SUM(total)'];
     }
     ?>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Village/Ward</label>
      <input type="text" class="form-control" id="ward" name="ward" value="Ward No-9(Kalibari Road)" readonly>
      <br>
      <label for="inputPassword4">Block</label>
      <input type="text" class="form-control" id="block" name="block" value="Barbarua" readonly>
      <br>
      <label for="inputPassword4">District</label>
      <input type="text" class="form-control" id="district" name="district" value="Dibrugarh" readonly>
      <br>
      <label for="inputPassword4">Total Enrollment</label>
      <input type="text" class="form-control" id="tenrol" name="tenrol" readonly value="<?php echo $res; ?> ">
      
    </div>
  </div>
  

                                            </div>
                                            <h4>2.Meal Availed Status</h4>
                                            <table class="table table-bordered  table-responsive">
  <thead>
    <tr>
      <th scope="col">Head</th>
      <th scope="col">Primary</th>
      
      
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>i)Number of School Days during Month</td>
      <td><input type="number" name="primary1" id="primary1" required></td>
      
    </tr>
    <tr>
      
      <td>ii)Actual Number of Days Mid Day Meal Served</td>
      <td><input type="number" name="primary2" id="primary2" required></td>
      
    </tr>
    <tr>
      
      <td>iii)Total Meals served during the Month</td>
      <td><input type="number" name="primary3" id="primary3" required></td>
      
    </tr>
</tbody>
</table>
<h4>3.Cook Cum Helper Amount Details (in Rs.)</h4>
<table id="outward-table" class="table table-bordered  table-responsive" style="width:1060px;">
<tr>                            
                                <th bgcolor="#F0F3F4 ">Sl.No</th>
                              <th bgcolor="#F0F3F4 ">Cook-cum-helper Name</th>
                              <th bgcolor="#F0F3F4 ">Gender(M/F)</th>
                              <th bgcolor="#F0F3F4 ">Category (SC/ST/OBC/General)</th>
                              <th bgcolor="#F0F3F4 ">Mode of Payment(Cash/Bank)</th>
                               <th bgcolor="#F0F3F4 ">Amount Received during the month(Rs.)</th>
                              <th bgcolor="#F0F3F4" rowspan="1">Delete</th>
                             
                             
                            </tr>
                            
                            <tr>
                               
<td>1</td>
                            <td><input class="form-control input-sm cname" required id="cname" name="cname[]"  type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode === 32)" /></td>
                            <td><input class="form-control input-sm gender" required id="gender" name="gender[]"  type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"/></td>
                            <td><input class="form-control input-sm castecategory" required id="castecategory" name="castecategory[]"  type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"/></td>
                            <td><input class="form-control input-sm mop" id="mop" required name="mop[]"  type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"/></td>
                            <td><input class="form-control input-sm receivedamount" required id="receivedamount" name="receivedamount[]"  type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/></td>
                             <td><button type="button"  class="btn btn-danger remove_row">X</button></td>
                               </tr>
                                </table>
                                 <br>
                            
                            
                            
        
                            
    
<div align="right">
                                            <button  type="button" name="add_row" id="add_row" class="btn btn-success">Add Row</button>
                            </div>  
<table align="right">
<tr>
                                    
                                   
 </tr>
                     <br>
                      <tr>
                                    <td colspan="2" align="center">
                                        <input type="hidden" name="final_total" id="final_total" value=""/>
                                        <input type="hidden"  name="total_row" id="total_row" value="1"/>
                          
                                        
                                    </td>
                      </tr>
                               
</table>  
                  <?php 
                  $month="";
$month=date("F");
$previous = date('F', strtotime('-1 month'));
$cbalance="";
$balance="";
$sql = mysqli_query($con, "SELECT bamount AS balance FROM `stock` WHERE month='$previous' ORDER BY `id` DESC");
//$sql = mysqli_query($con, "SELECT bamount AS balance FROM `stock` WHERE month='$month' ORDER BY id DESC"); 
$row = mysqli_fetch_assoc($sql); 
$balancesum = $row['balance'];
$sql = mysqli_query($con, "SELECT SUM(amountreceived) AS amount FROM `stock` WHERE atype='Received' AND month='$month'"); 
$row = mysqli_fetch_assoc($sql); 
$amountsum = $row['amount'];
$sql = mysqli_query($con, "SELECT SUM(amountreceived) AS aexpend FROM `stock` WHERE atype='Expenditure' AND month='$month'"); 
$row = mysqli_fetch_assoc($sql); 
$amountexpend = $row['aexpend'];

$cbalance=($balancesum+$amountsum)-$amountexpend;
//$balance=$row['balance'];
//$cbalance=$balancesum;



?>
                  <h4>4.Cooking Coast Details(in Rs.) for Primary</h4>
                                            <table class="table table-bordered  table-responsive">
  <thead>
    <tr>
      <th scope="col">Opening Balance</th>
      <th scope="col">Amount received during the month</th>
      <th scope="col">Expenditure during the month</th>
      <th scope="col">Closing Balance</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      
     
      <td><input type="text" readonly name="aopening" id="aopening" value="<?php echo $balancesum; ?>"></td>
      <td><input type="text" readonly name="ramount" id="ramount" value="<?php echo $amountsum; ?>"></td>
      <td><input type="text" readonly name="expenditure" id="expenditure" value="<?php echo $amountexpend; ?>"></td>
      <td><input type="text" readonly name="cbalance" id="cbalance" value="<?php echo $cbalance; ?>"></td>
    </tr>
    
    
</tbody>
</table>
 <?php 

$month="";
$month=date("F");
$previous = date('F', strtotime('-1 month'));
$cbalance="";
$cbalance1="";
$sql = mysqli_query($con, "SELECT bquantity AS rbalance FROM `stock` WHERE month='$previous' ORDER BY `id` DESC"); 
$row = mysqli_fetch_assoc($sql); 
$quantitybalance = $row['rbalance'];
$sql = mysqli_query($con, "SELECT SUM(rexpenditure) AS eamount FROM `stock` WHERE btype='Received' AND month='$month'"); 
$row = mysqli_fetch_assoc($sql); 
$rquantity = $row['eamount'];
$sql = mysqli_query($con, "SELECT SUM(rexpenditure) AS rexpend FROM `stock` WHERE btype='Expenditure' AND month='$month'"); 
$row = mysqli_fetch_assoc($sql); 
$rexpend = $row['rexpend'];

$cbalance1=($quantitybalance+$rquantity)-$rexpend;
//$cbalance1=$quantitybalance;
//$connect->close();


?>
 <h4>5.Details of food grain(in KG) for Primary</h4>
                                            <table class="table table-bordered  table-responsive">
  <thead>
    <tr>
      <th scope="col">Opening Balance</th>
      <th scope="col">Food Grain Received during the month</th>
      <th scope="col">Consumption during the month</th>
      <th scope="col">Closing Balance</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      
     
      <td><input type="text" readonly name="ropening" id="roepening" value="<?php echo $quantitybalance; ?>"></td>
      <td><input type="text" readonly name="fgrain" name="fgrain" value="<?php echo $rquantity; ?>"></td>
      <td><input type="text" readonly name="consumption" id="consumption" value="<?php echo $rexpend; ?>"></td>
      <td><input type="text" readonly name="cbalance1" id="cbalance1" value="<?php echo $cbalance1; ?>"></td>
    </tr>
    
    
</tbody>
</table>


<center><button class="btn btn-success" name="insert">Submit</button></center>

                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- Basic Form End-->
        
    </div>
<script>
  function afunction(val){
    return val.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')
  }
        $(document).ready(function(){
                   
                    var count = 1;
                    $(document).on('click', '#add_row', function(){
                        count = count+1;
                        $('#total_row').val(count);
                        var html_code = '';
                       html_code +='<tr id="row_id_'+count+'">';
                        html_code +='<td>'+count+'</td>';
                        
                        html_code +='<td><input type="text" name="cname[]" id="cname'+count+'" data-srno="'+count+'" class="form-control input-sm cname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) ||  (event.charCode === 32)" /></td>';
                        html_code +='<td><input type="text" name="gender[]" id="gender'+count+'" data-srno="'+count+'" class="form-control input-sm gender" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" /></td>';
                        html_code +='<td><input type="text" name="castecategory[]" id="castecategory'+count+'" data-srno="'+count+'" class="form-control input-sm castecategory" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"  /></td>';
                        html_code +='<td><input type="text" name="mop[]" id="mop'+count+'" data-srno="'+count+'" class="form-control input-sm mop" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"  /></td>';
                        html_code +='<td><input type="text" name="receivedamount[]" id="receivedamount'+count+'" data-srno="'+count+'" class="form-control input-sm receivedamount" oninput="this.value = afunction(this.value)" /></td>';
                        html_code +='<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger remove_row">X</button></td></tr>';
                        
                        $('#outward-table').append(html_code);

             
                    });
                    $(document).on('click', '.remove_row', function(){
                        var row_id = $(this).attr("id");
                       
                        $('#row_id_'+row_id).remove();
                        count--;
                        $('#total_row').val(count);
                    });
                    function cal_final_total(count){
                        var final_total_article = 0;
                        var grand_total_quintle = 0;
                       
                        for( j=1; j<=count; j++){
                            var article = 0;
                            var qtl = 0;
                            var kg1 = 0;
                            article = $('#article'+j).val();
                             qtl = $('#quintle'+j).val();
                             kg1 = $('#kg'+j).val();
                            
                            if(article > 0){
                                    final_total_article = parseFloat(final_total_article)+parseFloat(article);
                                    }
                                    if(qtl > 0){
                                    grand_total_quintle = parseFloat(grand_total_quintle)+parseFloat(qtl);
                                }
                                if(kg1 > 0){
                                    grand_total_kg = parseFloat(grand_total_kg)+parseFloat(kg1);
                                }
                        }
                        $('#final_total_article').text(final_total_article);
                        
                        
                    }
                    $(document).on('blur', '.article', function(){
                    cal_final_total(count); 
                });
                    $(document).on('blur', '.quintle', function(){
                    cal_final_total(count); 
                });
                $(document).on('blur', '.kg', function(){
                    cal_final_total(count); 
                });
                });
       
      </script>
    
    
 
  

<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>




</html>