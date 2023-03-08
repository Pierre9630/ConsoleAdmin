<?php
include "index.php";
include_once "format_javascript.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bonus</title>    
  </head>
  <body>
    
    <h2> Bienvenue !</h2>
    <div class=>

        <div >
            <h5> Bien Joué vous avez trouvé mon easter egg, Voici quelques lignes de codes javascript courantes mais intéressantes que j'ai retrouvé
				<br> (le formatter javascript en php n'est pas encore parfait^^ ) </h5>

            <pre>
				<?php 
					echo format_javascript(file_get_contents("js/scriptbonus.js"));?>

            	</pre>
            
        </div>
  </body>
  <footer>
  </footer>
</html>