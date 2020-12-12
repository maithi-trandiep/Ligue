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
    	<h1>Ligue</h1>
        <div class="navbar">
            <a href="Accueil.php">Accueil</a>
            <div class="dropdown">
                <button class="dropbtn">Prestation</button>
                <div class="dropdown-content">
                  <a href="prestation.html">Ajouter</a>  
                  <a href="ModifPrestation.php">Modifier</a>
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
                  <a href="choix_ligue.php">Modifier</a>
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
		<h3 align="center">Entrer pour modifier une Ligue</h3>
		<form align="center" method="post" action="resultmod_ligue.php">
            <p>
				Numéro de compte:
				<br/>
				<?php
					$nbCompte = $_GET['numcompte'];
					echo '<input required type="text" name="numcompte" id="numcompte" value="'.$nbCompte.'" required readonly />';
				?>
			</p>
			<p>
				Intitulé:
				<br/>
				<input type="text" name="intitule_modifie" id="intitule_modifie" required />
			</p>
			<p>
				Numéro de trésorier:
				<br/>
				<input type="text" name="numtreso_modifie" id="numtreso_modifie" required />
			</p>
			<p>
				<label for="envoitreso_choix">Envoyer à trésorier ?</label>
				<select id="envoitreso_choix" name="envoitreso_choix">
				<option value="oui">Oui</option>
				<option value="non">Non</option>
				</select>
			</p>
			<input type="submit" value="Valider"/>
			<input type="reset" value="Réinitialiser"/>
		</form>
	</body>
</html>