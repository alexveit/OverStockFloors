<?php

function decrypt_text($value)
{
   if(!$value) return false;
 
   $crypttext = base64_decode($value);
   $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, 'SECURE_STRING_1', $crypttext, MCRYPT_MODE_ECB, 'SECURE_STRING_2');
   return trim($decrypttext);
}

$encrypted = $_POST['encrypted'];

$decrypted = decrypt_text($encrypted);

$lines = explode("|", $decrypted);

$i = 0;
foreach ($lines as &$value)
{
	if(13 == $i)
	{
		echo $value . '<br /><br /><br />';
		
	}
	else
	{
		echo $value . '<br />';
	}
	++$i;
}

?>



