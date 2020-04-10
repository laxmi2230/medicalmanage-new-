<?php
include_once 'connect_db.php';
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position){
case 'Admin':
$result=mysqli_query($con,"SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'")or die("Error: " . mysqli_error($con));
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['admin_id']=$row[0];
$_SESSION['username']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
echo '<h3>Invalid username or password</h3>';
}
break;
case 'Pharmacist':
$result=mysqli_query($con,"SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'")or die("Error: " . mysqli_error($con));
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['pharmacist_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Cashier':
$result=mysqli_query($con,"SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username='$username' AND password='$password'")or die("Error: " . mysqli_error($con));
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['cashier_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Manager':
$result=mysqli_query($con,"SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'")or die("Error: " . mysqli_error($con));
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['manager_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<style>
#content {
height: auto;
}
#main{
height: auto;}
</style>
</head>
<body background="back.jpeg" style="  background-repeat: no-repeat;
    background-attachment: fixed;background-position: center;background-size:cover;width:100%;height:100%">
<div id="content" style="background-color:#ffcb63;">
<div id="header" style="background-color:#ffcb63;">
<h1 style="font-size:73px;"><font color="black"><img src="shop.jpg"><u>DRUG MART</u></h1></font>
</div>
<div id="main" style="background-color:#ffcb63;">

  <section class="container" style="background-color:#ffcb63;">
  
     <div class="login" style="background-color:#ffcb63;">
      <h1><i><b><u>Login here</u></i></b></h1>
      <form method="post" action="index.php">
		 <p><input type="text" name="username" value="" placeholder="Username" style="font-family:serif;font-size:16px;font-style:italic;"></p>
        <p><input type="password" name="password" value="" placeholder="Password" style="font-family:serif;font-size:16px;font-style:italic;"></p>
		<p><select name="position" style="font-family:serif;font-size:16px;font-style:italic;">
		<option>--Select position--</option>
			<option><i><b>Admin</b></i></option>
			<option><i><b>Pharmacist</b></i></option>
			<option><i><b>Cashier</b></i></option>
			<option><i><b>Manager</b></i></option>
			</select></p>
        <p class="submit"><input type="submit" name="submit" value="Login" style="font-family:serif;font-size:16px;font-style:italic;"></p>
      </form>
    </div>
    </section>
</div>
<div id="footer" align="Center" align="Center" style="background-color:#ffcb63; font-size:20px;"><b><i><u>MEDICINE IS A SCIENCE OF UNCERTAINITY AND AN ART OF PROABILITY...</u></i></b></div>
</div>
</body>
</html>
