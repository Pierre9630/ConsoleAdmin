<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domain_name = $_POST["name"];
    $domain_name_id = $_POST['domain_name_id'];
    //preg_replace('/^[^,]*,\s*/', '', $input);
    // echo preg_replace('/^[^.]*.\s*/', '', $domain_name);
    // echo !substr(strpos($domain_name,"."),3);
    if(!strpos($domain_name,".")){
    
        die("Pas de point dans le nom de domaine. <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../deletedomain.php'\">Retour</button>"); 
        
    }else{
        $domain_name_top = preg_replace('/^[^.]*.\s*/', '', $domain_name);
        if (strlen($domain_name_top) > 5){
            die("Nom de domaine haut trop long <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../deletedomain.php'\">Retour</button>");
        }else{
            if (!isset($domain_name) || !filter_var($domain_name, FILTER_VALIDATE_DOMAIN,FILTER_FLAG_HOSTNAME) ){
                die("Nom du domaine non valide ! <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../deletedomain.php'\">Retour</button>");
            }
            if (!isset($domain_name_id) || !filter_var($domain_name_id, FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^\d+$/")))){
                die("Entrez un nombre corresponant à votre code client <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../deletedomain.php'\">Retour</button>");
            }
        }
        
    }
          
}    
  
    
//     }
    
    require_once ("../db/connect.php"); //add pdo driver active connection rajoute la connexion active de connect.php
    require_once("MessagePages.php");
    // echo $domain_name;
    // echo $domain_name_id;

    try {
        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
        //     $password);
    // set the PDO error mode to exception met le driver pdo en expection si problème
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // prepare sql and bind parameters
        $stmt = $conn->prepare("DELETE FROM domain_names WHERE domain_name_id =".$domain_name_id." && name = :domain_name ;");
        $stmt->bindParam(':domain_name', $domain_name);
        //$stmt->bindParam(':domain_name_id', $domain_name_id);
    
    // insert a row insertion des champs
        
        $domain_name_id = $_POST["domain_name_id"];
        $domain_name = $_POST["name"];
        $stmt->execute(); //execution of query execution de la requête
    
        Sucess("Données supprimées de la base","../list.php");
        //echo "Données supprimées de la base <img width=\"20px\" height=\"20px\"src=\"../media/sucess.png\"> <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../list.php'\">Retour</button>";
    }
    catch(PDOException $e) //Check if errors inside query Si problème dans la requête ou les données saisis
    {
        Error("erreur sql","../deletedomain.php");
        //echo "<br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../deletedomain.php'\">Retour</button>";
    }
    $conn = null; //close connexion fermeture de la connexion
