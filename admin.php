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
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<style>
#left_column{
height: 470px;
}

</style>
</head>
<body background="back.jpeg" style="  background-repeat: no-repeat;
    background-attachment: fixed;background-position: center;background-size:cover;width:100%;height:100%">

<div id="content" style="background-color:#ffcb63;">
<div id="header" style="background-color:#ffcb63;">
<h1 style="font-size:73px;"><font color="black"><a href="#"><img src="shop.jpg"></a><u>DRUG MART</u></h1></font></div>
<div id="left_column" style="background-color:#ffcb63;">
<div id="button" style="background-color:#ffcb63;">
<ul>
			<li style="font-size:23px;"><a href="admin.php"><strong>Dashboard</strong></a></li><br>
			<li style="font-size:23px;"><a href="admin_pharmacist.php"><strong>Pharmacist</strong></a></li><br>
			<li style="font-size:23px;"><a href="admin_manager.php"><strong>Manager</strong></a></li><br>
			<li style="font-size:23px;"><a href="admin_cashier.php"><strong>Cashier</strong></a></li><br>
			<li style="font-size:23px;"><a href="logout.php"><u><i>Logout</i></u></a></li>
		</ul>	
</div>
		</div>
<div id="main">
    
 <!-- Dashboard icons -->
            <div class="grid_7" style="background-color:yellow;">
            	<a href="admin.php" class="dashboard-module">
                	<img src="images/adminnew.jpeg" width="89" height="85" alt="edit" />
                	<span><b><i>Dashboard</i></b></span>
                </a>
                <a href="admin_pharmacist.php" class="dashboard-module" >
                	<img src="images/pharmacistnew.jpeg"  width="85" height="85" alt="edit" />
                	<span><b><i>Pharmacist</i></b></span>
                </a>
                
                <a href="admin_manager.php" class="dashboard-module">
                	<img src="images/manager.jpeg"  width="85" height="85" alt="edit" />
                	<span><b><i>Manager</i></b></span>
                </a>
                  
                <a href="admin_cashier.php" class="dashboard-module">
                	<img src="images/cashier.jpeg" width="85" height="85" alt="edit" />
                	<span><b><i>Cashier</i></b></span>
                </a>				  
			</div>
</div>
<div id="footer" align="Center" style="background-color:#ffcb63; font-size:23px;" ><b><i><u>MEDICINE IS A SCIENCE OF UNCERTAINITY AND AN ART OF PROABILITY...</u></i></b></div>
</div>
</body>
</html>
