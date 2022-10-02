<?php include __ROOT__."/views/header.html"; ?>
<table>

<caption>Vos activités</caption>

<tr> <th>Description</th> <th>Date</th> </tr>

<?php
foreach ($data as $activity) {
    ?>
    
    <tr> <td><?php echo($activity[0]) ?></td> <td><?php echo($activity[1]) ?></td>
    
    <?php
}?>

</table>

<?php include __ROOT__."/views/footer.html"; ?>