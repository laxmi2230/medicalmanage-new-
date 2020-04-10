<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$sid=$_POST['staff_id'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$username=$_POST['username'];
$pas=$_POST['password'];
 
// get value of id that sent from address bar
$user=$_POST['user'];

// Retrieve data from database 
$sql="UPDATE pharmacist SET first_name='$fname', last_name='$lname', staff_id='$sid',
postal_address='$postal',phone='$phone',email='$email',username='$username', password='$pas' WHERE username='$username'";
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message1="<font color=red>Update Failed, Try again</font>";
}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $username?> Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
 <style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body background="back.jpeg" style="  background-repeat: no-repeat;
    background-attachment: fixed;background-position: center;background-size:cover;width:100%;height:100%">
<div id="content">
<div id="header" style="background-color:#ffcb63;">
<h1 style="font-size:73px;"><font color="black"><a href="#"><img src="shop.jpg"></a><u>DRUG MART</u></h1></font></div>
<div id="left_column" style="background-color:#ffcb63;">
<div id="button" style="background-color:#ffcb63;">
<ul>
			<li style="font-size:23px;"><a href="admin.php"><i>Dashboard</i></a></li><br>
			<li style="font-size:23px;"><a href="admin_pharmacist.php"><i>Pharmacist</i></a></li><br>
			<li style="font-size:23px;"><a href="admin_manager.php"><i>Manager</i></a></li><br>
			<li style="font-size:23px;"><a href="admin_cashier.php"><i>Cashier</i></a></li><br>
			<li style="font-size:23px;"><a href="logout.php"><i><u>Logout</u></i></a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box" style="background-color:#ffcb63;">  
    <h4>MANAGE USERS</h4> 
<hr/>	
    <div class="tabbed_area" style="background-color:#ffcb63;">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Update User</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content" style="background-color:#D3D3D3;">  
          <form name="myform" onsubmit="return validateForm(this);" action="update_cashier.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="first_name" type="text" style="width:170px" placeholder="First Name" value="<?php include_once('connect_db.php'); echo $_GET['first_name']?>" id="first_name" /></td></tr>
				<tr><td align="center"><input name="last_name" type="text" style="width:170px" placeholder="Last Name" id="last_name" value="<?php include_once('connect_db.php'); echo $_GET['last_name']?>" /></td></tr>
				<tr><td align="center"><input name="staff_id" type="text" style="width:170px" placeholder="Staff ID" id="staff_id" value="<?php include_once('connect_db.php'); echo $_GET['staff_id']?>" /></td></tr>  
				<tr><td align="center"><input name="postal_address" type="text" style="width:170px" placeholder="Address" id="postal_address" value="<?php include_once('connect_db.php'); echo $_GET['postal_address']?>" /></td></tr>  
				<tr><td align="center"><input name="phone" type="text" style="width:170px" placeholder="Phone" id="phone" value="<?php include_once('connect_db.php'); echo $_GET['phone']?>" /></td></tr>  
				<tr><td align="center"><input name="email" type="email" style="width:170px" placeholder="Email" id="email"value="<?php include_once('connect_db.php'); echo $_GET['email']?>" /></td></tr>   
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" id="username"value="<?php include_once('connect_db.php'); echo $_GET['username']?>" /></td></tr>
				<tr><td align="center"><input name="password" placeholder="Password" id="password"value="<?php include_once('connect_db.php'); echo $_GET['password']?>"type="password" style="width:170px"/></td></tr>
				<tr><td align="center"><input name="submit" type="submit" value="Update"/></td></tr>
            </table>
		</form>
		</div>  
    </div>  
</div>
</div>
<div id="footer" align="Center" style="background-color:#ffcb63; font-size:23px;" ><b><i><u>MEDICINE IS A SCIENCE OF UNCERTAINITY AND AN ART OF PROABILITY...</u></i></b></div>
</div>
</body>
</html>
