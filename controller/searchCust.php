<?php

function TableCust(){
	//require("../db/connect.php");
	$dsn="mysql:dbname=seeweb".";host="."192.168.1.42";
	//$servername = "localhost";
	//$dbname = "seeweb";
	$username = "root";
	$password = "test44";
	try {
		$conn = new PDO($dsn,$username,$password);
		}
	catch(PDOException $e)
		{
			echo "Échec de la connexion : %s\n" . $e->getMessage();
		}

	if(ISSET($_POST['submit'])){
		//echo "test";
		$keyword = $_POST['search'];
		$sql = "SELECT 
        corp_customers.id, corp_customers.corp_name, corp_customers.customer_first_name, corp_customers.customer_last_name
            FROM corp_customers	
				WHERE corp_customers.id LIKE '%$keyword%' or corp_customers.corp_name LIKE '%$keyword%' or corp_customers.customer_first_name LIKE '%$keyword%' or corp_customers.customer_last_name LIKE '%$keyword%';";
		//$query->execute();
		foreach ($conn->query($sql) as $row)
        echo "<tr><td>".$row['id']."</td><td>".
        $row['corp_name']."</td><td>".
        $row['customer_first_name']."</td><td>".
        $row['customer_last_name']."</td><td>"
        ."</tr>\n";

	}
	else {
		//echo "test";
		$sql="SELECT 
        id,corp_name,customer_first_name,customer_last_name
            FROM corp_customers";

        foreach ($conn->query($sql) as $row)
        echo "<tr><td>".$row['id']."</td><td>".
        $row['corp_name']."</td><td>".
        $row['customer_first_name']."</td><td>".
        $row['customer_last_name']."</td><td>"
        ."</tr>\n";
	}
}