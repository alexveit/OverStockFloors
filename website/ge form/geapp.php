<?php

function encrypt_text($value)
{
   if(!$value) return false;
 
   $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, 'SECURE_STRING_1', $value, MCRYPT_MODE_ECB, 'SECURE_STRING_2');
   return trim(base64_encode($crypttext));
}

$name = $_POST['name'];
$dob = $_POST['dob'];
$ssn = $_POST['ssn'];
$homenumber = $_POST['homenumber'];
$mailaddress = $_POST['mailaddress'];
$othernumber = $_POST['othernumber'];
$addressprovide = $_POST['addressprovide'];
$contactname = $_POST['contactname'];
$address = $_POST['address'];
$housing = $_POST['housing'];
$netincome = $_POST['netincome'];
$employernumber = $_POST['employernumber'];
$relativenumber = $_POST['relativenumber'];
$email = $_POST['email'];

$name2 = $_POST['name2'];
$dob2 = $_POST['dob2'];
$ssn2 = $_POST['ssn2'];
$homenumber2 = $_POST['homenumber2'];
$mailaddress2 = $_POST['mailaddress2'];
$othernumber2 = $_POST['othernumber2'];
$addressprovide2 = $_POST['addressprovide2'];
$contactname2 = $_POST['contactname2'];
$address2 = $_POST['address2'];
$housing2 = $_POST['housing2'];
$netincome2 = $_POST['netincome'];
$employernumber2 = $_POST['employernumber2'];
$relativenumber2 = $_POST['relativenumber2'];
$email2 = $_POST['email2'];

$type = $_POST['type'];
$message = $_POST['message'];
$formcontent=" Name: $name| DOB: $dob| SSN: $ssn| Home #: $homenumber| Mailing Address: $mailaddress| Other/Cell #: $othernumber| Your/Contact: $addressprovide| Contact Person Name: $contactname| Street Address: $address| Housing information: $housing| Net Income: $netincome| Employer #: $employernumber| Relative #: $relativenumber| Email #: $email| Name: $name2| DOB: $dob2| SSN: $ssn2| Home #: $homenumber2| Mailing Address: $mailaddress2| Other/Cell #: $othernumber2| Your/Contact: $addressprovide2| Contact Person Name: $contactname2| Street Address: $address2| Housing information: $housing2| Net Income: $netincome2| Employer #: $employernumber2| Relative #: $relativenumber2| Email #: $email2";
$secure_formcontent = encrypt_text($formcontent);
$recipient = "josh.overstockfloors@yahoo.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $secure_formcontent, $mailheader) or die("Error!");
echo "Thank You!<br />Your information has been encrypted and submited";
?>
