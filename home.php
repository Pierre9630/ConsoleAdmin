<?php
include "index.php";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Accueil</title>
</head>

<body>

  <h2>Bienvenue !</h2>
  

    <div>
      <h5 id="demo">Vous êtes à l'accueil. Parcourez le Site à l'aide des différents onglets.</h5>

    </div>
    <script type="text/JavaScript">

      // Function is called, return 
      // value will end up in x
      var x = myFunction(11, 10);   
      document.getElementById("demo").innerHTML = x;
        
      // Function returns the product of a and b
      function myFunction(a, b) {
        return a * b;             
      }
  </body>
  <footer>
  </footer>
</html>