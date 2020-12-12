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
        <br/>
        <?php
            $numcpt= $_POST['numcompte'];
            $inti = $_POST['intitule_modifie'];
            $numtre = $_POST['numtreso_modifie'];
            $envoitre = $_POST['envoitreso_choix'];
            require_once('connect_ligue.php');
            $dbh = doConnect();
            $sql ="UPDATE ligue SET intitule='$inti',numtreso=$numtre,envoitreso='$envoitre' WHERE numcompte=$numcpt";

            try {
                $re = $dbh->exec($sql);
            } catch(PDOException $e) {
                print("Erreur $e.\n");
            }
            $sql ="SELECT * FROM ligue";
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            echo '<h3 align="center">Le compte '.$numcpt.' a bien été modifié !</h3>';
            echo '<table border="1px;" align="center">';
            echo '<thead>';
                echo '<tr>';
                    echo '<td align="center">Numéro de compte</td>';
                    echo '<td align="center">Intitulé</td>';
                    echo '<td align="center">Numéro de trésorier</td>';
                    echo '<td align="center">Envoyer trésorier</td>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td align="center">'.$row['Numcompte'].'</td>';
                echo '<td align="center">'.$row['Intitule'].'</td>';
                echo '<td align="center">'.$row['Numtreso'].'</td>';
                echo '<td align="center">'.$row['Envoitreso'].'</td>';  
                echo '</tr>';
            }
            $dbh = NULL;
            echo '</tbody>';    
            echo '</table>';       
        ?>
        <p align="center">
			<button onclick="location.href='choix_ligue.php'">Consulter la Ligue</button>
		</p>
    </body>
</html>