<?php
include __ROOT__."/views/header.html";


if ($data[0] != null && $data[1] != null){
    echo "<h1> Bonjour $data[0] $data[1] </h1>";
    echo "<p> Vous êtes connecté </p>";
    echo "<a href='?action=disconnect'>Se déconnecter</a>";
    } else {
        echo "Adresse e-Mail ou mot de passe non reconnu";
        echo "<p> Veuillez réessayer </p>";
        echo "<a href='?action=connect'>Se connecter</a>";
}

include __ROOT__."/views/footer.html";
?>
