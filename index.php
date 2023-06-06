<?php
  $index=true;
  include_once("header.php");
  include_once("main.php");
?>
<?php
  $req="SELECT clients.idClient, clients.nom, clients.ville, clients.telephone, commandes.nb FROM clients JOIN(SELECT idClient, COUNT(*) AS nb FROM commandes GROUP BY idClient) commandes ON clients.idClient = commandes.idClient";
  $stm=$pdo->prepare($req);
  $stm->execute();?>

    <h1 class="mt-5">Acceuil</h1>

    <table id="tabe_test" class="display">
    <thead>
        <tr>
            <th>ID Clients</th>
            <th>Clients</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Nombre de commande</th>
        </tr>
    </thead>
    <tbody>
      <?php while($ligne=$stm->fetch(PDO::FETCH_ASSOC)):?>
        <tr><?php $n=$ligne["idClient"]?>
            <td><?php echo $ligne["idClient"]?></td>
            <td><?php echo $ligne["nom"]?></td>
            <td><?php echo $ligne["ville"]?></td>
            <td><?php echo $ligne["telephone"]?></td>
            <td><?php echo $ligne["nb"]?></td>
        </tr>
    </tbody><?php endwhile?>
</table>

  </div>
</main>
<?php
  include_once("footer.php");
?>  