<?php 
include VIEWS_DIR."/header.html";
?>
<?php
if ($data != []) {
    ?>
<table>

<caption>Vos activités</caption>

<tr align="center"> 
    <th>| Description |</th> <th>| Date |</th> <th>| Durée |</th> <th>| Heure de début |</th> <th>| Distance |</th> <th>| Fréquence Cardiaque Minimum |</th> 
    <th>| Fréquence Cardiaque Moyenne |</th> <th>| Fréquence Cardiaque Maximum |</th>
</tr>


<?php
    foreach ($data as $activity) {
        ?>
        <tr align="center"> 
            
            <td><?php echo($activity[0]) ?></td>
            <td><?php echo($activity[1]) ?></td>
            <td><?php echo($activity[2]) ?></td>
            <td><?php echo($activity[3]) ?></td>
            <td><?php echo($activity[4]) ?></td>
            <td><?php echo($activity[5]) ?></td>
            <td><?php echo($activity[6]) ?></td>
            <td><?php echo($activity[7]) ?></td>
            
        </tr>
        
        <?php
        }
} else {
    echo "Vous n'avez pas encore d'activité qui ont été ajouté";
}
?>

</table>

<?php 
include VIEWS_DIR."/footer.html";
?>
