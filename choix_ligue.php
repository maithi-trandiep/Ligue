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
        <br/>
        <?php
            require_once('connect_ligue.php');
            $dbh = doConnect();
            $sql = "SELECT * FROM Ligue";
            $sth = $dbh -> query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table border="1px;" align="center">
            <thead>
                <tr>
                    <th align="center">Numéro de compte</th>
                    <th align="center">Intitulé</th>
                    <th align="center">Numéro de trésorier</th>
                    <th align="center">Envoyer à trésorier</th>
                    <th align="center" style="width:70px;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) {
                echo '<tr>';
                echo '<td align="center">'.$row['Numcompte'].'</td>';
                echo '<td align="center">'.$row['Intitule'].'</td>';
                echo '<td align="center">'.$row['Numtreso'].'</td>';
                echo '<td align="center">'.$row['Envoitreso'].'</td>';
                echo '<td align="center">
                        <a style="color:blue;" href="formmod_ligue.php?numcompte='.$row['Numcompte'].'">Modifier</a> <br/>
                        <a style="color:blue;" href="resultsupp_ligue.php?numcompte='.$row['Numcompte'].'" onclick="return confirm(\'Êtes vous sur de vouloir supprimer ?\');">Supprimer</a>
                        <a href="formmod_ligue.php?numcompte='.$row['Numcompte'].'"><i class="material-icons button edit">edit</i></a>
                        <a href="resultsupp_ligue.php?numcompte='.$row['Numcompte'].'" onclick="return confirm(\'Êtes vous sur de vouloir supprimer ?\');"><i class="material-icons button delete">delete</i></a>
                    </td>';
                echo '</tr>';
            }
            echo'</table>';
            $dbh=NULL;
            ?>
            </tbody>
        </table>
        <p align="center">
			<button onclick="location.href='Accueil.php'">Retourner à l'acceuil</button>
		</p>
    </body>
</html>
