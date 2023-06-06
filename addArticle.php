<?php
$articles=true;
include_once("header.php");
include_once("main.php");
?>
<h1 class="mt-5">Ajouter un Article</h1>
<form class="row g-3" method="POST">
  <div class="col-md-6">
    <label for="idd" class="form-label">Reference</label>
    <input type="text" class="form-control" id="idd" name="idd" required>
  </div>
  <div class="col-md-6">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description"required>
  </div>
  <div class="col-12">
    <label for="prix" class="form-label">Prix</label>
    <input type="text" class="form-control" id="prix" name="prix"required>
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="sub">Ajouter</button>
  </div>
<?php
    $id="";
    $nom="";
    $description="";
    $telephone="";
    if(isset($_POST['idd']))
      $id=intval($_POST['idd']);
    if(isset($_POST['description']))
      $description=$_POST['description'];
    if(isset($_POST['prix']))
      $prix=floatval($_POST['prix']);
      
      if(!empty($id) && !empty($description) && !empty($prix))
      {
        $req2="INSERT INTO article (idArticle,description,prix_unitaire) VALUES (".$id.", '".$description."', '".$prix."');";
        $res=$pdo->exec($req2);
      }
    ?>
  
</form>
</div>
</main>


<?php include_once("footer.php");?>