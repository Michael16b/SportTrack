CREATE TABLE "User" (
    idUser INTEGER PRIMARY KEY,
    lName TEXT NOT NULL,
    fName TEXT NOT NULL,
    birthDate TEXT NOT NULL,
    gender TEXT NOT NULL,
    size REAL,
    weight REAL,
    email TEXT,
    password TEXT,
);


CREATE TABLE "Activities" (
    idAct INTEGER PRIMARY KEY,
    description TEXT NOT NULL,
    date TEXT NOT NULL,
);


CREATE TABLE "Data" (
    idAct INTEGER PRIMARY KEY,
    startTime TEXT,
    duration TEXT,
    distance INTEGER,
    cardiacFreqMin INTEGER,
    cardiacFreqAvg INTEGER,
    cardiacFreqMax  INTEGER,
    altitude INTEGER,
    longitude REAL,
    latitude REAL
);