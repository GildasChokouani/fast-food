<?php
require 'database.php';

$db = database::connect();
$requete = "SELECT * FROM categories ORDER BY id.categories ASC";
$result = $db->query($requete);

if (!$result){
    echo'';
}
else{
    $good = $result->rowCount();
}

?>
 <table>
    <tr>
    <th>id</th>
    <th>nom</th>
</tr>


<?php
while ($ligne = $result->fetch(PDO::FECTCH_NUM)){
    echo "<tr>";
    foreach($ligne AS $valeur){
        echo "<td>$valeur</td>";

    }
    echo "</tr>";

}
?>
</table>

<?php
$result->closeCursor();
?>