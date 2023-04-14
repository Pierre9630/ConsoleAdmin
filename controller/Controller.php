<?php
  // Vérifie qu'il provient d'un formulaire Check if sent from website form.php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    serialize($corp_name = $_POST["corp_name"]);
    serialize($customer_first_name = $_POST["customer_first_name"]);
    serialize($customer_last_name = $_POST["customer_last_name"]);

    //Filtrage de la conformité de la saisie avec les regex Filter for a valid entries informations
    if (!isset($corp_name) || !filter_var($corp_name, FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/(?:\s*[a-zA-Z0-9,_\.\077\0100\*\+\&\#\'\~\;\-\!\@\;]{2,}\s*)*/")))){ ///([A-Z][A-Za-z]+ ?)+, (\w\.)+/
        die("Nom d'entreprise non valide ! <br><button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../form.php'\">Retour</button>");
    }
    if (!isset($customer_first_name) || !filter_var($customer_first_name, FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/(?:\s*[a-zA-Z0-9,_\.\077\0100\*\+\&\#\'\~\;\-\!\@\;]{2,}\s*)*/")))){
        die("Nom non valide ! <br><button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../form.php'\">Retour</button>");
    }
    if (!isset($customer_last_name) || !filter_var($customer_last_name, FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/(?:\s*[a-zA-Z0-9,_\.\077\0100\*\+\&\#\'\~\;\-\!\@\;]{2,}\s*)*/")))){
        die("Prenom non valide ! <br><button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../form.php'\">Retour</button>");
    }

   
    
    }
    
    require ("../db/connect.php"); //add pdo driver active connection rajoute la connexion active de connect.php
  
    try {
        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
        //     $password);
    // set the PDO error mode to exception met le driver pdo en expection si erreur
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // prepare sql and bind parameters Préparation de la requête et envoi des informations
        $stmt = $conn->prepare("INSERT INTO corp_customers (corp_name, customer_first_name, customer_last_name) 
    VALUES (:corp_name, :customer_first_name, :customer_last_name)");
        $stmt->bindParam(':corp_name', $corp_name);
        $stmt->bindParam(':customer_first_name', $customer_first_name);
        $stmt->bindParam(':customer_last_name', $customer_last_name);
    
    // insert a row Insertion dans les champs
        $corp_name = $_POST["corp_name"];
        $customer_first_name = $_POST["customer_first_name"];
        $customer_last_name = $_POST["customer_last_name"];
        $stmt->execute(); //execution de la requête dans la base de données
    
    
        echo "Données envoyées vers la base <img width=\"20px\" height=\"20px\"src=\"../media/sucess.png\"> <br><button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../customerslist.php'\">Retour</button> ";
    }
    catch(PDOException $e) //If query return a error si problème dans la requête
    {
        echo "Entrée dupliquée ou erreur sql <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../form.php'\">Retour</button>";
    }
    // try {
    //     // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
    //     //     $password);
    // // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // // prepare sql and bind parameters
    //     $stmt = $conn->prepare("INSERT INTO corp_customers (corp_name, customer_first_name, customer_last_name ) VALUES (:corp_name, :customer_first_name,:customer_last_name)");
    //     $stmt->bindParam(':corp_name', $corp_name);
    //     $stmt->bindParam(':customer_firstname', $customer_first_name);
    //     $stmt->bindParam(':customer_lastname', $customer_last_name);
    // // insert a row
        
    //     $corp_name = $_POST["corp_name"];
    //     $customer_first_name = $_POST["customer_first_name"];
    //     $customer_lastname = $_POST["customer_last_name"];
    //     $stmt->execute();
    
    
    //     echo "Données envoyées vers la base <img src=\"media/sucess.png\">";
    // }
    // catch(PDOException $e)
    // {
    //     echo "Error: " . $e->getMessage();
    // }
    $conn = null; //Close Connexion Fermeture de la connexion
    
