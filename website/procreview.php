<html>
<head>
<style>
	body
	{
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
</style>

</head>

<body>
<?php

require_once('../config.php');

class Info
{
	private $name;
	private $phone;
	private $email;
	private $quality;
	private $appeal;
	private $service;
	private $remarks;
	private $datetime;
	
	private $fields;

	public function __construct()
	{
		$this->name = $_POST['name'];
		$this->phone = $_POST['phone'];
		$this->email = $_POST['email'];
		$this->quality = $_POST['quality'];
		$this->appeal = $_POST['appeal'];
		$this->service = $_POST['service'];
		$this->remarks = $_POST['remarks'];
		date_default_timezone_set('America/New_York');
		$this->datetime = getdate();
		
		$this->fields = "review_name, review_phone, review_email, review_quality, review_appeal, review_service, review_date, review_review";
	}
	
	public function proc()
	{
		$dt = $this->datetime['year'] . "-" . $this->datetime['mon'] . "-";
		$dt .= $this->datetime['mday'] . " " . $this->datetime['hours'] . ":";
		$dt .= $this->datetime['minutes'] . ":" . $this->datetime['seconds'];
		
		$quali;
		$appel;
		$serv;
		
		switch($this->quality)
		{
		case "good": $quali = 2; break;
		case "poor": $quali = 1; break;
		case "very": $quali = 3; break;
		default: $quali = 4; break;
		}
		
		switch($this->appeal)
		{
		case "good": $appel = 2; break;
		case "poor": $appel = 1; break;
		case "very": $appel = 3; break;
		default: $appel = 4; break;
		}
		
		switch($this->service)
		{
		case "good": $serv = 2; break;
		case "poor": $serv = 1; break;
		case "very": $serv = 3; break;
		default: $serv = 4; break;
		}
		
		$vals = "'" . $this->name . "', '" . $this->phone . "', '" . $this->email . "', ";
		$vals .= $quali . ", " . $appel . ", " . $serv . ", '" . $dt . "', '" . $this->remarks . "'";
		
		$ins = "INSERT INTO myreviews (" . $this->fields . ") VALUES (" . $vals . ");";
		
		echo $ins;
		
		$con = mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		// Check connection
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return;
		}
		
		mysqli_query($con,$ins);
		
		mysqli_close($con);
		
		$recipient = "alex.wveit@gmail.com";
		$subject = "New OSF Review";
		
		$formcontent = "Name: $this->name\nPhone #: $this->phone\nEmail: $this->email\nQuality: $this->quality\n";
		$formcontent .= "Appeal: $this->appeal\nService: $this->service\nRemarks: $this->remarks\nDateTime: $dt";
		$mailheader = "From: $this->email \r\n";
		
		mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
		
		echo "Thank you for your review!<br /><a href=\"myreviews.php\">Back</a>";
	}
}

$info = new Info();

$info->proc();

?>
</body>
</html>