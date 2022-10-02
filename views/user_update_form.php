<?php 
include VIEWS_DIR."/header.html";
?>


<form action="/user_update" method="post" >
        <fieldset>
            <legend> Modification information inscription</legend>
            <div>
                <label for="surname">Nom : </label>
                <input type="text" id="surname" name="surname" maxlengh="40" value="<?php  echo($_SESSION["surname"])?>" />
            </div>
            <div>
                <label for="name">Prénom : </label>
                <input type="text" id="name" name="name" maxlengh="40" value="<?php  echo($_SESSION["name"])?>" />
            </div>
        </fieldset>

        <fieldset>
            <legend>Information personnelle</legend>
            <div>
                <label for="dateNaissance">Date de Naissance :</label>
                <input id="date"  type="date" name="date" value="<?php  echo($_SESSION["date"])?>">
            </div>
            <div>
                <label for="gender">Genre : </label>
                <input type="radio" name="gender" id="gender" value="M" <?php if($_SESSION['gender'] == 'M'){ echo 'checked';}?>>
                <label>Homme</label>
                <input type="radio" name="gender" id="gender" value="F" <?php if($_SESSION['gender'] == 'F'){ echo 'checked';}?>>
                <label>Femme</label>
                <input type="radio" name="gender" id="gender" value="NB" <?php if($_SESSION['gender'] == 'NB'){ echo 'checked';}?>>
                <label>Non-binaire</label>
            </div>
            <div>
                <label for="size">Taille(en cm) :</label>
                <input type="number" name= "size" id="size" min="1" max="300" value="<?php  echo($_SESSION["size"])?>">
            </div>
            <div>
                <label for="weight">Poids(en kg) :</label>
                <input type="number" id="weight" name="weight" min="1" max="750" value="<?php  echo($_SESSION["weight"])?>">
            </div>
        </fieldset>
        <fieldset>
            <legend>Modification d'adresse mail et mot de passe</legend>
            <div>
                <label for="mail">Adresse e-mail :</label>
                <input type="email" id="email" name="mail" pattern="[^ @]*@[^ @]*" placeholder="michael@example.com" value="<?php  echo($_SESSION["mail"])?>">
            </div>
            <div>
                <label for="password">Mot de passe (8 caractères dont 1 spécial) :</label>
                <input type="password" id="password" name="password" minlength="8" pattern="(?=.*?[#?!@$%^&*-\]\[])+" value="<?php  echo($_SESSION["password"])?>">
            </div>
        </fieldset>
        <input type="submit" value="Envoyez">
    </form>


        
<?php 
include __ROOT__."/views/footer.html";
?>