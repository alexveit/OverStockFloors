<html>
<head>
<style>
	th
	{
		background-color:#FDD017;
		text-align:left;
	}
	
	input[type="text"]
	{
		width: 100%; 
		box-sizing: border-box;
		-webkit-box-sizing:border-box;
		-moz-box-sizing: border-box;
	}
	
	body
	{
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
</style>

<script>
function validateForm()
{
	var x=document.forms["myForm"]["name"].value;
	if (x==null || x=="")
	{
		alert("Name must be filled out");
		return false;
	}
	
	x=document.forms["myForm"]["phone"].value;
	if (x==null || x=="")
	{
		alert("Phone # must be filled out");
		return false;
	}
	
	x=document.forms["myForm"]["email"].value;
	if (x==null || x=="")
	{
		alert("Email must be filled out");
		return false;
	}
}
</script>
</head>

<body>


<?php

class Review
{
	private $_row;
	
	private function assess($var)
	{
		$mycase;
		
		switch($var)
		{
		case 1:
			$mycase = $this->_row['review_quality'];
			break;
		case 2:
			$mycase = $this->_row['review_appeal'];
			break;
		case 3:
			$mycase = $this->_row['review_service'];
			break;
			
		}
		
		$msg;
				
		switch($mycase)
		{
		case 1:
			$msg = "<strong><span style=\"color:#FF0000;\">Poor/Fair</span></strong>";
			break;
		case 2:
			$msg = "<strong><span style=\"color:#FBB117;\">Good</span></strong>";
			break;
		case 3:
			$msg = "<strong><span style=\"color:#000099;\">Very Good</span></strong>";
			break;
		default:
			$msg = "<strong><span style=\"color:#348017;\">Excelent</span></strong>";
			break;
		}
		
		return $msg;
	}
	// property declaration
	public function __construct($row) { $this->_row = $row; }
	
	public function get_name() { return $this->_row['review_name']; }
	
	public function get_quality() { return $this->assess(1); }
	
	public function get_appeal() { return $this->assess(2); }
	
	public function get_service() { return $this->assess(3); }
	
	public function get_review() { return $this->_row['review_review']; }
	
	public function get_timestamp()
	{
		$format = 'm/d/Y - g:ia';	
		$date = new DateTime($this->_row['review_date']); 
		return $date->format($format);
	}
}
?>

<form name="myForm" action="procreview.php" onsubmit="return validateForm()" method="POST">
	<table border="0" style="width:100%;">
		<tbody>
			<tr>
				<td style="width:33%;">Name:<br /><input name="name" type="text" /></td>
				<td style="width:33%;">Phone #:<br /><input name="phone" type="text" /></td>
				<td style="width:33%;">Email:<br /><input name="email" type="text" /></td>
			</tr>
			<tr>
				<td>Quality:<br />
					<select name="quality" size="1">
						<option value="excellent">Excellent</option>
						<option value="very">Very Good</option>
						<option value="good">Good</option>
						<option value="poor">Poor/Fair</option>
					</select>
				</td>
				<td>Appeal:<br />
					<select name="appeal" size="1">
						<option value="excellent">Excellent</option>
						<option value="very">Very Good</option>
						<option value="good">Good</option>
						<option value="poor">Poor/Fair</option>
					</select>
				</td>
				<td>Service:<br />
					<select name="service" size="1">
						<option value="excellent">Excellent</option>
						<option value="very">Very Good</option>
						<option value="good">Good</option>
						<option value="poor">Poor/Fair</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3">Remarks:<br /><textarea name="remarks" rows="5" cols="60"></textarea></td>
			</tr>
		</tbody>
	</table>
	<input type="submit" value="Post" />
</form>

<?php
require_once('../config.php');

$con=mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM myreviews ORDER BY review_date DESC");

echo "<table border=\"0\" width=\"100%\"> <tbody>";

while($row = mysqli_fetch_array($result))
{
	$rev = new Review($row);
	echo "<table style=\"border-style:solid; border-width:1px;\"border=\"0\" width=\"100%\"> <tbody>";
	echo "<tr><th colspan=\"3\"><table width=\"100%\"> <tbody><tr><td>" . $rev->get_name() . "</td>";
	echo "<td style=\"text-align: right;\">" . $rev->get_timestamp() ."</td></tr></tbody></table></tr>";
	echo "<tr><td style=\"width:33%; text-align:center\">Quality: " . $rev->get_quality() . "</td><td style=\"width:33%; text-align:center\">Appeal: " . $rev->get_appeal() . "</td><td style=\"width:33%; text-align:center\">Service: " . $rev->get_service() . "</td></tr>";
	//echo "<tr><td colspan=\"3\">Review:</td></tr>";
	echo "<tr><td colspan=\"3\"><table width=\"100%\"> <tbody><tr><td style=\"border:1px solid #FDD017;\">" . $rev->get_review() . "</td></tr></tbody></table></td></tr>";
	echo "</tbody></table>";
}

mysqli_close($con);

?>
</body>
</html>