<?php
include_once("main.php");
$idClient=0;
$idcommande=0;
$idArticle=0;
$req1="DELETE FROM clients WHERE idClient=:id";
$delCli=$pdo->prepare($req1);
$req2="DELETE FROM commandes WHERE idcommande=:id";
$deliCmd=$pdo->prepare($req2);
$req3="DELETE FROM ligne_cmmd WHERE idcommande=:id";
$deliLG=$pdo->prepare($req3);
$req4="DELETE FROM article WHERE idArticle=:id";
$delArt=$pdo->prepare($req4);

?>
<?php 
if(isset($_GET['idClient']))
{
	$idClient=$_GET['idClient'];
	$delCli->bindParam(':id',$idClient);
	$delCli->execute();
    header('Location:client.php');
}
?>
<?php
if(isset($_GET['idCmd']))
{
	$idcommande=$_GET['idCmd'];
	$deliCmd->bindParam(':id',$idcommande);
	$deliCmd->execute();
	$deliLG->bindParam(':id',$idcommande);
	$deliLG->execute();
    header('Location:commandes.php');
}
?>
<?php
if(isset($_GET['idA']))
{
	$idArticle=$_GET['idA'];
	$delArt->bindParam(':id',$idArticle);
	$delArt->execute();
	header("Location:articles.php");
}

