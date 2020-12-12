<?php
require_once('ConnectFC.php');
function NomLig($numT) {
    $dbh = doConnect();
    $sql = "SELECT Intitule FROM ligue WHERE Numtreso=$numT";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
        echo $row['Intitule'];
    }
    $dbh = NULL;

}
function NomTre($numT) {
    $dbh = doConnect();
    $sql = "SELECT Nomtreso FROM tresorier WHERE Numtreso=$numT";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
        echo $row['Nomtreso'];
    }
    $dbh = NULL;
}
function DNCE($d,$numT){
	$dbh = doConnect();
	$sql = "SELECT Numfacture FROM facture ORDER BY Numfacture DESC LIMIT 1";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $numF = ($result['Numfacture'])+1;
    $sql = "SELECT Numcompte FROM ligue WHERE Numtreso=$numT";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $numC = ($result['Numcompte']);
    $sql = "INSERT INTO facture (Numfacture,Datefact,Echeance,Compte_ligue) VALUES ($numF,'$d',NULL,$numC)";
    $dbh->exec($sql);
    $sql = "SELECT LAST_DAY ('$d') AS Echeance FROM facture WHERE Numfacture = $numF";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $eche= ($result['Echeance']);
    $sql = "UPDATE facture  SET Echeance = '$eche' WHERE Numfacture = $numF";
    $dbh->exec($sql);
    echo "<table>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>Numéro de facture</td>";
                echo "<td>Date</td>";
                echo "<td>Echeance</td>";
                echo "<td>Code Client</td>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    $sql = "SELECT * FROM facture WHERE  Numfacture = $numF";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
    	echo '<tr>';
        echo '<td>'.$row['Numfacture'].'</td>';
        echo '<td>'.$row['Datefact'].'</td>';
        echo '<td>'.$row['Echeance'].'</td>';
        echo '<td>'.$row['Compte_ligue'].'</td>';
        echo '</tr>';
    }
    $dbh = NULL;
    echo "</tbody>";
    echo "</table>";
}
function pres1 ($pre1,$p1){
    $dbh = doConnect();
    $sql = "SELECT Numfacture FROM facture ORDER BY Numfacture DESC LIMIT 1";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $numF = ($result['Numfacture']);
    $sql = "INSERT INTO ligue_facture(Numfacture,Code_pres,Quantite) VALUES ($numF,'$pre1',$p1)";
    $dbh->exec($sql);
}
function pres2 ($pre2,$p2){
    $dbh = doConnect();
    $sql = "SELECT Numfacture FROM facture ORDER BY Numfacture DESC LIMIT 1";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $numF = ($result['Numfacture']);
    $sql = "INSERT INTO ligue_facture(Numfacture,Code_pres,Quantite) VALUES ($numF,'$pre2',$p2)";
    $dbh->exec($sql);
}
function pres3 ($pre3,$p3){
    $dbh = doConnect();
    $sql = "SELECT Numfacture FROM facture ORDER BY Numfacture DESC LIMIT 1";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $numF = ($result['Numfacture']);
    $sql = "INSERT INTO ligue_facture(Numfacture,Code_pres,Quantite) VALUES ($numF,'$pre3',$p3)";
    $dbh->exec($sql);
}
function pres(){
	$dbh = doConnect();
	$sql = "SELECT Numfacture FROM facture ORDER BY Numfacture DESC LIMIT 1";
    $sth = $dbh -> query($sql);
    $result = $sth->fetch();
    $numF = ($result['Numfacture']);
     echo "<table>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>Numéro de facture</td>";
                echo "<td>Code Prestation</td>";
                echo "<td>Nom Prestation</td>";
                echo "<td>Quantité</td>";
                echo "<td>Prix Unitaire</td>";
                echo "<td>Montant</td>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    $sql = "SELECT Numfacture, Code_pres, Quantite, sum(Quantite*Pu) AS MontantTotal FROM ligue_facture L, prestation p WHERE numfacture = $numF AND L.Code_pres=P.Code";
    $sth = $dbh-> query($sql);
    $result = $sth->fetch();
    $to = $result['MontantTotal'];
    $sql = "SELECT Numfacture, Code_pres,Quantite,Pu,Libelle,sum(Quantite*Pu) AS MontantPu FROM ligue_facture L,Prestation P WHERE  Numfacture = $numF AND L.Code_pres=P.Code GROUP BY Code_pres";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
    	echo '<tr>';
        echo '<td>'.$row['Numfacture'].'</td>';
        echo '<td>'.$row['Code_pres'].'</td>';
        echo '<td>'.$row['Libelle'].'</td>';
        echo '<td>'.$row['Quantite'].'</td>';
        echo '<td>'.$row['Pu'].'</td>';
        echo '<td>'.$row['MontantPu'].'</td>';  
        echo '</tr>';
    }
    $dbh = NULL;
    echo "</tbody>";
    echo "</table>";
    echo "<br>";
    echo "Total: $to";
    echo "<br>";
    echo "Montant à payer: <strong>$to</strong>";
}
function NomLig2($numfac) {
    $dbh = doConnect();
    $sql = "SELECT * FROM facture WHERE Numfacture=$numfac";
    $sth = $dbh-> query($sql);
    $result = $sth->fetch();
    $cl = $result['Compte_ligue'];
   	$sql = "SELECT * FROM ligue WHERE  Numcompte = $cl";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
        echo '<td>'.$row['Intitule'].'</td>';
    }
    $dbh = NULL; 
}
function NomTre2($numfac) {
    $dbh = doConnect();
    $sql = "SELECT * FROM facture WHERE Numfacture=$numfac";
    $sth = $dbh-> query($sql);
    $result = $sth->fetch();
    $cl = $result['Compte_ligue'];
   	$sql = "SELECT * FROM ligue WHERE  Numcompte = $cl";
    $sth = $dbh-> query($sql);
    $result = $sth->fetch();
    $clo = $result['Numtreso'];
   	$sql = "SELECT * FROM tresorier WHERE Numtreso = $clo";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
        echo '<td>'.$row['Nomtreso'].'</td>';
    }
    $dbh = NULL; 
}
function DNCE2($numfac){
	$dbh = doConnect();
    echo "<table>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>Numéro de facture</td>";
                echo "<td>Date</td>";
                echo "<td>Echeance</td>";
                echo "<td>Code Client</td>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    $sql = "SELECT * FROM facture WHERE  Numfacture = $numfac";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
    	echo '<tr>';
        echo '<td>'.$row['Numfacture'].'</td>';
        echo '<td>'.$row['Datefact'].'</td>';
        echo '<td>'.$row['Echeance'].'</td>';
        echo '<td>'.$row['Compte_ligue'].'</td>';
        echo '</tr>';
    }
    $dbh = NULL;
    echo "</tbody>";
    echo "</table>";
}
function pres21($numfac){
	$dbh = doConnect();
    echo "<table>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>Code Prestation</td>";
                echo "<td>Nom Prestation</td>";
                echo "<td>Quantité</td>";
                echo "<td>Prix Unitaire</td>";
                echo "<td>Montant</td>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    $sql = "SELECT Numfacture, Code_pres, Quantite, sum(Quantite*Pu) AS MontantTotal FROM ligue_facture L, prestation p WHERE numfacture = $numfac AND L.Code_pres=P.Code";
    $sth = $dbh-> query($sql);
    $result = $sth->fetch();
    $to = $result['MontantTotal'];
    $sql = "SELECT Numfacture, Code_pres,Quantite,Pu,Libelle,sum(Quantite*Pu) AS MontantPu FROM ligue_facture L,Prestation P WHERE  Numfacture = $numfac AND L.Code_pres=P.Code GROUP BY Code_pres";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
    	echo '<tr>';
        echo '<td>'.$row['Code_pres'].'</td>';
        echo '<td>'.$row['Libelle'].'</td>';
        echo '<td>'.$row['Quantite'].'</td>';
        echo '<td>'.$row['Pu'].'</td>';
        echo '<td>'.$row['MontantPu'].'</td>';  
        echo '</tr>';
    }
    $dbh = NULL;
    echo "</tbody>";
    echo "</table>";
    echo "<br>";
    echo "Total: $to";
    echo "<br>";
    echo "Montant à payer: <strong>$to</strong>";
}
function AfficheLigue($res)
{
    $dbh = doConnect();
    echo "<table border='1px' align='center'>";
        echo "<thead>";        
            echo "<tr>";            
                echo "<td align='center'>Numéro de compte</td>";                
                echo "<td align='center'>Intitulé</td>";                
                echo "<td align='center'>Numéro de trésorier</td>";                
                echo "<td align='center'>Envoyer à trésorier</td>";                
            echo "</tr>";            
        echo "</thead>";        
    echo "<tbody>";
    $sql = "SELECT * FROM Ligue WHERE Numcompte = $res";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
        echo '<tr>';
        echo '<td>'.$row['Numcompte'].'</td>';
        echo '<td>'.$row['Intitule'].'</td>';
        echo '<td>'.$row['Numtreso'].'</td>';
        echo '<td>'.$row['Envoitreso'].'</td>'; 
        echo '</tr>';
    }
    $dbh = NULL;
    echo "</tbody>";
    echo "</table>";        
}
function AffichePrestation($res)
{
    $dbh = doConnect();
    echo "<table border='1px' align='center'>";
        echo "<thead>";        
            echo "<tr>";            
                echo "<td align='center'>Code</td>";                
                echo "<td align='center'>Libellé</td>";                
                echo "<td align='center'>Prix Unitaire</td>";                                
            echo "</tr>";            
        echo "</thead>";        
    echo "<tbody>";
    $sql = "SELECT * FROM Prestation WHERE Code = '$res'";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
        echo '<tr>';
        echo '<td>'.$row['Code'].'</td>';
        echo '<td>'.$row['Libelle'].'</td>';
        echo '<td>'.$row['Pu'].'</td>'; 
        echo '</tr>';
    }
    $dbh = NULL;
    echo "</tbody>";
    echo "</table>";        
}
function AfficheFacture($res)
{
    $dbh = doConnect();
    echo "<table border='1px' align='center'>";
        echo "<thead>";        
            echo "<tr>";            
                echo "<td align='center'>Numéro de facture</td>";                
                echo "<td align='center'>Code de la prestation</td>";                
                echo "<td align='center'>Quantité</td>";                                
            echo "</tr>";            
        echo "</thead>";        
    echo "<tbody>";
    $sql = "SELECT * FROM ligue_facture WHERE Numfacture = $res";
    $sth = $dbh-> query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) 
    {
        echo '<tr>';
        echo '<td>'.$row['Numfacture'].'</td>';
        echo '<td>'.$row['Code_pres'].'</td>';
        echo '<td>'.$row['Quantite'].'</td>'; 
        echo '</tr>';
    }
    $dbh = NULL;
    echo "</tbody>";
    echo "</table>";        
}
?>