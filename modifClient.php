<?php
$client=true;
include_once("header.php");
include_once 'main.php';

$id=$_GET['id'];
$sel="SELECT * FROM clients WHERE idClient=".$id;
$prep=$pdo->prepare($sel);
$prep->execute();
?>

<?php while($fab=$prep->fetch(PDO::FETCH_ASSOC)):?>
<h1 class="mt-5">Modifier le client <?php echo $fab["nom"]?></h1>	
<form class="row g-3" method="POST">
	<div class="col-md-6">
		<div class="col-md-6">
			<label for="nom" class="form-label">Nom</label>
			<input type="text" class="form-control" name="nom" value="<?php echo $fab["nom"]?>">
		</div>
		<div class="col-md-6">
			<label for="ville" class="form-label">Ville</label>
			<input type="text" class="form-control" name="ville" value="<?php echo $fab["ville"]?>">
		</div>
		<div class="col-md-6">
			<label for="telephone" class="form-label">Telephone</label>
			<input type="text" class="form-control" name="telephone" value="<?php echo $fab["telephone"]?>"><br>
			
		</div>
		<div class="col-12">
    <button type="submit" class="btn btn-primary" name="sub">Modifier</button>
  </div>
	</div>
</form>
<?php endwhile?>
<?php
$nom="";
$ville="";
$telephone=0;
if(isset($_POST['nom']) && isset($_POST['ville']) && isset($_POST['telephone'])) {
	$nom = $_POST['nom'];
	$ville = $_POST['ville'];
	$telephone = intval($_POST['telephone']);
	$upd = "UPDATE clients SET nom=:nom, ville=:ville, telephone=:telephone WHERE idClient=:id";
	$stmm = $pdo->prepare($upd);
	$stmm->bindParam(':nom', $nom);
	$stmm->bindParam(':ville', $ville);
	$stmm->bindParam(':telephone', $telephone);
	$stmm->bindParam(':id', $id);
	$stmm->execute();
	header("Location: client.php");
}
else
	echo "<script>alert(\"Veuillez remplir tout les champs\")";
?>

<?php include_once("footer.php");?>