<?php
$commandes=true;
include_once("header.php");
include_once("main.php");
?>
<?php
$selCli="SELECT idClient FROM clients";
$stm1=$pdo->prepare($selCli);
$stm1->execute();
$selart="SELECT idArticle FROM article";
$stm2=$pdo->prepare($selart);
$stm2->execute();?>
<h1 class="mt-5">Ajouter une Commande</h1>
<form class="row g-3" method="POST">
  <div class="col-md-6">
    <label for="idd" class="form-label">ID Client</label>
    <select name="idd" required><?php foreach ($stm1->fetchAll(PDO::FETCH_NUM) as $tab) 
    {
      foreach($tab as $elem)
        echo "<option value=\"".$elem."\">".$elem."</option>";
    }?></select>
  </div>
  <div class="col-md-6">
    <label for="ref" class="form-label">Reference article </label>
    <select name="ref" required><?php 
    foreach($stm2->fetchAll(PDO::FETCH_NUM)AS$tab)
    {
      foreach($tab as $elem)
        echo "<option value=\"".$elem."\">".$elem."</option>";
    }?>
    </select>
  </div><?php $stm1->closeCursor();$stm2->closeCursor();?>
  <div class="col-12">
    <label for="qte" class="form-label">qte</label>
    <input type="nubmer" class="form-control" name="qte"required>
  </div>
  <div class="col-12">
    <label for="dt" class="form-label">Date</label>
    <input type="date" class="form-control" name="dt"required>
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="sub">ajouter</button>
  </div>
<?php
    $idC=$_GET['x'];
    $idCC=0;
    $rf=0;
    $qte="";
    $date="";
    $ro1="UPDATE commandes SET idClient=:idcc, dateC=:dd WHERE idCommande=:idc";
    $mystm1=$pdo->prepare($ro1);
    $ro2="UPDATE ligne_cmmd SET idArticle=:ida, qte=:qte WHERE idCommande=:idc";
    $mystm2=$pdo->prepare($ro2);
    if(isset($_POST['idd']))
      $idCC=intval($_POST['idd']);
    if(isset($_POST['ref']))
      $rf=intval($_POST['ref']);
    if(isset($_POST['qte']))
      $qte=$_POST['qte'];
    if(isset($_POST['dt']))
      $date=intval($_POST['dt']);
      
      if(!empty($idCC) &&!empty($idC) && !empty($rf) && !empty($qte) && !empty($date))
      {
        $mystm1->bindParam(':idc',$idC);
        $mystm1->bindParam(':idcc',$idCC);
        $mystm1->bindParam(':dd',$date);
        $mystm2->bindParam(':idc',$idC);
        $mystm2->bindParam(':ida',$rf);
        $mystm2->bindParam(':qte',$qte);
        $mystm1->execute();
        $mystm2->execute();
      }
    ?>
  
</form>
</div>
</main>


<?php include_once("footer.php");?>