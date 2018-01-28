<?php include('connection.php');
    $msg="";


if (isset($_GET['id'])){
		$update="SELECT 
					resume,
					photo
					FROM codeuses
				   WHERE codeuses.id=".$_GET['id'];
	}
?>
 

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="witdth=device-width">
	<meta name="description" content="">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 
 <div>
<?php include('menu.php'); ?>

</div>
 <br>

<div class="row" id="top">
<div class="container">
 
 
 <?php 
    $n=1;
 while ($n < 4) { 
 	?>
		<div class="well">
			<div class="row">
			<div class="col-md-3"><img class="img-circle" src="img/img.jpg" " width="80px" height="80px" alt=""></div>
			<div class="col-md-3">codeuse et developpeuse web</div>
			<div class="col-md-3"><button class="btn btn-default" id="butt">consulter le cv</button></div>
		</div>
        </div>
			<?php $n++;
				} ?>
		
</div>
</div>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>
