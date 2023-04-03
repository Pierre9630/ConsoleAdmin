<?php
include "index.php";
require "controller/searchCust.php"
?>

<html>
    <head>
	<title>Liste des Clients</title>
    </head>
    <body>
    <?php
		//echo "<script>";
			
			echo "<script src=\"js/Search.js\"></script>";
			echo "<script src=\"js/Search.js\"></script>";
		//echo "</script>"
		?>
		<h3>Liste de Clients
		</h3>

		<form method="post">
		<!--<label>Search</label>-->
		<input id="searchtext" type="text" name="search" <!--onkeyup="Search()-->"> 
		<input id ="submitButon" type="submit" class="btn btn-secondary my-2 my-sm-0" name="submit"> 	

		</form>
		<div class="row">
			<div class="col">
				<div style="overflow-x:auto;">
						<table id="table1" class="table">
							<thead>
							<tr class="tableau">
								<th>Code Client</th>
								<th>Entreprise</th>
								<th>Nom Client</th>
								<th>Prenom CLient</th>
								
							</tr>
							</thead>
							<tbody>
							    <?php
								 tableCust(); //appel du controleur
							    ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>