
<?php include('connection.php');
    $msg="";
    
    if (isset($_POST['btnvalider'])){
			$sql= "INSERT INTO cv
			    (facebook,twitter,github)
			 VALUES (  '".mysqli_real_escape_string($link,$_POST['facebook'])."',
						  '".mysqli_real_escape_string($link,$_POST['twitter'])."',
						  '".mysqli_real_escape_string($link,$_POST['github'])."')";
			
			$result=mysqli_query($link,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
	}


?>
?>


    <!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

	<?php include('menu.php'); ?>

	<div class="row">
<form action="" role="form" method="POST" enctype="multipart/form-data">

		<span>

			<?php echo $msg; 	?>
</span>
	   <div class="row">
		<div class="container">
			<div class="well" id="top">
				<legend>formulaire d'inscription</legend>
			</div>
			<div class="well">
				<div class="form-group">
					<label for="">facebook:</label>
					<input type="text" class="form-control" name="facebook" value="<?php if (isset($_GET['id'])) echo $dataU['facebook']; ?>">
				</div>
				<div class="form-group">
					<label for="">twitter:</label>
					<input type="text" class="form-control" name="twitter" required value="<?php if (isset($_GET['id'])) echo $dataU['twitter']; ?>">
				</div>
				<div class="form-group">
					<label for="">github:</label>
					<input type="date" class="form-control" name="github" value="<?php if (isset($_GET['id'])) echo $dataU['github']; ?>">
				</div>

				 <div class="row">
					<button name="btnvalider" type="submit" class="btn btn-primary btn-lg btn-block">valider</button>
				</div>
			</div>
		</div>
</form>
