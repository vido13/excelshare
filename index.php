<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Naloži</title>

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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/canvasjs.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/jquery.canvasjs.min.js"></script>
<script type="text/javascript" src="js/dropzone.js"></script>
<?php
    $uploadedStatus = 0;
if ( isset($_POST["submit"]) ) { 
if ( isset($_FILES["file"])) {
//if there was an error uploading the file
if ($_FILES["file"]["error"] > 0) {
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else {
if (file_exists($_FILES["file"]["name"])) {
unlink($_FILES["file"]["name"]);
}
$storagename = "excel.xls";
move_uploaded_file($_FILES["file"]["tmp_name"],  $storagename);
$uploadedStatus = 1;
    header("Location: upload_excel.php");
}
} else {
echo "Ni izbranega dokumenta. <br />";
}
} ?>
 
</head>

<body>
    
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Naloži</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Naloži
                </h1>
            </div>
        </div>
        <!-- /.row -->
<center>
    <a href="https://onedrive.live.com/download?cid=EE746AC4E4135E46&resid=EE746AC4E4135E46%21571&authkey=ABbvqscN6Xy9rzM" class="btn btn-default btn-lg">Prenesi primer excel dokumenta</a>
    
    
        <!-- Project One -->
        <div class="row">        
<form id="upload" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
<h2>Izberi dokument:</h2>
    <div style=" border-radius: 25px;
    border: 2px solid #555555;
    padding: 20px; 
    width: 450px; 
    height: 140px; "> 
<input type="file" name="file" class="btn btn-default btn-lg" style=" height: 5em; font-size: 20px;"/>  
        </div><br/>
<input type="submit" name="submit" class="btn btn-default btn-lg" value="Naloži" style=""/>  
     
            </form>
        </div>
</center>  
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Excel Share 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
