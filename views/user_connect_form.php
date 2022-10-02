<?php include __ROOT__."/views/header.html"; ?>
<?php
if ($_SESSION) {
    echo "<h5>ATTENTION, vous êtes déjà connecté en tant que : " . $_SESSION["surname"] . " " . $_SESSION["name"] . " </h5>";
    echo "<h5>Vous allez être déconnecté si vous vous connectez à un autre compte<h5>";
} else {
  
}
?>
<form action="/connect" method="post">
  <div>
      <label for="mail">Adresse e-mail :</label>
      <input type="email" id="email" name="mail" pattern="[^ @]*@[^ @]*" placeholder="michael@example.com" required>
  </div>
  <div>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" minlength="8" pattern="(?=.*?[#?!@$%^&*-\]\[])+" required>
  </div>

<input type="submit" value="Valider"><br>
</form>
            
<?php include __ROOT__."/views/footer.html"; ?>
