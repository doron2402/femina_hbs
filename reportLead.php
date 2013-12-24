<?php


$CmpCode = '45872';


if (isset($_POST['Result']) && $_POST['Result'] > 0){
	$file = 'data.json';

	$data = json_decode(file_get_contents($file));

	$x = ($data->total_user * $data->questions) + $_POST['Result'];
	$y = $data->total_user + 1;
	
	$new_avg = $x / $y;
	$newData = json_encode(array('total_user' => $y, 'questions' => $new_avg));

	file_put_contents($file, $newData);

	echo $newData;
}


$to = $_POST['Email'];
$subject = "פמינה קופון";


$message = '<html><body>';
$message .= '<table rules="all">';
$message .= '<tr><td><img src="http://cmp.interactivated.co.il/McCann/Altman/2011/Seker/src/img/coupon.jpg" alt="Femina" /></td></tr>';
$message .= "</table>";
$message .= "</body></html>";


$headers = "From:  admin@activated.co.il" . " \r\n";
$headers .= "Reply-To: admin@activated.co.il". " \r\n";
$headers .= "MIME-Version: 1.0 \r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();


//Checking if its a COUPON 
if ( isset($_POST['Coupon']) && isset($_POST['Email']) )
{
	$CmpCode = '85875';
	//Send email
	$mail_sent = mail($to,$subject,$message,$headers);
	echo 'Email sent to: '. $to;
}

$str = "http://leads.interactivated.co.il/newLeads.php?Cmp_Code=".$CmpCode."&First_Name=" . urlencode($_POST['FirstName']) ."&Last_Name=" . urlencode($_POST['LastName']) ."&Phone=" . urlencode($_POST['Phone']) .
 "&Email=". urlencode($_POST['Email']) ."&Company=". urlencode($_POST['Company']) . "&agreenews=". urlencode($_POST['AgreeNews']) ."&Field_1=". urlencode($_POST['Field_1']) ."&Field_2=". urlencode($_POST['Field_2']) ."&Field_3=". urlencode($_POST['Field_3']) ."&Field_4=". urlencode($_POST['Field_4']) ."&Field_5=". urlencode($_POST['Field_5']) ."&Field_6=". urlencode($_POST['Field_6']) ."&Media=" . urlencode($_POST['Media']) . "&Erate=" . urlencode($_POST['Erate']) .
 "&Channel=" . urlencode($_POST['Channel']) . "&Prod=" .  urlencode($_POST['Prod']) . '&Size=' .
 urlencode($_POST['Size']);

$ch = curl_init($str);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);       
curl_close($ch);

echo $str;

die();



?>
