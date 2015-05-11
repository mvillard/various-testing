<?php

$nbLetter = 32;

$mypwd = 'mypassword';
$mysalt = generateRandomString($nbLetter);

echo '
		My password = '.$mypwd.'<br />
		My salt = '.$mysalt.'<br />
		My password hash = '.hashpassword($mypwd,$mysalt);

function hashpassword ($pwd, $salt) {
	return md5($salt.$pwd).':'.$salt;
}


function getBase62Char($num) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	return $chars[$num];
}

function generateRandomString($nbLetter){
	$randString="";
	for($i=0; $i < $nbLetter; $i++){
		$randChar = getBase62Char(mt_rand(0,61));
		$randString .= $randChar;
	}
	return $randString;
}