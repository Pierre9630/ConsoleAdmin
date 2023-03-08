<?php
include "index.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Formulaire Modification Domaine</title>
  </head>
  <body>
    <h3> Formulaire Modification du Domaine</h3>
    <form method="post" action="controller/modify.php">
      Nom du Domaine (de type test.com) : <input type="text" name="name" placeholder="Entrez le nom du domaine" maxlength='63' /><br /><br />
      Code Client (Regarder dans Liste Clients) : <input type="text" name="domain_name_id" placeholder="Entrer le code client" maxlength='10' /><br /><br />
      Nouveau Nom du Domaine (de type test.com) : <input type="text" name="newname" placeholder="Entrez le nom du domaine" maxlength='63' /><br /><br />
      <input type="submit" value="Envoyer" />
    
    </form>
  </body>
</html>