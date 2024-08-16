<?php
include('db.php');
//extracting dropdown list from earning types table




//extracting station category from station category table dropdown list

//Extracting earning types from earning types table using checkbox

//Extracting station features from station feature table using checkboxes

//view station 

function get_month(){
          global $con;
          $earning_types_sql = 'SELECT DISTINCT month FROM stock';
          $run_earning_types_sql = mysqli_query($con, $earning_types_sql);
          
          while($rows = mysqli_fetch_assoc($run_earning_types_sql))
          {
          
			echo "<option value=\"".$rows["month"]."\"";
             if(@$_POST['month'] == $rows['month'])
                    echo 'selected';
                   
              echo ">".$rows["month"]."</option>"; 
			
          } 
		  
}
function get_month_new(){
          global $con;
          $earning_types_sql = 'SELECT DISTINCT month FROM report';
          $run_earning_types_sql = mysqli_query($con, $earning_types_sql);
          
          while($rows = mysqli_fetch_assoc($run_earning_types_sql))
          {
          
                     echo "<option value=\"".$rows["month"]."\"";
             if(@$_POST['month'] == $rows['month'])
                    echo 'selected';
                   
              echo ">".$rows["month"]."</option>"; 
                     
          } 
                
}
?>  