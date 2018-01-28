
<?php
session_start();?>

<?php include('connection.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

</head>
	<body>
		<?php include('menu.php'); ?>

		<br>
		
		<div class="container">

			<div class="row" >
				<div class="well" id="log">

					<form action="" method="POST" role="form">

						<div class="form-group">
							<label for="">EMAIL:</label>
							<input type="email" name="email" class="form-control" id="" placeholder="Exemple@email.com">
						</div>

						<div class="form-group">
							<label for="">MOT DE PASSE:</label>
							<input type="password" name="mdp" class="form-control" id="" placeholder="Saisir le mot de passe">
						</div>
					
						<a href="dashboard.php"><button type="submit" name= "btnvalider" class="btn btn-primary btn-lg btn-block">valider</button></a>
					</div>
					</form>

					<?php if (isset($_POST['btnValider']) ){

								$sql="SELECT * FROM codeuses WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' AND password='".mysqli_real_escape_string($link,md5($_POST['mdp']))."' LIMIT 0,1";
								$req= mysqli_query($link,$sql);
								if (mysqli_num_rows($req)>0) {
									$data= mysqli_fetch_array($req);
									$_SESSION['variable']=$data['id'];
									header('location:dashboard.php');
								}else{
									echo "identifiants incorrects";
								}
						} ?>
					<br>
				</div>

			</div>

		</div>



		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>