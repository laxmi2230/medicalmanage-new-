<?php
include('connect_db.php');
session_start();
if(isset($_POST['customer_id']))
{
$c_id=$_POST['customer_id'];
	$cname=$_POST['customer_name'];
	$age=$_POST['age'];
	$sex=$_POST['sex'];
	$postal=$_POST['postal_address'];
	$phone=$_POST['phone'];
	
	$_SESSION['custId']=$c_id;
	$_SESSION['custName']=$cname;
	$_SESSION['age']=$age;
	$_SESSION['sex']=$sex;
	$_SESSION['postal_address']=$postal;
	$_SESSION['phone']=$phone;
						
}

if(isset($_POST['drug_name']))
{
	$drug=$_POST['drug_name'];
	$strength=$_POST['strength'];
	$dose=$_POST['dose'];
	$quantity=$_POST['quantity'];
	$sql=mysqli_query($con,"INSERT INTO tempPrescri(customer_id,customer_name,age,sex,postal_address,phone,drug_name,strength,dose,quantity)
						VALUES('{$_SESSION['custId']}','{$_SESSION['custName']}','{$_SESSION['age']}','{$_SESSION['sex']}','{$_SESSION['postal_address']}','{$_SESSION['phone']}','{$drug}','{$strength}','{$dose}','{$quantity}')");
						
						$_SESSION['quantity']=$quantity;
	$get_cost=mysqli_query($con,"SELECT cost FROM stock WHERE drug_name='{$drug}'");
	$cost=mysqli_fetch_array($get_cost);
	$tot=$quantity*$cost[0];
	
	$file=fopen("receipts/docs/".$_SESSION['custId'].".txt", "a+");
	fwrite($file, $drug.";".$strength.";".$dose.";".$quantity.";".$cost[0].";".$tot."\n");
	fclose($file);
	echo "<table width=\"100%\" border=1>";
        echo "<tr> 
		<th style='background-color:#ffcb63; color:black;'>Drug</th> 
		<th>Strength </th>
		<th>Dose</th>
		<th>Quantity </th></tr>";
        // loop through results of database query, displaying them in the table
		 $result = mysqli_query($con,"SELECT * FROM tempPrescri")or die(mysql_error());
        while($row = mysqli_fetch_array($result)) 
		{
                // echo out the contents of each row into a table
                echo "<tr>";
                
				echo '<td>' . $row['drug_name'] . '</td>';
				echo '<td>' . $row['strength'] . '</td>';
				echo '<td>' . $row['dose'] . '</td>';
				echo '<td>' . $row['quantity'] . '</td>';
				}

}
$message= "";
if(isset($_POST['invoice_no']))
{
$invoice=$_POST['invoice_no'];

	
	
	
$getDetails=mysqli_query($con,"SELECT invoice,drug,cost,quantity FROM invoice_details WHERE invoice='{$invoice}'");
$getQuantity=mysqli_query($con,"SELECT quantity FROM invoice_details WHERE invoice_id='{$invoice}'");
$file=fopen("receipts/docs/".$_SESSION['invoice_no'].".txt", "w");
	
	
	

	$message = "<table width=\"100%\" border=1>
				<tr> 
					
				<th style='background-color:#ffcb63; color:black;'>Drug </th>
				<th style='background-color:#ffcb63; color:black;'>Unit cost</th>
				<th style='background-color:#ffcb63; color:black;'>Quantity </th>
				<th style='background-color:#ffcb63; color:black;'>Total Cost(Ksh.)</th></tr>";

	echo $message;
while($item5=mysqli_fetch_array($getDetails))
			{
			$getDrug=mysqli_query($con,"SELECT drug_name FROM stock WHERE stock_id='{$item5['drug']}'");
						
			$drug=mysqli_fetch_array($getDrug);
			
			$tot=$item5['cost']*$item5['quantity'];
			$total[]=$tot;
			fwrite($file, $drug[0].";".$item5['cost'].";".$item5['quantity'].";".$tot.";\n");	
				echo "<tr style='background-color:#ffcb63; color:black;' >";
                echo '<td style="background-color:#ffcb63; color:black;">' . $drug[0] . '</td>';
				echo '<td align="right" style="background-color:#ffcb63; color:black;">' . number_format($item5['cost'],2) . '</td>';
				echo '<td align="right" style="background-color:#ffcb63; color:black;">' . $item5['quantity'] . '</td>';
				echo '<td align="right" style="background-color:#ffcb63; color:black;">' . number_format($tot,2). '</td>';
				echo "</tr>";

				$partMessage = '<tr>
								<td>'.$drug[0].'</td>
								<td align="right">' . number_format($item5['cost'],2) . '</td>
								<td align="right">' . $item5['quantity'] . '</td>
								<td align="right">' . number_format($tot,2). '</td>
								</tr>';

				$message.= $partMessage;
			}
			
			//echo "here it is";
			// echo $message;
				$zote=array_sum($total);
				echo "<tr style='background-color:#ffcb63; color:black;'>";
                echo '<td style="background-color:#ffcb63; color:black;"><strong>TOTAL</strong></td>';
				echo '<td style="background-color:#ffcb63; color:black;"></td>';
				echo '<td style="background-color:#ffcb63; color:black;"></td>';
				echo '<td align="right" style="background-color:#ffcb63; color:black;">' . number_format($zote,2) . '</td>';
				echo "</tr>";	

				$partMessage = '<td><strong>TOTAL</strong></td>
								<td></td>
								<td></td>
								<td align="right">' . number_format($zote,2) . '</td>
								</tr></table>';

				$message.= $partMessage;
				// echo "here it is";
				// echo $message;

fwrite($file, "TOTAL;;;".$zote.";\n");
fclose($file);
echo "</table>"; 	
//echo $message;

$to = "aakankshakamal.post@gmail.com";
$subject = "Receipt";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'laxmimenon18@gmail.com' . "\r\n";
if(mail($to,$subject,$message,$headers)){
	echo "sent";
}else{
	echo "NOt sent";
}

}
?>