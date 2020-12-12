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
    	<h1>Trésorier</h1>
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
        <?php
            if(isset($_POST["submit"]))
            {
            require_once('connect_ligue.php');
            $dbh = doConnect();
            $sql = "SELECT Numtreso FROM tresorier ORDER BY Numtreso DESC LIMIT 1";
            $sth = $dbh -> query($sql);
            $result = $sth -> fetch();
            $numtre = ($result['Numtreso'])+1;

            // $sql = "SELECT Numtreso FROM ligue ORDER BY Numtreso DESC LIMIT 1";
            // $sth = $dbh -> query($sql);
            // $result = $sth -> fetch();
            // $numtre = ($result['Numtreso'])+1;
            // $sql ="INSERT INTO ligue (Numcompte, Intitule, Numtreso, Envoitreso) VALUES ('$numcpt', '$inti', '$numtre', '$envoitre')";
            // echo $sql;
            // $dbh->exec($sql);

            $nomtre=$_POST['nomtreso_saisi'];
            $add = $_POST['adresse_saisi'];
            $cp = $_POST['cp_saisi'];
            $ville = $_POST['ville_saisi'];

            $sql ="INSERT INTO tresorier (Numtreso, Nomtreso, Adresse, CP, Ville) VALUES ('$numtre', '$nomtre', '$add', '$cp', '$ville')";
            $dbh->exec($sql);

            $sql ="SELECT * FROM tresorier";
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            echo '<h3 align="center">Votre demande a été effectuée</h3>';
            echo '<table border="1px;" align="center">';
            echo '<thead>';
                echo '<tr>';
                    echo '<td align="center">Numéro de trésorier</td>';
                    echo '<td align="center">Nom de trésorier</td>';
                    echo '<td align="center">Adresse</td>';
                    echo '<td align="center">Code postale</td>';
                    echo '<td align="center">Ville</td>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td align="center">'.$row['Numtreso'].'</td>';
                echo '<td align="center">'.$row['Nomtreso'].'</td>';
                echo '<td align="center">'.$row['Adresse'].'</td>';
                echo '<td align="center">'.$row['CP'].'</td>';
                echo '<td align="center">'.$row['Ville'].'</td>';  
                echo '</tr>';
            }
            $dbh = NULL;
            echo '</tbody>';    
            echo '</table>';
        }
        ?>
        <p align="center"><a style="color:red;" href="forminsert_tresorier.php">Ajouter un Trésorier</a></p>
    </body>
</html>