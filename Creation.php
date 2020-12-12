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
    	<h1>Accueil</h1>
        <div class="navbar">
            <a href="Accueil.php">Accueil</a>
            <div class="dropdown">
                <button class="dropbtn">Prestation</button>
                <div class="dropdown-content">
                  <a href="prestation.php">Ajouter</a>  
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
        <?php
        require_once('connect_ligue.php');
        $dbh = doConnect();
        ?>
        <form method="post" action="traitementFC.php">
        <fieldset>
            <legend>Entrez la ligue</legend>
                <select name="NomLi" id="NomLi">
                <?php 
                $sql = "SELECT * FROM ligue";
                $sth = $dbh->query($sql);
                while ($donnees=$sth->fetch()) 
                {
                ?>
                    <option value="<?php echo $donnees['Numtreso']; ?>"> <?php echo $donnees['Intitule']; ?></option> 
                <?php  
                }
                ?>  
                </select>
        </fieldset>
        <fieldset>
            <legend>Entrez la date</legend>
            <input type="date" name="dateFC">
        </fieldset>
        <fieldset>
            <legend>Prestation 1</legend>
                <select name="pre1" id="pre1">
                <?php 
                $sql = "SELECT * FROM Prestation";
                $sth = $dbh->query($sql);
                while ($donnees=$sth->fetch()) 
                {
                ?>
                    <option value="<?php echo $donnees['Code']; ?>"> <?php echo $donnees['Libelle']; ?></option> 
                <?php  
                }
                ?>  
                </select>
            <input type="number" name="p1" placeholder="Quantité" step="0.00">
        </fieldset>
        <fieldset>
            <legend>Prestation 2</legend>
            <select name="pre2" id="pre2">
                <?php 
                $sql = "SELECT * FROM Prestation";
                $sth = $dbh->query($sql);
                while ($donnees=$sth->fetch()) 
                {
                ?>
                    <option value="<?php echo $donnees['Code']; ?>"> <?php echo $donnees['Libelle']; ?></option> 
                <?php  
                }
                ?>  
                </select>
                <input type="number" name="p2" placeholder="Quantité" step="0.00">
        </fieldset>
        <fieldset>
            <legend>Prestation 3</legend>
            <select name="pre3" id="pre3">
                <?php 
                $sql = "SELECT * FROM Prestation";
                $sth = $dbh->query($sql);
                while ($donnees=$sth->fetch()) 
                {
                ?>
                    <option value="<?php echo $donnees['Code']; ?>"> <?php echo $donnees['Libelle']; ?></option> 
                <?php  
                }
                ?>  
                </select>
                <input type="number" name="p3" placeholder="Quantité" step="0.00">
        </fieldset>
        <fieldset>
            <legend>Prestation 4</legend>
            <select name="pre4" id="pre4">
                <?php 
                $sql = "SELECT * FROM Prestation";
                $sth = $dbh->query($sql);
                while ($donnees=$sth->fetch()) 
                {
                ?>
                    <option value="<?php echo $donnees['Code']; ?>"> <?php echo $donnees['Libelle']; ?></option> 
                <?php  
                }
                ?>  
                </select>
                <input type="number" name="p4" placeholder="Quantité" step="0.00">
        </fieldset>
        	<input type="submit" name="Valider">
        	<input type="reset" name="Annuler">
        </form>
        <!--<footer class="Bas">
    		<p>
                BTS SIO1<br>
    			Melvin REDUREAU<br>
    			Mai Thi TRAN DIEP<br>
    			Inès MAGANGA<br>
    		</p>
    	</footer>-->
	</body>
</html>