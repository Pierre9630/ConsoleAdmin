<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //var_dump($_POST);
    //die();
    $domain_name_id = $_POST['delete'];    
          
}    
  
    

    
    include ("../db/connect.php"); //add pdo driver active connection rajoute la connexion active de connect.php
    
    try {
        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
        
    // set the PDO error mode to exception met le driver pdo en expection si problème
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
        $stmt = $conn->prepare("DELETE FROM domain_names WHERE id =".$domain_name_id.";");
        
        $stmt->execute(); //execution of query execution de la requête
    
    
        echo "Données supprimées de la base <img width=\"20px\" height=\"20px\"src=\"../media/sucess.png\"> <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../list.php'\">Retour</button>";
    }
    catch(PDOException $e) //Check if errors inside query Si problème dans la requête ou les données saisis
    {
        echo "erreur sql <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../deletedomain.php'\">Retour</button>";
    }
    $conn = null; //close connexion fermeture de la connexion
