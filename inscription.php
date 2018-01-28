



<?php include('connection.php');
	$msg="";

if (isset($_POST['btnvalider'])){
	if (move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/'.$_FILES['photo']['name'])) {
			$sql= "INSERT INTO codeuses
			    (nom,prenom,naissance,resume,email,telephone,password,photo,specialisation)
			 VALUES (  '".mysqli_real_escape_string($link,$_POST['nom'])."',
						  '".mysqli_real_escape_string($link,$_POST['prenom'])."',
						  '".mysqli_real_escape_string($link,$_POST['naissance'])."',
						  '".mysqli_real_escape_string($link,$_POST['resume'])."',
						  '".mysqli_real_escape_string($link,$_POST['email'])."',
						  '".mysqli_real_escape_string($link,$_POST['telephone'])."',
						  '".mysqli_real_escape_string($link,$_POST['password'])."',
						  '".($_FILES['photo']['name'])."',
						  '".mysqli_real_escape_string($link,$_POST['specialisation'])."')";
			
			$result=mysqli_query($link,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}
	}


   if (isset($_GET['id'])){
	$update="SELECT * FROM codeuses WHERE id=".$_GET['id'];
	$res=mysqli_query($link,$update);
	$dataU=mysqli_fetch_array($res);

 }


	if (isset($_GET['sup'])){
	$delete="DELETE FROM codeuses WHERE id=".$_GET['sup'];
	$res=mysqli_query($link,$delete);
}

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
	<br>

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
					<label for="">nom:</label>
					<input type="text" class="form-control" name="nom" value="<?php if (isset($_GET['id'])) echo $dataU['nom']; ?>">
				</div>
				<div class="form-group">
					<label for="">prenom:</label>
					<input type="text" class="form-control" name="prenom" required value="<?php if (isset($_GET['id'])) echo $dataU['prenom']; ?>">
				</div>
				<div class="form-group">
					<label for="">date de naissance:</label>
					<input type="date" class="form-control" name="naissance" value="<?php if (isset($_GET['id'])) echo $dataU['naissance']; ?>">
				</div>
				<div class="form-group">
					<label for="">resume:</label>
					<input type="text" class="form-control" name="resume" value="<?php if (isset($_GET['id'])) echo $dataU['resume']; ?>">
				</div>
				<div class="form-group">
					<label for="">email:</label>
					<input type="text" class="form-control" name="email" value="<?php if (isset($_GET['id'])) echo $dataU['email']; ?>">
				</div>
				<div class="form-group">
					<label for="">telephone:</label>
					<input type="text" class="form-control" name="telephone" value="<?php if (isset($_GET['id'])) echo $dataU['telephone']; ?>">
				</div>
				<div class="form-group">
					<label for="">password:</label>
					<input type="password" class="form-control" name="password" value="<?php if (isset($_GET['id'])) echo $dataU['password']; ?>">
				</div>
				<div class="form-group">
							<label for="">photo:</label>
							<input name="photo" type="file" class="form-control" id="" >
							<div class="form-group">
				</div>
				<div class="form-group">
					<label for="">specialisation:</label>
					<input type="text" class="form-control" name="specialisation" value="<?php if (isset($_GET['id'])) echo $dataU['specialisation']; ?>">
				</div>
				 <div class="row">
					<button name="btnvalider" type="submit" class="btn btn-primary btn-lg btn-block">valider</button>
				</div>
			</div>
		</div>
</form>

			<div class="row">
				<table class="table" id="bas">
					<thead>
						<tr>
							<th>Numero</th>
							<th>nom</th>
							<th>prenom</th>
							<th>naissance</th>
							<th>resume</th>
							<th>email</th>
							<th>telephone</th>
							<th>password</th>
							<th>photo</th>
							<th>specialisation</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM codeuses";
							$res= mysqli_query($link,$list);
		  while ($data= mysqli_fetch_array($res)){
								?>
								<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['nom']; ?></td>
							<td><?php echo $data['prenom']; ?></td>
							<td><?php echo $data['naissance']; ?></td>
							<td><?php echo $data['resume']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['telephone']; ?></td>
							<td><?php echo $data['password']; ?></td>
								<td><img src="upload/<?php echo $data['photo'];  ?>" width="30px" height="30px" alt=""></td>
							<td><?php echo $data['specialisation']; ?></td>
							<td>
					<a href="?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-info">Modifier</button></a>

					 <a href="?sup=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
							</td>
						</tr>
						
						<?php $n++;
						 } ?>
					 
					 </tbody>
				</table>

			</div>
			

		</div>
</div>