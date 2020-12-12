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
            require_once('connect_ligue.php');
            $dbh = doConnect();
            $code= $_GET['code'];
            $sql = "DELETE FROM prestation WHERE code='$code'";
            try {
                $re = $dbh->exec($sql);
            } catch(PDOException $e) {
                print("Erreur ! $e.\n");
            }
            $dbh->exec($sql);
            $sql ="SELECT * FROM prestation";
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            echo '<h3 align="center">Le code '.$code.' a bien été supprimé !</h3>';
            echo '<table border="1px;" align="center">';
            echo '<thead>';
                echo '<tr>';
                    echo '<td align="center">Code de la prestation</td>';
                    echo '<td align="center">Nom de la prestation</td>';
                    echo '<td align="center">Prix de la prestation</td>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td align="center">'.$row['Code'].'</td>';
                echo '<td align="center">'.$row['Libelle'].'</td>';
                echo '<td align="center">'.$row['Pu'].'</td>';
                echo '</tr>';
            }
            $dbh = NULL;
            echo '</tbody>';    
            echo '</table>';
        ?>
        <p align="center">
			<button onclick="location.href='modprestation.php'">Modifier une Prestation</button>
		</p>
    </body>
</html>