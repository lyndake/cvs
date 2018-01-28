<?php include('connection.php');
$msg="";

if (isset($_POST['btnvalider'])){
			$sql= "INSERT INTO experiences
			    (organisation,postes,description,date_debut,date_fin,id_codeuses)
			 VALUES ( '".mysqli_real_escape_string($link,$_POST['organisation'])."',
						  '".mysqli_real_escape_string($link,$_POST['postes'])."',
						  '".mysqli_real_escape_string($link,$_POST['description'])."',
						  '".mysqli_real_escape_string($link,$_POST['date_debut'])."',
						  '".mysqli_real_escape_string($link,$_POST['date_fin'])."',
						  '".$_POST['id_codeuses']."')";
			
			$result=mysqli_query($link,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
		}
	}
	
	if (isset($_GET['id'])){
	$update="SELECT * FROM experiences WHERE id=".$_GET['id'];
	$res=mysqli_query($link,$update);
	$dataU=mysqli_fetch_array($res);

 }

	if (isset($_GET['sup'])){
	$delete="DELETE FROM experiences WHERE id=".$_GET['sup'];
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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="witdth=device-width">
	<meta name="description" content="">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

	<div class="row"> <!--menu -->
			<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bg-navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
					<a class="navbar-brand" href="index.php">Sheisthecode cv</a>
				</div>
				<div class="collapse navbar-collapse bg-navabar-collapse" role="navigation">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="propos.php">A propos</a>
						</li>
						<li>
							<a href="">user</a>
						</li>
					</ul>
				</div>
			</div>
				
			</nav>
		</div>

<br>
	<div class="row">
<form action="" role="form" method="POST">

		<span>

			<?php echo $msg; 	?>
</span>
	   <div class="row">
		<div class="container">
			<div class="well" id="top">
				<legend>ajouter experiences</legend>
			</div>
			<div class="well">
				<div class="form-group">
					<label for="">organisation:</label>
					<input type="text" class="form-control" name="organisation" value="<?php if (isset($_GET['id'])) echo $dataU['organisation']; ?>">
				</div>
				<div class="form-group">
					<label for="">postes:</label>
					<input type="text" class="form-control" name="postes" required value="<?php if (isset($_GET['id'])) echo $dataU['postes']; ?>">
				</div>
			</div>
				<div class="form-group">
					<label for="">description:</label>
					<input type="text" class="form-control" name="description" required value="<?php if (isset($_GET['id'])) echo $dataU['description']; ?>">
				</div>
			</div>
				<div class="form-group">
					<label for="">date de debut:</label>
					<input type="date" class="form-control" name="date_debut" required value="<?php if (isset($_GET['id'])) echo $dataU['date_debut']; ?>">
				</div>
				<div class="form-group">
					<label for="">Date de fin:</label>
					<input type="date" class="form-control" name="date_fin" value="<?php if (isset($_GET['id'])) echo $dataU['date_fin']; ?>">
				</div>
				<div class="form-group">
				 <label for="">id_codeuses:</label>
					<select class="form-control" name="id_codeuses">
					<?php
					
					$sqlcodeuses="SELECT * FROM codeuses";
					$repcodeuses=mysqli_query($link,$sqlcodeuses);
					while ($datacat=mysqli_fetch_array($repcodeuses)) {
						?>
						<option value="<?php echo $datacat['id'];?>">
						<?php echo $datacat['id'].'-'.$datacat['nom'];?>
						</option>

						<?php
					   }
					?>
				</select>
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
							<th>organisation</th>
							<th>postes</th>
							<th>description</th>
							<th>date_debut</th>
							<th>date_fin</th>
							<th>id_codeuses</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT
							organisation,
							postes,
							description,
							date_debut,
							date_fin,
							codeuses.nom
							FROM experiences
							INNER JOIN codeuses
							ON experiences.id_codeuses = codeuses.id";
							$res= mysqli_query($link,$list);
	      while ($data= mysqli_fetch_array($res)){
								?>
								<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['organisation']; ?></td>
							<td><?php echo $data['postes']; ?></td>
							<td><?php echo $data['description']; ?></td>
							<td><?php echo $data['date_debut']; ?></td>
							<td><?php echo $data['date_fin']; ?></td>
							<td><?php echo $data['nom']; ?></td>
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


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>
