
<?php include('functions.php'); ?>
<?php include("header.php"); ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
       
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
                                    <h1>Stock Satatement</h1>
                                     
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="statement.php" method="POST">  
                                        <table>
                 <tbody>
<tr>
<td style="padding-left:20px;">

            <div class="form-group">
                <label for="in">Select Month: </label>
                <select name="month" id="month" class="form-control" style="width:250px;">
    <option value="">Select Any</option>
    <?php get_month(); ?>
    </select>
                </div>
                </td>
                
               
<br>                 </tr>
<tr>
                <td style="padding-left:20px;">

            
                <input type="submit"  class="btn btn-primary" name="search" id="search" value="Search">
                <a href="statement.php"  class="btn btn-primary" name="clear" id="clear">Clear Filter</a>
            
                </td>
                
                 
                </tr>
                </tbody>
              </table>
              </form>
                                            </div>
                                        </div>
                                    </div><br><br><br>
                                </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                        <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Date</th>
            <th>Month</th>
            <th>Total Enrolment</th>
            <th>Taken Student MDM</th>
            <th>Amount Type</th>
            <th>Amount(in Rs)</th>
            <th>Balance Amount</th>
            <th>Rice Type</th>
            <th>Quantity(in KG)</th>
            <th>Balance Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php 

                                        if(isset($_POST['search'])){
                                            
                                        if(!empty($_POST['month'])){
                                            if((isset($_POST['month'])  && $_POST['month']!="")):
                                                $month = $_POST['month'];
                                                $sql="SELECT * from `stock` WHERE month='$month'";
                                            endif;
                                            
                                            
                                            
                                            
                                                
                                         $run_q = mysqli_query($con, $sql);
                                            while($row  = mysqli_fetch_assoc($run_q)){ 
                                        ?>
                                        <tr>
                                            <td><?php echo $row['sdate']; ?></td>
                                            <td><?php echo $row['month']; ?></td>
                                            <td><?php echo $row['tenrol']; ?></td>
                                            <td><?php echo $row['smdm']; ?></td>
                                            <td><?php echo $row['atype']; ?></td>
                                            <td><?php echo $row['amountreceived']; ?></td>
                                            <td><?php echo $row['bamount']; ?></td>
                                            <td><?php echo $row['btype']; ?></td>
                                            <td><?php echo $row['rexpenditure']; ?></td>
                                            <td><?php echo $row['bquantity']; ?></td>
                                        </tr>
                                        <?php 
                  
                                        }}
                  ?>
                                        
                  <?php } else
                        
                        {
                            
                                     
                            
                                        //$dname="";
$sql = "SELECT * from stock";
$run_q = mysqli_query($con, $sql);
while($row  = mysqli_fetch_assoc($run_q)){
                                             
?>  
<tr>
                                            <td><?php echo $row['sdate']; ?></td>
                                            <td><?php echo $row['month']; ?></td>
                                            <td><?php echo $row['tenrol']; ?></td>
                                            <td><?php echo $row['smdm']; ?></td>
                                            <td><?php echo $row['atype']; ?></td>
                                            <td><?php echo $row['amountreceived']; ?></td>
                                            <td><?php echo $row['bamount']; ?></td>
                                            <td><?php echo $row['btype']; ?></td>
                                            <td><?php echo $row['rexpenditure']; ?></td>
                                            <td><?php echo $row['bquantity']; ?></td>
                                        </tr>
                                        <?php
  
  }?>
  <?php   
                        }
                  
                  ?>
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

    
    
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>


</body>

</html>