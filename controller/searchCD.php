<?php

function TableDomCust(){
	require "./db/connect.php";
	
	
	

	if(ISSET($_POST['submit']) && !ISSET($_POST['radiocheck']) && !ISSET($_POST['radiocheck2'])){
		//echo "test";
		$keyword = $_POST['search'];
		$sql = "SELECT 
				domain_names.id,
				domain_names.name,
				domain_names.annual_cost,				
				corp_customers.corp_name,
				corp_customers.customer_first_name,
				corp_customers.customer_last_name
				FROM domain_names	
				INNER JOIN corp_customers ON domain_names.domain_name_id = corp_customers.id
				WHERE domain_names.id LIKE '%$keyword%' or domain_names.name LIKE '%$keyword%'
				or corp_customers.corp_name LIKE '%$keyword%' or corp_customers.customer_first_name LIKE '%$keyword%' or corp_customers.customer_last_name LIKE '%$keyword%';";
		//$query->execute();
		foreach ($conn->query($sql) as $row)
		echo "<tr><td>".$row['id']."</td><td>".
		$row['name']."</td><td>".
		$row['annual_cost']."</td><td>".
		$row['corp_name']."</td><td>".
		$row['customer_first_name']."</td><td>".
		$row['customer_last_name']."</td><td>".
		"<form method=\"POST\" action=\".\controller\DeleteChk.php\"> <button id =\"deletebutton\" type=\"submit\" class=\"btn btn-secondary my-2 my-sm-0\" name=\"delete\" type=\"button\"  value=\"".$row['id']."\">Supprimer</button></form></tr>\n";

	}else if(ISSET($_POST['submit']) && $_POST['radiocheck'] == 'annual'){
		$keyword = $_POST['search'];
		$sql = "SELECT 
				domain_names.id,
				domain_names.name,
				domain_names.annual_cost,				
				corp_customers.corp_name,
				corp_customers.customer_first_name,
				corp_customers.customer_last_name
				FROM domain_names	
				INNER JOIN corp_customers ON domain_names.domain_name_id = corp_customers.id
				WHERE domain_names.annual_cost LIKE '%$keyword%';";
		//$query->execute();
		foreach ($conn->query($sql) as $row)
		echo "<tr><td>".$row['id']."</td><td>".
		$row['name']."</td><td>".
		$row['annual_cost']."</td><td>".
		$row['corp_name']."</td><td>".
		$row['customer_first_name']."</td><td>".
		$row['customer_last_name']."</td><td>".
		"<form method=\"POST\" action=\".\controller\DeleteChk.php\"> <button id =\"deletebutton\" type=\"submit\" class=\"btn btn-secondary my-2 my-sm-0\" name=\"delete\" type=\"button\" onclick=\"return  confirm('Vous êtes surs ?')\" value=\"".$row['id']."\">Supprimer</button></form></tr>\n";

	}
	else if(ISSET($_POST['submit']) && $_POST['radiocheck'] == "name"){
		$keyword = $_POST['search'];
		$sql = "SELECT 
				domain_names.id,
				domain_names.name,
				domain_names.annual_cost,				
				corp_customers.corp_name,
				corp_customers.customer_first_name,
				corp_customers.customer_last_name
				FROM domain_names	
				INNER JOIN corp_customers ON domain_names.domain_name_id = corp_customers.id
				WHERE domain_names.name LIKE '%$keyword%';";
		//$query->execute();
		foreach ($conn->query($sql) as $row)
		echo "<tr><td>".$row['id']."</td><td>".
		$row['name']."</td><td>".
		$row['annual_cost']."</td><td>".
		$row['corp_name']."</td><td>".
		$row['customer_first_name']."</td><td>".
		$row['customer_last_name']."</td><td>".
		"<form method=\"POST\" action=\".\controller\DeleteChk.php\"> <button id =\"deletebutton\" type=\"submit\" class=\"btn btn-secondary my-2 my-sm-0\" name=\"delete\" type=\"button\" onclick=\"return  confirm('Vous êtes surs ?')\" value=\"".$row['id']."\">Supprimer</button></form></tr>\n";

	}
	else {
		//echo "test";
		$sql="SELECT 
				domain_names.id,
				domain_names.name,
				domain_names.annual_cost,
				corp_customers.corp_name,
				corp_customers.customer_first_name,
				corp_customers.customer_last_name
				FROM domain_names
				LEFT JOIN corp_customers ON domain_names.domain_name_id = corp_customers.id;";

		foreach ($conn->query($sql) as $row)
		echo "<tr><td>".$row['id']."</td><td>".
		$row['name']."</td><td>".
		$row['annual_cost']."</td><td>".
		$row['corp_name']."</td><td>".
		$row['customer_first_name']."</td><td>".
		$row['customer_last_name']."</td><td>".
		"<form method=\"POST\" action=\".\controller\DeleteChk.php\"> <button id =\"deletebutton\" type=\"submit\" class=\"btn btn-secondary my-2 my-sm-0\" name=\"delete\" type=\"button\" onclick=\"return  confirm('Vous êtes surs ?')\" value=\"".$row['id']."\">Supprimer</button></form></tr>\n";
	}
}
