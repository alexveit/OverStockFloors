<?php
require_once('config.php');

$con=mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$prod_result = mysqli_query($con,"SELECT * FROM product WHERE manufacturer_id=21 ORDER BY product_id");

$hardwood = 20;
$engineered = 27;
$laminate = 25;
$lvt = 61;
$solid = 26;
$eng_brand = 147;
$sol_brand = 146;

$lam_brand = 156;

$do_suff = true;

while($prod_row = mysqli_fetch_array($prod_result))
{
	$cat_result = mysqli_query($con,"SELECT * FROM product_to_category WHERE product_id=" . $prod_row['product_id'] . " ORDER BY product_id");
	
	//echo $prod_row['model'] . "<br />";
	
	if($do_suff)
	{
		$dodb = true;
	
		$is_eng = false;
		$is_sol = false;
		$is_lam = false;
		$is_lvt = false;
		
		$has_eng = false;
		$has_sol = false;
		$has_hard = false;
		
		$has_brand = false;
		
		while($cat_row = mysqli_fetch_array($cat_result))
		{
			if($cat_row['category_id'] == $lvt)
			{
				$is_lvt = true;
			}
			if($cat_row['category_id'] == $lam_brand)
			{
				$has_brand = true;
			}
		
		
		
		
			/*if($cat_row['category_id'] == $laminate)
			{
				$is_lam = true;
			}
			if($cat_row['category_id'] == $lam_brand)
			{
				$has_brand = true;
			}
			
			if($cat_row['category_id'] == $engineered)
			{
				$is_eng = true;
			}
			else if($cat_row['category_id'] == $solid)
			{
				$is_sol = true;
			}
			else if($cat_row['category_id'] == $eng_brand)
			{
				$has_eng = true;
			}
			else if($cat_row['category_id'] == $sol_brand)
			{
				$has_sol = true;
			}
			else if($cat_row['category_id'] == $hardwood)
			{
				$has_hard = true;
			}*/
		}
		
		/*if(($is_eng || $is_sol) && !$has_hard)
		{
			$ins = "INSERT INTO product_to_category (product_id, category_id) VALUES (" . $prod_row['product_id'] . ", " . $hardwood . ");";
			if($dodb)
				mysqli_query($con,$ins);
			echo $ins . "<br />";
		}
		
		if($is_eng && !$has_eng)
		{
			$ins = "INSERT INTO product_to_category (product_id, category_id) VALUES (" . $prod_row['product_id'] . ", " . $eng_brand . ");";
			if($dodb)
				mysqli_query($con,$ins);
			echo $ins . "<br />";
		}
		else if($is_sol && !$has_sol)
		{
			$ins = "INSERT INTO product_to_category (product_id, category_id) VALUES (" . $prod_row['product_id'] . ", " . $sol_brand . ");";
			if($dodb)
				mysqli_query($con,$ins);
			echo $ins . "<br />";
		}*/
		
		if($is_lvt && !$has_brand)
		{
			$ins = "INSERT INTO product_to_category (product_id, category_id) VALUES (" . $prod_row['product_id'] . ", " . $lam_brand . ");";
			if($dodb)
				mysqli_query($con,$ins);
			echo $ins . "<br />";
		}
	}
}

mysqli_close($con);

?>