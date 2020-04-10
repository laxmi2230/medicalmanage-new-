<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $user?> Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function1.js" type="text/javascript"></script>
   <style>#left-column {height: 477px;}
 #main {height: 477px;}
</style>
</head>
<body background="back.jpeg" style="  background-repeat: no-repeat;
    background-attachment: fixed;background-position: center;background-size:cover;width:100%;height:100%">
<div id="content">
<div id="header" style="background-color:#ffcb63;">
<h1 style="font-size:73px;"><font color="black"><a href="#"><img src="shop.jpg"></a><u>DRUG MART</u></h1></font></div>
<div id="left_column" style="background-color:#ffcb63;">
<div id="button" style="background-color:#ffcb63;">
		<ul>
			<li style="font-size:23px;"><a href="manager.php"><i>Dashboard</i></a></li><br>
			<li style="font-size:23px;"><a href="view.php"><i>View Users</i></a></li><br>
			<li style="font-size:23px;"><a href="view_prescription.php"><i>View Prescriptions</i></a></li><br>
			<li style="font-size:23px;"><a href="stock.php"><i>Manage Stock</i></a></li><br>
			<li style="font-size:23px;"><a href="logout.php"><i>Logout</i></a></li>
		</ul>	
</div>
</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>VIEW USERS</h4> 
<hr/>	
    <div class="tabbed_area" style="background-color:#ffcb63;">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Pharmacist </a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Cashier</a></li>
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Manager</a></li>
              
        </ul>  
          
        <div id="content_1" class="content" style="background-color:#D3D3D3;">  
<?php 
		/* 
		View
        Displays all data from 'Pharmacist' table
		*/
        // connect to the database
        include_once('connect_db.php');
       // get results from database
       $result = mysqli_query($con,"SELECT * FROM pharmacist")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th style='background-color:#ffcb63; color:black;'>Firstname</th> <th style='background-color:#ffcb63; color:black;'>Lastname </th> <th style='background-color:#ffcb63; color:black;'>Staff ID</th><th style='background-color:#ffcb63; color:black;'>Phone</th><th style='background-color:#ffcb63; color:black;'>Email</th><th style='background-color:#ffcb63; color:black;'>Username </th></tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
			} 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content" style="background-color:#D3D3D3;">  
		          <?php 
			  
		/* 
		View
        Displays all data from 'Cashier' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysqli_query($con,"SELECT * FROM cashier") 
                or die(mysqli_error());
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5' >";
         echo "<tr><th style='background-color:#ffcb63; color:black;'>Firstname</th> <th style='background-color:#ffcb63; color:black;'>Lastname </th> <th style='background-color:#ffcb63; color:black;'>Staff ID</th><th style='background-color:#ffcb63; color:black;'>Phone</th><th style='background-color:#ffcb63; color:black;'>Email</th><th style='background-color:#ffcb63; color:black;'>Username </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				
		 } 
        // close table>
        echo "</table>";
?>
        </div>  
		 <div id="content_3" class="content" style="background-color:#D3D3D3;">  
		        <?php 
		/* 
		View
        Displays all data from 'Manager' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysqli_query($con,"SELECT * FROM manager") 
                or die(mysqli_error());
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th style='background-color:#ffcb63; color:black;'>Firstname</th> <th style='background-color:#ffcb63; color:black;'>Lastname </th> <th style='background-color:#ffcb63; color:black;'>Staff ID</th><th style='background-color:#ffcb63; color:black;'>Phone</th><th style='background-color:#ffcb63; color:black;'>Email</th><th style='background-color:#ffcb63; color:black;'>Username </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				
		 } 
        // close table>
        echo "</table>";
?> 
        </div> 
    </div>  
</div>
</div>
<div id="footer" align="Center" style="background-color:#ffcb63; font-size:23px;" ><b><i><u>MEDICINE IS A SCIENCE OF UNCERTAINITY AND AN ART OF PROABILITY...</u></i></b></div>
</div>
</body>
</html>