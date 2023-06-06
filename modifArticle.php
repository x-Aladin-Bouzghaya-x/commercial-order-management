<?php
$articles=true;
include_once("header.php");
include_once 'main.php';

$id=$_GET['x'];
$sel="SELECT * FROM article WHERE idArticle=".$id;
$prep=$pdo->prepare($sel);
$prep->execute();
?>

<?php while($fab=$prep->fetch(PDO::FETCH_ASSOC)):?>
<h1 class="mt-5">Modifier l'Article <?php echo $fab["idArticle"]?></h1>	
<form class="row g-3" method="POST">
	<div class="col-md-6">
		<div class="col-md-6">
			<label for="description" class="form-label">Description</label>
			<input type="description" class="form-control" name="description" value="<?php echo $fab["description"]?>">
		</div>
		<div class="col-md-6">
			<label for="prix" class="form-label">Prix</label>
			<input type="text" class="form-control" name="prix" value="<?php echo $fab["prix_unitaire"]?>"><br>
			
		</div>
		<div class="col-12">
    <button type="submit" class="btn btn-primary" name="sub">Modifier</button>
  </div>
	</div>
</form>
<?php endwhile?>
<?php
$des="";
$prix=0;
if(isset($_POST['description']) && isset($_POST['prix'])) 
{
	$des = $_POST['description'];
	$prix = floatval($_POST['prix']);
	$upd = "UPDATE article SET description=:description, prix_unitaire=:prix WHERE idArticle=:id";
	$stmm = $pdo->prepare($upd);
	$stmm->bindParam(':id', $id);
	$stmm->bindParam(':description', $des);
	$stmm->bindParam(':prix', $prix);
	$stmm->execute();
	echo "<script>window.open(\"articles.php\",\"_SELF\");</script>";
}
else
	echo "<script>alert(\"Veuillez remplir tout les champs\")";
?>

<?php include_once("footer.php");?>