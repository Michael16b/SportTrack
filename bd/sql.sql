CREATE TABLE User(
    idUser INTEGER PRIMARY KEY,
    lName TEXT NOT NULL,
    fName TEXT NOT NULL,
    birthDate TEXT NOT NULL,
    gender TEXT NOT NULL
        CHECK gender = 'F' or gender = 'M' or gender = 'NB',
    size REAL NOT NULL,
    weight REAL NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
);


CREATE TABLE "Activities" (
    idAct INTEGER PRIMARY KEY,
    description TEXT NOT NULL,
    date TEXT NOT NULL,
    FOREIGN KEY (User_idUser) REFERENCES User(idUser)
);


CREATE TABLE "Data" (
    idAct INTEGER PRIMARY KEY,
    startTime TEXT,
    duration TEXT,
    distance INTEGER,
    cardiacFreqMin INTEGER,
    cardiacFreqAvg INTEGER,
    cardiacFreqMax  INTEGER,
    longitude REAL,
    latitude REAL,
    altitude INTEGER,
    FOREIGN KEY (Activities_idAct) REFERENCES Activities(idAct)
);