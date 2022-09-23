<?php include __ROOT__."/views/header.html"; ?>


<form action="/user_add" method="post" >
        <fieldset>
            <legend>Information inscription</legend>
            <div>
                <label for="surname">Nom : </label>
                <input type="text" id="surname" maxlengh="40" required/>
            </div>
            <div>
                <label for="name">Prénom : </label>
                <input type="text" id="name" maxlengh="40" required/>
            </div>
        </fieldset>

        <fieldset>
            <legend>Information personnelle</legend>
            <div>
                <label for="dateNaissance">Date de Naissance : </label>
                <input id="date" name="DAN" type="date" min="1900-01-01" max="2022-12-31" required>
            </div>
            <div>
                <label for="gender">Genre : </label>
                <input type="radio" name="gender" id="gender" value="Homme" checked>
                <label>Homme</label>
                <input type="radio" name="gender" id="gender" value="Femme">
                <label>Femme</label>
                <input type="radio" name="gender" id="gender" value="Non-binaire">
                <label>Non-binaire</label>
            </div>
            <div>
                <label for="size">Taille(en cm) :</label>
                <input type="number" id="size" min="1" max="300" required>
            </div>
            <div>
                <label for="weight">Poids(en kg) :</label>
                <input type="number" id="weight" min="1" max="750" required>
            </div>
        </fieldset>
        <fieldset>
            <legend>Création de compte</legend>
            <div>
                <label for="mail">Adresse e-mail :</label>
                <input type="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="michael@example.com" required>
            </div>
            <div>
                <label for="password">Mot de passe (8 caractères dont 1 spécial) :</label>
                <input type="password" id="password" minlength="8" pattern="(?=.*?[#?!@$%^&*-\]\[])+" required>
            </div>
        </fieldset>
        <input type="submit" value="Envoyez">
    </form>
            
<?php include __ROOT__."/views/footer.html"; ?>