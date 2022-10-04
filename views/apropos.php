<?php 
include VIEWS_DIR."/header.html";
?>



<?php
if ($_SESSION) {
    echo "<h2> Bonjour " . $_SESSION["surname"] . " " . $_SESSION["name"] . " </h2>";
} else {
    echo "<h2> Bonjour, vous n'êtes pas identifié </h2>";
}
?>

            
<?php 
include VIEWS_DIR."/footer.html";
?>
