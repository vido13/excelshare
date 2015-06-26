<?php 

    $stevilo_datoteke = (int) $_GET['id'];
    include_once 'db.php';

?>

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
    
    <script>
$(document).ready(function(){
    $('a#copy-dynamic').zclip({
        path:'js/ZeroClipboard.swf',
        copy:function(){return $('input#dynamic').val();}
    });
    // The link with ID "copy-dynamic" will copy the current value
    // of a dynamically changing input with the ID "dynamic"
});
        
    </script>
    
<script type="text/javascript">
    
    var myData1=[<?php 
    $data=mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke'");
    while($info=mysqli_fetch_array($data))
        echo $info['visina'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
    ?>];
    <?php
    $data=mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke'");
    ?>
    var myLabels1=[<?php 
    while($info=mysqli_fetch_array($data))
        echo '"'.$info['ime'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
    ?>];
    var chartVisina={
        "type":"bar",
        "title":{
            "text":"Višina-cm"
        },
        "scale-x":{
            "labels": myLabels1
        },
        "series":[
            {
                "values": myData1
            }
    ]
    };
        
    var myData2=[<?php
    $data=mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke'");
    while($info=mysqli_fetch_array($data))
        echo $info['teza'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
    ?>];
    <?php
    $data=mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke'");
    ?>
    var myLabels2=[<?php 
    while($info=mysqli_fetch_array($data))
        echo '"'.$info['ime'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
    ?>];
    var chartTeza={
        "type":"bar",
        "title":{
            "text":"Teža-kg"
        },
        "scale-x":{
            "labels": myLabels2
        },
        "series":[
            {
                "values": myData2
            }
    ]
    };
        
    var myData3=[<?php 
    $data=mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke'");
    while($info=mysqli_fetch_array($data))
        echo $info['starost'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
    ?>];
    <?php
    $data=mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke'");
    ?>
    var myLabels3=[<?php 
    while($info=mysqli_fetch_array($data))
        echo '"'.$info['ime'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
    ?>];
        var chartStarost={
        "type":"bar",
        "title":{
            "text":"Starost-leta"
        },
        "scale-x":{
            "labels": myLabels3
        },
        "series":[
            {
                "values": myData3
            }
    ]
    };
    
    var myVidSlabo4=[<?php 
    $result1 = mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke' AND vid ='slabo'");
    $count1 = mysqli_num_rows($result1); 
    echo $count1;
    ?>];
    var myVidDobro4=[<?php 
    $result2 = mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke' AND vid ='dobro'");
    $count2 = mysqli_num_rows($result2);
    echo $count2;
    ?>];
    var myVidOdlicno4=[<?php 
    $result3 = mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke' AND vid ='odlicno'");
    $count3 = mysqli_num_rows($result3);
    echo $count3;
    ?>];
    
      var chartVid={
            "type":"pie",
            "title":{
            "text":"Vid"
            },
            "series":[
                {"text":"Slabo","values":myVidSlabo4},
                {"text":"Dobro","values":myVidDobro4},
                {"text":"Odlično","values":myVidOdlicno4}
            ]
    };
    
    var mySluhSlabo4=[<?php 
    $result1 = mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke' AND sluh ='slabo'");
    $count1 = mysqli_num_rows($result1); 
    echo $count1;
    ?>];
    var mySluhDobro4=[<?php 
    $result2 = mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke' AND sluh ='dobro'");
    $count2 = mysqli_num_rows($result2);
    echo $count2;
    ?>];
    var mySluhOdlicno4=[<?php 
    $result3 = mysqli_query($link,"SELECT * FROM podatki WHERE tabela_id ='$stevilo_datoteke' AND sluh ='odlicno'");
    $count3 = mysqli_num_rows($result3);
    echo $count3;
    ?>];
        
        var chartSluh={
            "type":"pie",
            "title":{
            "text":"Sluh"
            },
            "series":[
                {"text":"Slabo","values":mySluhSlabo4},
                {"text":"Dobro","values":mySluhDobro4},
                {"text":"Odlično","values":mySluhOdlicno4}
            ]
    };
window.onload=function(){        
        zingchart.render({
        id:"chartVisina",
        data:chartVisina,
        height:400,
        width:"100%"
    });
        
        zingchart.render({
        id:"chartTeza",
        data:chartTeza,
        height:400,
        width:"100%"
    });
        
        zingchart.render({
        id:"chartStarost",
        data:chartStarost,
        height:400,
        width:"100%"
    });
        
        zingchart.render({
        id:"chartVid",
        data:chartVid,
            height:400,
        width:"100%"
    });
        
        zingchart.render({
        id:"chartSluh",
        data:chartSluh,
            height:400,
        width:"100%"
    });
    
};
</script>
    
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navigacija</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Prikaži</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Naloži</a>
                    </li>

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
                <h1 class="page-header">Prikaži<br/></h1>
                    <input style="text-align: center" id="dynamic" type="text" value="http://excelshare.96.lt/show.php?id=<?php echo $stevilo_datoteke; ?>" size="50" align="middle"> <p>Kopirajte to povezavo, da jo lahko delite z drugimi.</p>
            </div>
            
        </div><br/><br/>
        <!-- /.row -->

        <!-- Project One -->
        <div class="row">
                
                    <div id="chartVisina"></div>
                
            <!--<div class="col-md-5">
                <h3>Višina</h3>
            </div>-->
        </div>
        <!-- /.row -->

        <hr>
<center>
        <!-- Project Two -->
        <div class="row">

                    <div id="chartTeza"></div>

            <!--<div class="col-md-5">
                <h3>Teža</h3>
            </div>-->
        </div>
        <!-- /.row -->
        <hr>
        
        <!-- Project Two -->
        <div class="row">
                
                    <div id="chartStarost"></div>
                
            <!--<div class="col-md-5">
                <h3>Starost</h3>
            </div>-->
        </div>

        <hr>
        
        <!-- Project Two -->
        <div class="row">

                    <div id="chartVid"></div>

            <!--<div class="col-md-5">
                <h3>Vid</h3>
            </div>-->
        </div>

        <hr>
        
        <!-- Project Two -->
        <div class="row">
                
                    <div id="chartSluh"></div>
                
            <!--<div class="col-md-5">
                <h3>Sluh</h3>
            </div>-->
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
