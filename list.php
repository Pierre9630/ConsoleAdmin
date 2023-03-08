<?php
include "index.php";
//include "controller/deletecontroller.php";
//require "/controller/searchCustomerDomain.php";
require "controller/searchCD.php"
?>

<html>
    <head>
		<title> Liste des Clients avec Domaines</title>
    </head>
    <body>
    <?php
		//echo "<script>";
			
			echo "<script src=\"js/Search.js\"></script>";
			echo "<script src=\"js/Search.js\"></script>";
		//echo "</script>"
		?>
		<h3> Liste de Domaines avec leurs clients associées			
		</h3>
		

		<form method="post">
		<!--<label>Search</label>-->
		<input id="searchtext" type="text" name="search" <!--onkeyup="Search()-->"> 
		<input id ="submitButon" type="submit" class="btn btn-secondary my-2 my-sm-0" name="submit">
		<input id="radioAnnualCost" type="radio" name="radiocheck" value="annual">
		<label> Rechercher par coût annuel ?</label>
		<input id="radioAnnualCost2" type="radio" name="radiocheck" value="name">
		<label>Rechercher par nom de domaine ?</label><br>		
		<?php if(!empty($_POST['search'])){ echo "Recherche de '". $_POST['search'] ."'";}?>
		<!--<button id ="deletebutton" type="submit" class="btn btn-secondary my-2 my-sm-0" name="delete" action="controller/DeleteChk.php">Supprimer</button>-->

		</form>
		<div class="row">
			<div class="col">
				<div style="overflow-x:auto;">
						<table id="table1" class="table">
							<thead>
								<tr class="tableau">
									<th>Code Domaine</th>
									<th>Nom Domaine</th>
									<th>Cout Annuel</th>
									<th>Entreprise</th>
									<th>Nom Responsable</th>
									<th>Prénom Responsable</th>
									<th>Supprimer ?</th>
								</tr>
							</thead>
							<tbody>
								<?php
									TableDomCust(); //appel du controleur
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>