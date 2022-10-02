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

echo "<h2> Voici l'activité qui a été ajouté à votre liste </h2>";

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
print_r($data[1]);
echo "<br>";
print_r($data[2]);
echo "<br>";
print_r($data[3]);
echo "<br>";
print_r($data[4]);
echo "<br>";
print_r($data[5]);
echo "<br>";
print_r($data[6]);


include __ROOT__."/views/footer.html";
?>
