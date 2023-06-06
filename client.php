<?php
  $client=true;
  include_once("header.php");
  include_once("main.php");
?>
<?php 
  $query="select * from clients";
  $pdostmt=$pdo->prepare($query);
  $pdostmt->execute();
  $n=0;
?>
    <h1 class="mt-5">Clients</h1>
    <a href="addclient.php" class="btn btn-primary" style="float: right;margin-bottom: 20px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
      </svg>
    </a>
    <table id="tabe_test" class="display">
      <thead>
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>VILLE</th>
            <th>TELEPHONE</th>
            <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
          <td><?php echo $ligne["idClient"]?></td>
          <td><?php echo $ligne["nom"]?></td>
          <td><?php echo $ligne["ville"]?></td>
          <td><?php echo $ligne["telephone"]?></td>
          <td>
            <a href="modifClient.php?id=<?php echo $ligne["idClient"]?>" class="btn btn-success">
              <svg xmlns="http://www.w3.org/2000/svg" padding-right="2px"  width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
              </svg>
            </a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $n?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
              </svg>
            </button>
            <!-- Modal -->
           <div class="modal fade" id="exampleModal<?php echo $n?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">vouler vous vraiment supprimer le client ?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <a href="delete.php?x=<?php echo $ligne["idClient"]?>" class="btn btn-danger" id="supp" name="supp" >Supprimer</a>
                </div>
              </div>
            </div>
          </div>
        </td><?php $n++?>
      </tr><?php endwhile; ?>
      

    </tbody>
  </table>
</div>

</main>
<?php
  include_once("footer.php");
?> 