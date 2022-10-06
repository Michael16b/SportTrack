BEGIN TRANSACTION;
CREATE TABLE "User" (
	"idUser"	INTEGER,
	"lName"	TEXT NOT NULL,
	"fName"	TEXT NOT NULL,
	"birthDate"	TEXT NOT NULL,
	"gender"	TEXT NOT NULL CHECK("gender" = 'F' OR "gender" = 'M' OR "gender" = 'NB'),
	"size"	REAL NOT NULL,
	"weight"	REAL NOT NULL,
	"email"	TEXT NOT NULL 
		CONSTRAINT "uq_email" UNIQUE,
	"password"	TEXT NOT NULL,
	CONSTRAINT "pk_User" PRIMARY KEY("idUser" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "Data" (
	"idData"	INTEGER,
	"startTime"	TEXT,
	"longitude"	REAL,
	"latitude"	REAL,
	"altitude"	INTEGER,
	"idAct"	INTEGER NOT NULL,
	CONSTRAINT "pk_Data" PRIMARY KEY("idData"),
	CONSTRAINT "fk_Data_Activities" FOREIGN KEY("idAct") REFERENCES "Activities"("idAct")
);
CREATE TABLE IF NOT EXISTS "Activities" (
	"idAct"	INTEGER,
	"description"	TEXT NOT NULL,
	"date"	DATE NOT NULL,
	"startTime"	TEXT,
	"duration"	TEXT,
	"distance"	INTEGER,
	"cardiacFreqMin"	INTEGER,
	"cardiacFreqAvg"	INTEGER,
	"cardiacFreqMax"	TEXT,
	"idUser"	TEXT,
	CONSTRAINT "pk_Activities" PRIMARY KEY("idAct" AUTOINCREMENT),
	CONSTRAINT "fk_Activites_User" FOREIGN KEY("idUser") REFERENCES "User"("idUser")
);
