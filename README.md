
# Présentation du site web : SportTrack

## 1. Fonctionnalités de l’application

### **PARTIE 1 : HTML**


### 1.1. Gestion des comptes utilisateurs
L’application devra permettre de créer, de modifier et de supprimer un compte utilisateur. Lors de la création de leur compte, les utilisateurs devront renseigner les informations suivantes:

- nom,
- prénom,
- date de naissance,
- sexe,
- taille,
- poids,
- adresse électronique,
- mot de passe.
- Les utilisateurs seront identifiés par leur adresse électronique. 

L’application devra donc garantir que deux comptes ne peuvent pas être créés avec la même adresse électronique. Toutes les informations devront pouvoir être modifiées.



### **PARTIE 2 : mySQL**

### 1.2 Connexion des utilisateurs

Pour accéder à leurs données d’activité sportive et gérer ces données, les utilisateurs devront pouvoir se connecter à l’application en utilisant leur adresse électronique et leur mot de passe.

### INFO. SUP : Installation

[DB Browser](https://sqlitebrowser.org/dl/)
[SQLite](https://www.sqlite.org/download.html)

**Sur Windows**

1) Installez SQLite directement sur C:
2) Tapez sur votre barre de recherche "Système d'environnement" puis ajoutez le path de SQLite
3) Exemple path = "C:\sqlite"
4) Appliquez désormais le code suivant sur votre dossier sql de source

```bat
sqlite3 sport_track.db
.read create_db.sql
.dum
```


### **PARTIE 3 : PHP**
### 1.3. Gestion des fichiers de données
Après s’être connectés à l’application, les utilisateurs devront pouvoir déposer et supprimer des fichiers d’activité sportive, et avoir accès à la liste de ces fichiers.

Les fichiers seront des fichiers au format JSON. Leur structure sera la suivante:

```json
{
  "activity":{
    "date":"01/09/2022",
    "description": "IUT -> RU"
  },
  "data":[
    {"time":"13:00:00","cardio_frequency":99,"latitude":47.644795,"longitude":-2.776605,"altitude":18},
    {"time":"13:00:05","cardio_frequency":100,"latitude":47.646870,"longitude":-2.778911,"altitude":18},
    {"time":"13:00:10","cardio_frequency":102,"latitude":47.646197,"longitude":-2.780220,"altitude":18},
    {"time":"13:00:15","cardio_frequency":100,"latitude":47.646992,"longitude":-2.781068,"altitude":17},
    {"time":"13:00:20","cardio_frequency":98,"latitude":47.647867,"longitude":-2.781744,"altitude":16},
    {"time":"13:00:25","cardio_frequency":103,"latitude":47.648510,"longitude":-2.780145,"altitude":16}
  ]
}
```

### 1.4. Installation PHP Debug (XDebug)
  1. Installez [VSCode](https://code.visualstudio.com/)
  2. Installez les extensions : [PHP Debug](https://marketplace.visualstudio.com/items?itemName=xdebug.php-debug),
  [PHP IntelliSense](https://marketplace.visualstudio.com/items?itemName=zobo.php-intellisense)
  [PHP Extension Pack](https://marketplace.visualstudio.com/items?itemName=xdebug.php-pack)
  3. Télécharger [VOTRE version](https://xdebug.org/wizard) de PHP Debug : Suivez les étapes
  4. Renommez le ficher reçu en : php_xdebug.dll
  5. Ouvrez votre fichier php.ini disponible sur le dossier source php
  6. Si vous n'avez pas php.ini mais que vous bénéficier de php.ini-development faites ceci :
  ```bat
  copy c:\php\php.ini-development c:\php\php.ini
  ou (selon votre installation)
  copy c:\Program Files\php\php.ini-development  c:\Program Files\php\php.ini 
  ```
  7. Sinon faites un copier-coller manuellement depuis votre OS
  8. Désormais ajoutez dans votre php.ini en fin de ligne :
  ```php
  [XDebug]
  xdebug.remote_enable=1
  xdebug.remote_autostart=1
  zend_extension="C:\Program Files\php\ext\php_xdebug.dll"
  ```
  zend_extension doit être choisi en fonction de votre répertoire php

  9. Redémarrez VSCode, cliquez sur le logo Debug en haut à gauche et dans la petite fenêtre de debug, à droite d'Exécuter et déboguer cliquez sur la liste puis choississez "Listen for xDebug"

  10. Essayez de debug votre programme grâce à F5 et voilà !! Votre PHP peut-être déboggé !!


### 1.5. Lancer un fichier PHP(dans le dossier racine du projet)

```bat
php -S localhost:8080
php test_calcul_distance.php
curl -X GET "http://localhost:8080/test_calcul_distance.php"
```