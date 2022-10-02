<?php
include __ROOT__."/views/header.html";

$activitiesBlock = false;
$DataBlock = false;

foreach ($data[0] as $value) {
    if (!$activitiesBlock) {
        if ($value == null) {
            echo "Aucune activité n'a été trouvée";
            $activitiesBlock = true;
        }
    }
}

foreach($data[1] as $value){
    foreach($value as $value2) {
        if (!$DataBlock) {
            if ($value2 == null) {
                echo "Aucune donnée n'a été trouvée";
                $DataBlock = true;
            }
        }
    }
}

echo "<h2> Voici l'activité avec les données qui ont été ajouté à votre liste </h2>";

$i = 0;
foreach ($data[0] as $value) {
    if ($value != null) {
        if ($i == 0) {
            echo "<h3> Activité : $value </h3>";  
        } else {
            echo "<h3> Date : $value </h3>";
        }
        $i++;
    }
}



include __ROOT__."/views/footer.html";
?>
