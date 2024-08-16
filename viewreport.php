
<?php include('functions.php'); ?>
<?php require_once 'db_connect.php';?>
<?php include("header.php"); ?>
    
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        
        <div class="header-advance-area">
            
           
             <script>
        function printContent() {
            var printContents = document.querySelector('.print-content').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
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
                <center><h2>Rashtra Bhasha Deep Vidyalaya</h2></center> 
            <center><h3>Mid-Day Meal Regulation System</h3></center>
             <center><h1>School Monthly Data Capture Format(Generate)</h1></center>

                <div class="row">
                    <button onClick="window.print()">Print this page</button>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                   
                                    <form action="viewreport.php" method="POST">  
                                        <table>
                 <tbody>
<tr>
<td style="padding-left:20px;">

            <div class="form-group">
                <label for="in">Select Month: </label>
                <select name="month" id="month" class="form-control" style="width:250px;">
    <option value="">Select Any</option>
    <?php get_month_new(); ?>
    </select>
                </div>
                </td>
                
               
<br>                 </tr>
<tr>
                <td style="padding-left:20px;">

            
                <input type="submit"  class="btn btn-primary" name="search" id="search" value="Search">
                <a href="viewreport.php"  class="btn btn-primary" name="clear" id="clear">Clear Filter</a>
            
                </td>
                
                 
                </tr>
                </tbody>
              </table>
              <?php                                 
                                                    $form_id="";
                                                    $month="";
                                                    $year="";
                                                    $scode="";
                                                    $sname="";
                                                    $stype="";
                                                    $category="";
                                                    $area="";
                                                    $ward="";
                                                    $state="";
                                                    $block="";
                                                    $shg="";
                                                    $district="";
                                                    $kitchen="";
                                                    $tenrol="";
                                                    $primary1="";
                                                    $primary2="";
                                                    $primary3="";
                                                    $aopening="";
                                                    $ramount="";
                                                    $expenditure="";
                                                    $cbalance="";
                                                    $ropening="";
                                                    $fgrain="";
                                                    $consumption="";
                                                    $cbalance1="";
                                                    $con = new mysqli("localhost",'root','','school');
                                        if(isset($_POST['search'])){
                                            $count = 1;
                                        //$_POST['station_feature']="";
                                            //if(!empty($_POST['station_category'])||(!empty($_POST['station_feature']))||(!empty($_POST['station_name']))){
                                        
                                             //when no filter is selected
                                            if((isset($_POST['month'])) && $_POST['month']!=""):
                                                $month = $_POST['month']; 
                                                $sql="SELECT * FROM `report` INNER JOIN `report1` ON report.id = report1.rid WHERE report.month='$month'";

                                            endif;
                                            
                                            
                                            
                                                
                                         $run_q = mysqli_query($con, $sql);
                                            while($row  = mysqli_fetch_assoc($run_q)){
                                               $form_id=$row['form_id']; 
                                               $month=$row['month'];
                                               $year=$row['year'];
                                               $scode=$row['scode'];
                                               $sname=$row['sname'];
                                               $stype=$row['stype'];
                                               $category=$row['category'];
                                               $area=$row['area'];
                                               $ward=$row['ward'];
                                               $state=$row['state'];
                                               $block=$row['block'];
                                               $shg=$row['shg'];
                                               $district=$row['district'];
                                               $kitchen=$row['kitchen'];
                                               $tenrol=$row['tenrol'];
                                               $primary1=$row['primary1'];
                                               $primary2=$row['primary2'];
                                               $primary3=$row['primary3'];
                                               $aopening=$row['aopening'];
                                               $ramount=$row['ramount'];
                                               $expenditure=$row['expenditure'];
                                               $cbalance=$row['cbalance'];
                                               $ropening=$row['ropening'];
                                               $fgrain=$row['fgrain'];
                                               $consumption=$row['consumption'];
                                               $cbalance1=$row['cbalance1'];
                                               


                                           }
                                       }
                                            
                                        ?>
              </form>
                                     <br><br><br>  
                                     
                                </div>
                            </div>
 
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Form_id:<?php echo $form_id; ?><br><br><br>
                                            <div class="all-form-element-inner">
                                              
                                    <h4>1.School Details</h4>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Month</label>
      <input type="text" class="form-control" id="month" name="month" readonly value="<?php echo $month; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Year</label>
      <input type="text" class="form-control" id="year" name="year" readonly value="<?php echo $year; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">School Code</label>
      <input type="text" class="form-control" id="scode" name="scode" value="<?php echo $scode; ?>"  readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">School Name</label>
      <input type="text" class="form-control" id="sname" name="sname" value="<?php echo $sname; ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">School Type</label>
      <input type="text" name="stype" class="form-control" id="stype" value="<?php echo $stype; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Category</label>
      <input type="text" name="category" class="form-control" id="category" value="<?php echo $category; ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Area</label>
      <input type="text" name="area" id="area" class="form-control" value="<?php echo $area; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Village/Ward</label>
      <input type="text" class="form-control" id="ward" name="ward" value="<?php echo $ward; ?>" readonly>
  </div>
  <div class="form-group col-md-6">
      <label for="inputPassword4">State</label>
      <input type="text" class="form-control" id="state" name="state" value="<?php echo $state; ?>" readonly>
  </div>
      <div class="form-group col-md-6">
      <label for="inputPassword4">Block</label>
      <input type="text" class="form-control" id="block" name="block" value="<?php echo $block; ?>" readonly>
      </div>
      <div class="form-group col-md-6">
      <label for="inputPassword4">SHG</label>
      <input type="text" class="form-control" id="shg" name="shg" value="<?php echo $shg; ?>" readonly>
  </div>
      <div class="form-group col-md-6">
      <label for="inputPassword4">District</label>
      <input type="text" class="form-control" id="district" name="district" value="<?php echo $district; ?>" readonly>
      </div>
      <div class="form-group col-md-6">
      <label for="inputPassword4">Kitchen</label>
      <input type="text" class="form-control" id="kitchen" name="kitchen" value="<?php echo $kitchen; ?>" readonly>
      </div>
      <div class="form-group col-md-6">
      <label for="inputPassword4">Total Enrollment</label>
      <input type="text" class="form-control" id="tenrol" readonly name="tenrol" value="<?php echo $tenrol; ?>">
      </div>
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
      <td><input type="text" name="primary1" id="primary1" readonly value="<?php echo $primary1; ?>"></td>
      
    </tr>
    <tr>
      
      <td>ii)Actual Number of Days Mid Day Meal Served</td>
      <td><input type="text" name="primary2" id="primary2" readonly value="<?php echo $primary2; ?>"></td>
      
    </tr>
    <tr>
      
      <td>iii)Total Meals served during the Month</td>
      <td><input type="text" name="primary3" id="primary3" readonly value="<?php echo $primary3; ?>"></td>
      
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
                              
                             
                             
                            </tr>
                            <?php 
 mysqli_connect('localhost','root','');
              
$year="";
$year=date("Y");
//echo $year;
$c="";
if(isset($_POST['month'])){
                                            
                                    
                                        
                                             //when no filter is selected
                                            extract($_POST);
                                     $c=1;
                                                $res=mysql_query("SELECT * FROM `report` INNER JOIN `report1` ON report.id = report1.rid WHERE report.month='$month'");
                                           while($row=mysql_fetch_array($res))
 {
                                                
                                              
                                            
                                        ?>
                            <tr>
                               
<td><?php echo $c; ?></td>
                            <td><input class="form-control input-sm cname" id="cname" name="cname" value="<?php echo $row['cname']; ?>" readonly  type="text" /></td>
                            <td><input class="form-control input-sm gender" id="gender" name="gender"  type="text" readonly value="<?php echo $row['gender']; ?>" /></td>
                            <td><input class="form-control input-sm castecategory" id="castecategory" name="castecategory" readonly value="<?php echo $row['castecategory']; ?>"  type="text"/></td>
                            <td><input class="form-control input-sm mop" id="mop" name="mop" value="<?php echo $row['mop']; ?>"  readonly type="text"/></td>
                            <td><input class="form-control input-sm receivedamount" id="receivedamount" name="receivedamount" readonly value="<?php echo $row['receivedamount']; ?>"  type="text"/></td>
                             
                               </tr>
                              <?php $c++;}
                              } ?>
                                </table>
                                 <br>
                            
                            
                            
        
                            
    

                  
                  <h4>4.Cooking Cost Details(in Rs) for Primary</h4>
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
      
     
      <td><input type="text" readonly name="aopening" id="aopening" value="<?php echo $aopening; ?>"></td>
      <td><input type="text" readonly name="ramount" id="ramount" value="<?php echo $ramount; ?>"></td>
      <td><input type="text" readonly name="expenditure" id="expenditure" value="<?php echo $expenditure; ?>"></td>
      <td><input type="text" readonly name="cbalance" id="cbalance" value="<?php echo $cbalance; ?>"></td>
    </tr>
    
    
</tbody>
</table>
 
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
      
     
      <td><input type="text" readonly name="ropening" id="roepening" value="<?php echo $ropening; ?>"></td>
      <td><input type="text" readonly name="fgrain" name="fgrain" value="<?php echo $fgrain; ?>"></td>
      <td><input type="text" readonly name="consumption" id="consumption" value="<?php echo $consumption; ?>"></td>
      <td><input type="text" readonly name="cbalance1" id="cbalance1" value="<?php echo $cbalance1; ?>"></td>
    </tr>
    
    
</tbody>
</table>



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
<script>
        $(document).ready(function(){
                   
                    var count = 1;
                    $(document).on('click', '#add_row', function(){
                        count = count+1;
                        $('#total_row').val(count);
                        var html_code = '';
                       html_code +='<tr id="row_id_'+count+'">';
                        html_code +='<td>'+count+'</td>';
                        
                        html_code +='<td><input type="text" name="cname[]" id="cname'+count+'" data-srno="'+count+'" class="form-control input-sm cname"  /></td>';
                        html_code +='<td><input type="text" name="gender[]" id="gender'+count+'" data-srno="'+count+'" class="form-control input-sm gender"  /></td>';
                        html_code +='<td><input type="text" name="castecategory[]" id="castecategory'+count+'" data-srno="'+count+'" class="form-control input-sm castecategory"  /></td>';
                        html_code +='<td><input type="text" name="mop[]" id="mop'+count+'" data-srno="'+count+'" class="form-control input-sm mop"  /></td>';
                        html_code +='<td><input type="text" name="receivedamount[]" id="receivedamount'+count+'" data-srno="'+count+'" class="form-control input-sm receivedamount"  /></td>';
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
       
      
    
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
    
    <script type="text/javascript" src="js/pdfmake.min.js"></script>
    <script type="text/javascript" src="js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="js/buttons.print.min.js"></script>
    <script type="text/javascript" src="js/jszip.min.js"></script>
    <script type="text/javascript" src="js/vfs_fonts.js"></script>
<script src="dataTable_ini.js"></script>

</body>

</html>