
	<html>
			<body>
			<head>
				<title>Import Excel</title>
				<link rel="stylesheet" href="css/style.css" type="text/css">
				<link rel="stylesheet" href="css/bootstrap_mins.css" type="text/css">
				<script src="script/jquery.js" type="text/javascript"></script>
				<script src="script/custom.js" type="text/javascript"></script>
			</head>
			<body>
		<div class="container col-md-12 col-lg-12">
			<div class="col-md-1 col-lg-1"></div>
			<div class="col-md-10 col-lg-10">
			<center class="attachErr" style="display:none;color:red;"></center>
			<form id="importExcel" method="POST" enctype="multipart/form-data">
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin-top:20px;">
						<input type="file" style="border:none;" id="excel" name="import_csv">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin-top:20px;">
						<input type="submit" name="import" value="ထည့်သွင်းမည်" class="import" style="padding:6px 20px 6px 20px;border:none;border-radius:4px;background-color:#507299;color:#FFF;">
					</div>
			</form>
			</div>
			<div class="col-md-1 col-lg-1"></div>
		</div>
	<div class="container  col-md-12 col-lg-12">
			<div class="viewPop col-md-12 col-lg-12" style="padding:10px;z-index:1000;height:90%;max-height:90%;border-radius:3px;border:1px solid #ccc;overflow:scroll;">
			<?php 
				if(isset($_POST["import"]))
				{
					$file=$_FILES["import_csv"]["tmp_name"];
					if($file == NULL)
					{
						echo "Please select a file to import";
					}else
					{
						$name="excel"."/".$_FILES["import_csv"]["name"];
						if(move_uploaded_file($file,$name))
						{
							require('php-excel-reader/excel_reader2.php');
							require('SpreadsheetReader.php');
							$Reader = new SpreadsheetReader($name);
							echo "<form id='addForm'>";
							echo "<table border='1' id='homeTbl' class='homeTbl' style='border:1px solid #ccc;width:100%;border-collapse:collapse;'>
									<tr><th>AuthoID</th>
									<th>Voucher</th>
									<th style='width:150px'>RefID</th>
									<th>LicenseNu</th>
									<th>Recdatetime</th>
									<th>Payment</th>
									<th>VehicleClass</th>
									<th>Operatorid</th>
									<th>Fee</th>
									<th>Fee2</th>
									<th>Weight</th>
									<th>Weightcharge</th>
									<th>Charge</th>
									<th>PDate</th>
									<th>Section</th>
									<th>GateId</th>
									<th>TerminalId</th>
									<th>TotalCharge</th>
									<th>CloudDatetime</th>
								</tr>";
							$counter=0;
							foreach($Reader as $key=>$val)
							{
								if($key !=0)
								{
									$d4 = date("Y-m-d H:i:s",strtotime($val[4]));
									$d13= date('Y-m-d',strtotime(@$val[13]));
									$d18= date('Y-m-d H:i:s',strtotime(@$val[18]));
									echo "<tr>";
										echo "<td>".$key."</td>";
										echo "<td>$val[1]<input type='hidden' value='$val[1]' name='voucher[]'></td>";
										echo "<td>$val[2]<input type='hidden' value='$val[2]' name='refid[]'></td>";
										echo "<td>$val[3]<input type='hidden' value='$val[3]' name='licensenum[]'></td>";
										echo "<td>$d4<input type='hidden' value='$d4' name='recdatetime[]'></td>";
										echo "<td>$val[5] <input type='hidden' value='$val[5]' name='payment[]'></td>";
										echo "<td>$val[6]<input type='hidden' value='$val[6]' name='vehicleclass[]'></td>";
										echo "<td>$val[7]<input type='hidden' value='$val[7]' name='operatorid[]'></td>";
										echo "<td>$val[8]<input type='hidden' value='$val[8]' name='fee[]'></td>";
										echo "<td>$val[9]<input type='hidden' value='$val[9]' name='fee2[]'></td>";
										echo "<td>$val[10]<input type='hidden' value='$val[10]' name='weight[]'></td>";
										echo "<td>$val[11]<input type='hidden' value='$val[11]' name='weightcharge[]'></td>";
										echo "<td>$val[12]<input type='hidden' value='$val[12]' name='charge[]'></td>";
										echo "<td>$d13<input type='hidden' value='$d13' name='pdate[]'></td>";
										echo "<td>$val[14]<input type='hidden' value='$val[14]' name='section[]'></td>";
										echo "<td>$val[15]<input type='hidden' value='$val[15]' name='gateid[]'></td>";
										echo "<td>$val[16]<input type='hidden' value='$val[16]' name='terminalid[]'></td>";
										echo "<td>$val[17]<input type='hidden' value='$val[17]' name='totalcharge[]'></td>";
										echo "<td>$d18<input type='hidden' value='$d18' name='clouddatetime[]'></td>";
									echo "</tr>";
								}
								$counter++;
							}
							echo "</table>";
							echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:20px;z-index:2000;"><button class="closePop" style="float:right;padding:6px 20px 6px 20px;margin-left:20px;border:none;border-radius:3px;background-color:red;color:#FFF;">ပိတ်မည်</button><input type="submit" value="ထည့်သွင်းမည်"  style="border-radius:3px;float:right;color:#FFF;z-index:2000;cursor:pointer;background-color:#507299;border:1px solid #ccc;padding:6px;"><span class="importInfo" style="float:right;margin-right:200px;width:100%;"></span></div>';
							echo "</form>";
						}
					}
				}
				?>
				
			</div>
			
</div>			
</body>
</html>