<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prikaži</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/zingchart.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.zclip.min.js"></script>
    
</head>

<?php 

require_once 'Excel/reader.php';
include_once 'db.php';

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('UTF-8');
$data->read('excel.xls');

$id_datoteke = rand(0,10000);

for ($x = 2; $x <= count($data->sheets[0]["cells"]); $x++) {
    $ime = $data->sheets[0]["cells"][$x][1];
    $teza = $data->sheets[0]["cells"][$x][2];
    $visina = $data->sheets[0]["cells"][$x][3];
    $starost = $data->sheets[0]["cells"][$x][4];
    $vid = $data->sheets[0]["cells"][$x][5];
    $sluh = $data->sheets[0]["cells"][$x][6];
    
    $query = "SELECT * FROM tabele WHERE id_datoteke = '$id_datoteke'";
		
		$result = mysqli_query($link, $query);
		if(mysqli_num_rows($result) == 1){

	   }else{
		$sql1 = "INSERT INTO tabele (id_datoteke) 
        VALUES ('$id_datoteke')";
    mysqli_query($link, $sql1);
        }
    
    $sql2 = "SELECT * FROM tabele WHERE id_datoteke ='$id_datoteke'";
		$result = mysqli_query($link, $sql2);
		$datoteka = mysqli_fetch_array($result);
    $id_tabele = $datoteka['id'];
    
    $sql3 = "INSERT INTO podatki (ime,teza,visina,starost,vid,sluh,tabela_id) 
        VALUES ('$ime','$teza','$visina','$starost','$vid','$sluh','$id_tabele')";
    mysqli_query($link, $sql3);
}

$veza = 'Location: http://excelshare.96.lt/show.php?id='.$id_tabele;
header($veza);

echo "Prosim obiščite to povezavo do svojega prikaza dokumenta <a href='http://excelshare.96.lt/show.php?id=$id_tabele'>!klikni tukaj!</a>"

?>