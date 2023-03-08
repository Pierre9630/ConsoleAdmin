<?php
include "index.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Formulaire Domaine</title>
  </head>
  <body>
    <h3> Formulaire Domaine </h3> <!--https://stackoverflow.com/questions/13766015/is-it-possible-to-configure-a-required-field-to-ignore-white-space?lq=1-->
    <form method="post" action="controller/controllerdom.php" required pattern="\S(.*\S)?">
      Nom du Domaine (de type test.com) : <input type="text" name="name" placeholder="Entrez le nom du domaine" maxlength='63' required pattern="\S(.*\S)?"/><br /><br />
      Code Client (Regarder dans Liste Clients) : <input type="text" name="domain_name_id" placeholder="Entrer le code client" maxlength='10' required /><br /><br />
      
      <input type="submit" value="Envoyer" />
    
    </form>
  </body>
</html>