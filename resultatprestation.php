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
        <?php
            $code=$_POST ['Code'];
            $Libelle=$_POST ['Libelle'];
            $PrixU=$_POST ['PrixU'];
            require_once('connect_ligue.php');
            $dbh = doConnect();
            $sql = "INSERT INTO prestation(Code,Libelle,Pu) VALUES('$code','$Libelle','$PrixU')";
            $dbh->exec($sql);
            echo "<h3 align='center'>Votre demande a été effectuée</h3>";
            echo "<table border = 1px align='center'>";
            echo "<thead>";
            echo "<tr>";
                echo "<td>Code de la prestation</td>";
                echo "<td>Nom de la prestation</td>";
                echo "<td>Prix de la prestation</td>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            $sql = "SELECT * FROM prestation where Code = '$code'";
            $sth = $dbh-> query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) 
            {
                echo '<tr>';
                echo '<td align="center">'.$row['Code'].'</td>';
                echo '<td align="center">'.$row['Libelle'].'</td>';
                echo '<td align="center">'.$row['Pu'].'</td>';
                echo '</tr>';
            }
                $dbh = NULL;
            echo "</tbody>";
            echo "</table>";
        ?>
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