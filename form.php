<?php
include "index.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Formulaire Client</title>
  </head>
  <body>
    <h3> Formulaire Client</h3>
    <form method="post" action="controller/Controller.php">
      
      Nom Entreprise : <input type="text" name="corp_name" placeholder="Entrer le nom de l'entreprise" maxlength='50'/><br /><br />
      Nom du Résponsable : <input type="text" name="customer_first_name" placeholder="Entrer le nom de l'entrepreneur" maxlength='50'/><br /><br />
      Prénom du Resposable : <input type="text" name="customer_last_name" placeholder="Entrer le prénom de l'entreprise" maxlength='50' /><br /><br />
      <input type="submit" value="Envoyer" />
    
    </form>
  </body>
</html>