<?php
require_once('config.php');

$con=mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$prod_result = mysqli_query($con,"SELECT * FROM product ORDER BY product_id");

while($prod_row = mysqli_fetch_array($prod_result))
{
	$url_result = mysqli_query($con,"SELECT * FROM url_alias ORDER BY url_alias_id");
	
	$myquery = "product_id=" . $prod_row['product_id'];
		
	$has = false;
	
	while($url_row = mysqli_fetch_array($url_result))
	{
		if($url_row['query'] == $myquery)
		{
			$has = true;
			//echo $url_row['query'] . "<br />";
			break;
		}
	}
	
	if(!$has)
	{
		
		
		$temp = $prod_row['model'];
		$newval = preg_replace('/ /', '-',$temp);
		
		$insertval = "INSERT INTO url_alias (query, keyword) VALUES ('" . $myquery . "', '" . $newval . "');";
		
		//mysqli_query($con,$insertval);
		
		echo $insertval . "<br />";
	}
}

mysqli_close($con);

?>