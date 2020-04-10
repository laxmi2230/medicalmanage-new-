<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['cashier_id'];
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
<title><?php echo $user;?> -  Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<script type="text/javascript" SRC="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" SRC="js/superfish/hoverIntent.js"></script>
	<script type="text/javascript" SRC="js/superfish/superfish.js"></script>
	<script type="text/javascript" SRC="js/superfish/supersubs.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){ 
			$("ul.sf-menu").supersubs({ 
				minWidth:    12, 
				maxWidth:    27, 
				extraWidth:  1    
								  
			}).superfish();
							
		}); 
	</script>
	<script SRC="js/cufon-yui.js" type="text/javascript"></script>
	<script SRC="js/Liberation_Sans_font.js" type="text/javascript"></script>
	<script SRC="js/jquery.pngFix.pack.js"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5,h6');
		Cufon.replace('.logo', { color: '-linear-gradient(0.5=#FFF, 0.7=#DDD)' }); 
	</script>
   <style>#left-column {height: 477px;}
 #main {height: 500px;}
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
			<li style="font-size:23px;"><a href="cashier.php"><i>Dashboard</i></a></li><br>
			<li style="font-size:23px;"><a href="payment.php"target="_top"><i>Process payment</i></a></li><br>
			<li style="font-size:23px;"><a href="logout.php"><i><u>Logout</u></i></a></li>
		</ul>	
</div>
</div>
<div id="main">
 <div id="tabbed_box" class="tabbed_box">  
    <h4>MANAGE PAYMENTS</h4> 
<hr/>	
    <div class="tabbed_area" style="background-color:#ffcb63;">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1">Process payments</a></li>  
              
        </ul>  
          
       
 <script>
			$(document).ready(function()
	{
	$("#invoice_no").change(function() 
		{	
			var invoice_no=$("#invoice_no").val();
			
			
			
			if(invoice_no.length >0)		
			
				{
					$.ajax(
				{
type: "POST", url: "check.php", data: 'invoice_no='+invoice_no , success: function(msg)
									
					{  
						$("#viewer2").ajaxComplete(function(event, request, settings)
							{ 
								
										
									if(msg)
									{ 

										$(this).html(msg);
									
														
										
									} 
									else
									{
										$(this).html('<font color="red"><strong>Invoice does not exist</strong></font>');
									}
								
									 
								   
							});
					}    
				}); 
				}
	});		
	});		
		
		</script>
		
		<?php
		$invoice_no=$_SESSION['invoice_no'];
		$amount=$_SESSION['amount'];
		$payType=$_SESSION['payType'];
		$serial_no=$_SESSION['serial_no'];
		
		?>
		
		
        <div id="content_1" class="content" style="background-color:#D3D3D3;"> 
		<div id="viewer1"><span id="viewer2"></span></div>
		  <form name="myform" onsubmit="return validateForm(this);" action="receipt.php" method="post" >
			<table width="220" height="106" border="0" >	
				<tr><td ><input name="invoice_no" type="text" style="width:170px" placeholder="Invoice No" required="required" id="invoice_no" /></td></tr>
				<tr><td ><input name="amount" type="text" style="width:170px" placeholder="Amount" required="required" id="amount"/></td></tr> 
				<tr><td ><?php
				echo"<select  class=\"input-small\" name=\"payType\" style=\"width:170px\" id=\"payment_type\">";
						 $getpayType=mysqli_query($con,"SELECT Name FROM paymentTypes");
						 echo"<option>Select Payment</option>";
		 while($pType=mysqli_fetch_array($getpayType))
			{
				echo"<option>".$pType['Name']."</option>";
			}
		
		echo"</select>";?>  </td></tr>
				
				<tr><td ><input name="serial_no" type="text" style="width:170px" placeholder="Serial No"  id="serial_no" /></td></tr>  
				<tr><td><input name="tuma" id="tuma" type="submit" value="Submit"/></td></tr>
            </table>
		</form>         
        </div>  
    </div>  
</div>
</div>
<div id="footer" align="Center" align="Center" style="background-color:#ffcb63; font-size:23px;"><b><i><u>MEDICINE IS A SCIENCE OF UNCERTAINITY AND AN ART OF PROABILITY...</u></i></b></div>
</div>
</body>
</html>
