<?php include __ROOT__."/views/header.html"; ?>


<form action="/upload" method="post" >
    <head>
        <title>Upload a json file</title>
    </head>

    <body>
        <h1>Uplodez votre fichier json</h1>
        <form action="/action_page.php" enctype="multipart/form-data">

            <label for="myfile">Selectionner un fichier .JSON :</label>
            <input type="file" id="myfile" name="myfile" accept="application/JSON" />
            <br /><br />
            <input type="submit" />
        </form>
        <button name="button" onclick="location.href='/'">Retour</button>
    </body>     
<?php include __ROOT__."/views/footer.html"; ?>