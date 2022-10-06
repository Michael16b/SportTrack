<?php 
include VIEWS_DIR."/header.html";
?>



    <head>
        <title>Upload a json file</title>
    </head>

    <body>
        <h1>Uploadez votre fichier json</h1>
        <form action="/upload" method="post" enctype="multipart/form-data">
            <label for="myfile">Selectionner un fichier .JSON :</label>
            <input type="file" id="myfile" name="myfile" accept=".json" />
            <br /><br />
            <input type="submit" />
        </form>
        <button name="button" onclick="location.href='/'">Retour</button>
    </body>

<?php 
include VIEWS_DIR."/footer.html";
?>