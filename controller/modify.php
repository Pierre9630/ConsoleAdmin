<?php

//Annual_Cost randomize Randomisation de la valeur coûts annuels
function getrd_flt_value($first_no = 0,$last_no = 1,$mul = 1000000)
{
	if ($first_no > $last_no) return false;
	return mt_rand($first_no * $mul,$last_no * $mul)/$mul;
}

$annual_cost = getrd_flt_value(10000,1000000); //Function Fonction de rand

//echo $annual_cost;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domain_name = $_POST["name"];
    $newdomain_name = $_POST['newname'];
    $domain_name_id = $_POST['domain_name_id'];
    //preg_replace('/^[^,]*,\s*/', '', $input);
    // echo preg_replace('/^[^.]*.\s*/', '', $domain_name);
    // echo !substr(strpos($domain_name,"."),3);

    //Filtrage de la conformité de la saisie avec les regex verification de la longeur du nom de domaine et domaine haut(.com,.org.fr etc...) pour 5 caractères maximum et 63 pour le nom secondaire Filter for a valid entries informations
    //check if longer does not exceed 5 characters for top domain names and down 63 characters(63-5,63-4,63,3...).
    if(!strpos($newdomain_name,".")){
        die("Pas de point dans le nouveau nom de domaine. <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../modifyform.php'\">Retour</button>"); 
    }else{
    
        if(!strpos($domain_name,".")){ 
    
            die("Pas de point dans le nom de domaine. <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../modifyform.php'\">Retour</button>"); 
        
        }else{
            $domain_name_top = preg_replace('/^[^.]*.\s*/', '', $domain_name);
            $newdomain_name_top = preg_replace('/^[^.]*.\s*/', '', $newdomain_name);
            if (strlen($domain_name_top) > 5 && strlen($newdomain_name_top) > 5){
                die("Nom de domaine haut trop long <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../modifyform.php'\">Retour</button>");
            }else{
                if (!isset($domain_name) && !isset($newdomain_name) || !filter_var($domain_name, FILTER_VALIDATE_DOMAIN,FILTER_FLAG_HOSTNAME) && !filter_var($newdomain_name, FILTER_VALIDATE_DOMAIN,FILTER_FLAG_HOSTNAME) ){
                    die("Nom du domaine non valide ! <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../modifyform.php'\">Retour</button>");
                }
                if (!isset($newdomain_name) || !filter_var($newdomain_name, FILTER_VALIDATE_DOMAIN,FILTER_FLAG_HOSTNAME) ){
                    die("Nom du Nouveau domaine non valide ! <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../modifyform.php'\">Retour</button>");
                }
                if (!isset($domain_name_id) || !filter_var($domain_name_id, FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^\d+$/")))){
                    die("Entrez un nombre corresponant à votre code client <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../modifyform.php'\">Retour</button>");
                }
            }
        
        }
    }

   
    
}
    
    require ("../db/connect.php"); //add pdo driver active connection rajoute la connexion active de connect.php
    // echo $domain_name;
    // echo $domain_name_id;

    try {
        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
        //     $password);
    // set the PDO error mode to exception met le driver pdo en expection si erreur
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$domain_name_id = (int) $domain_name_id;
    // prepare sql and bind parameters
        $stmt = $conn->prepare("UPDATE domain_names SET name ='".$newdomain_name."' WHERE domain_name_id = ".$domain_name_id." && name = :domain_name ;");
        $stmt->bindParam(':domain_name', $domain_name);
        //$stmt->bindParam(':domain_name_id', $domain_name_id);
    
    // insert a row Insertion dans les champs
        $domain_name = $_POST["name"];
        $domain_name_id = $_POST["domain_name_id"];
        $stmt->execute();
    
    
        echo "Données envoyées vers la base <img width=\"20px\" height=\"20px\"src=\"../media/sucess.png\"> <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../list.php'\">Retour</button>";
    }
    catch(PDOException $e) //If query return a error si problème dans la requête
    {
        echo "Entrée dupliquée ou erreur sql <br> <button class=\"btn btn-secondary my-2 my-sm-0\" onclick=\"location.href='../modifyform.php'\">Retour</button>";
    }
    $conn = null; //Close Connexion Fermeture de la connexion