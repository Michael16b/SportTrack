<?php include __ROOT__."/views/header.html"; ?>

<?php

if ($_SESSION) {
    echo "<h2> Bonjour " . $_SESSION["surname"] . " " . $_SESSION["name"] . " </h2>";
}
?>
<h1> Main page</h1>
<a href="/connect">Click here to display the connection form.</a>
<br></br>
<a href="/user_add">Add user</a>
<br></br>
<?php if($_SESSION){ echo '<a href="/user_update">Click here to update your personnal information</a>';}?>
<br></br>

<?php if($_SESSION){ echo '<a href="/disconnect">Login out.</a>';}?>
<br></br>
<?php if($_SESSION){ echo '<a href="/apropos">Click here to display the name.</a>';}?>
<br></br>
<?php if($_SESSION){ echo '<a href="/upload">Processes the file uploaded by the user and inserts the data contained in it into the database</a>';}?>
<br></br>
<?php if($_SESSION){ echo '<a href="/activities">List of activities</a>';}?>

            
<?php include __ROOT__."/views/footer.html"; ?>
