<?php
	/*$username = 'u373364879_poda';
	$password = 'podatki12';
	$server = 'mysql.hostinger.co.uk';
	$db_name = 'u373364879_poda';*/

    $username = 'root';
	$password = '';
	$server = 'localhost';
	$db_name = 'excelshare';

	$link = mysqli_connect($server, $username, $password, $db_name);
	
	if(!$link){
	die('Napaka pri povezavi do baze: '.mysqli_error($link));
	} 
	
	//za delovanje šumnikov napišemo
	mysqli_query($link,"SET NAMES 'utf8'");
?>