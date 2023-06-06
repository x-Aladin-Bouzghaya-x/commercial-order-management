<?php
$client=true;
include_once("header.php");
include_once("main.php");
?>
<h1 class="mt-5">Ajouter un client</h1>
<form class="row g-3" method="POST">
  <div class="col-md-6">
    <label for="idd" class="form-label">ID</label>
    <input type="text" class="form-control" id="idd" name="idd" required>
    <label for="nom" class="form-label">NOM</label>
    <input type="text" class="form-control" id="nom" name="nom" required>
  </div>
  <div class="col-md-6">
    <label for="ville" class="form-label">Ville</label>
    <input type="text" class="form-control" id="ville" name="ville"required>
  </div>
  <div class="col-12">
    <label for="telephone" class="form-label">Telephone</label>
    <input type="text" class="form-control" id="telephone" name="telephone"required>
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="sub">ajouter</button>
  </div>
<?php
    $id="";
    $nom="";
    $ville="";
    $telephone="";
    if(isset($_POST['idd']))
      $id=intval($_POST['idd']);
    if(isset($_POST['nom']))
      $nom=$_POST['nom'];
    if(isset($_POST['ville']))
      $ville=$_POST['ville'];
    if(isset($_POST['telephone']))
      $telephone=intval($_POST['telephone']);
      
      if(!empty($id) && !empty($nom) && !empty($ville) && !empty($telephone))
      {
        $req2="INSERT INTO clients (idClient,nom,ville,telephone) VALUES (".$id.", '".$nom."', '".$ville."', '".$telephone."');";
        $res=$pdo->exec($req2);
      }
    ?>
  
</form>
</div>
</main>


<?php include_once("footer.php");?>