<html>
<head>
<title> My name is </title>
</head>

<body>

<?php 
	$user = '024002';
	$phone = '7066432056';
	$reverse = '0';
	$antiaon = '0';
	$sipnumber = '100002';
	$secret = '0.scxgdn60xl';

	$hashString = join('+', array($antiaon, $phone, $reverse, $sipnumber, $user, $secret));
	$hash = md5($hashString);

	$url = 'https://sipuni.com/api/callback/call_number';
	$query = http_build_query(array(
		'antiaon' => $antiaon,
		'phone' => $phone,
		'reverse' => $reverse,
		'sipnumber' => $sipnumber,
		'user' => $user,
		'hash' => $hash
	));
	print($query);
	echo "\r\n";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	echo $output;
	$output = json_decode($output, true);
	echo implode(" ",  $output);
	curl_close($ch);


?>

</body>

</html>