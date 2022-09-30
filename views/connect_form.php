<?php include __ROOT__."/views/header.html"; ?>

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
