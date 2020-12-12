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
                  <a href="modprestation.php">Modifier</a>
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
        <h3 align="center">Formulaire nouvelle prestation</h3>
        <form align="left" method="post" action="resultatprestation.php">
            <label for="Libelle">Nom prestation (15 caractères max):</label> <input type="text" name="Libelle" id="Libelle" maxlength="50" size="50" placeholder="Ex:Affranchissement" required autofocus /><br>
            <label for="Code">Code prestation (10 caractères max):</label> <input type="text" name="Code" id="Code" maxlength="20" size="20" placeholder="Ex:AFFRAN" required><br>
            <label for="PrixU">Prix de la prestation (max xxx.xx):</label> <input type="number" name="PrixU" id="PrixU" maxlength="7" size="7" step="0.01" placeholder="Ex:3.330" required><br>  
        <input type=submit value="Valider"/>
        <input type=reset value="Réinitialiser"/>
        </form>
    	<footer class="Bas">
    		<p>
                BTS SIO1<br>
    			Melvin REDUREAU<br>
    			Mai Thi TRAN DIEP<br>
    			Inès MAGANGA<br>
    		</p>
    	</footer>
    </body>
</html>