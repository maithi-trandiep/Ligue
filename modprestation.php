<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <title>CROSL</title>
    </head>
    <body>
    	<header class="Haut">
    		<img src="img/Maison_des_Ligues.png" alt="Logo du site" id="Logo" height="150" width="200"/>
    	</header>
    	<h1>Prestation</h1>
        <div class="navbar">
            <a href="Accueil.php">Accueil</a>
            <div class="dropdown">
                <button class="dropbtn">Prestation</button>
                <div class="dropdown-content">
                  <a href="formprestation.php">Ajouter</a>  
                  <a href="choix_prestation.php">Modifier/Supprimer</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Tresorier</button>
                <div class="dropdown-content">
                  <a href="forminsert_tresorier.php">Ajouter</a>  
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Ligue</button>
                <div class="dropdown-content">
                  <a href="forminsert_ligue.php">Ajouter</a>  
                  <a href="choix_ligue.php">Modifier/Supprimer</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Facture</button>
                <div class="dropdown-content">
                  <a href="Creation.php">Création</a>  
                  <a href="Archive.php">Archives</a>
                </div>
            </div>
        </div>
        <body>
		<h3 align="center">Entrer pour modifier une Prestation</h3>
		<form align="center" method="post" action="resultmodprestation.php">
            <p>
				Code prestation:
				<br/>
				<?php
					$code = $_GET['code'];
					echo '<input required type="text" name="code" id="code" value="'.$code.'" required readonly />';
				?>
			</p>
			<p>
				Nom prestation:
				<br/>
				<input type="text" name="libelle_modifie" id="libelle_modifie" required />
			</p>
			<p>
				Prix de la prestation:
				<br/>
				<input type="number" name="pu_modifie" id="pu_modifie" maxlength="7" size="7" step="0.01" required />
			</p>
			<input type=submit value="Valider"/>
			<input type=reset value="Réinitialiser"/>
		</form>
	</body>
</html>