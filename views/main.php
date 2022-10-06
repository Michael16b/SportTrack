<?php 
include VIEWS_DIR."/header.html";
?>


<?php

if ($_SESSION) {
    echo "<h2> Bonjour " . $_SESSION["surname"] . " " . $_SESSION["name"] . " </h2>";
}
?>
<h1> Main page</h1>
<?php if($_SESSION){ echo '<a href="/user_update">Click here to update your personnal information</a> <br></br>' ;}?>


<?php if($_SESSION){ echo '<a href="/disconnect">Login out.</a> <br></br>';}?>

<?php if($_SESSION){ echo '<a href="/apropos">Click here to display the name.</a> <br></br>';}?>

<?php if($_SESSION){ echo '<a href="/upload">Upload activity and data</a> <br></br>';}?>

<?php if($_SESSION){ echo '<a href="/activities">List of activities</a> <br></br>';}?>

<?php if($_SESSION){ echo '<a href="/user_delete">Delete my account</a> <br></br>';}?>



<?php if (!$_SESSION) { echo '<a href="/connect">Click here to display the connection form.</a>';}
?>
<br></br>
<?php if (!$_SESSION) { echo '<a href="/user_add">Add user</a>'; }?>



            
<?php 
include VIEWS_DIR."/footer.html";
?>
