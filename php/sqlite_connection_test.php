<?php
require_once 'UserDAO.php';
require_once 'User.php';
require_once 'SqliteConnection.php';
require_once 'Activity.php';
require_once 'ActivityDAO.php';
require_once 'Data.php';
require_once 'ActivityEntryDAO.php';




$SQLiteConnect = SQLiteConnection::getInstance()->getConnection();





// User
$user1 = new User();


echo 'Suppression de tous les utilisateurs :';
UserDAO::getInstance()->deleteAll($user1);

    
$query = "select * from User";
$res = $SQLiteConnect->query($query)->fetchall();
echo "verif de la bdd : ";
var_dump($res);



$userDAO = UserDAO::getInstance();

$user2 = new User();

echo "verif de l'initation d'une ligne de bd :";
$user1 -> init(1,"LEBOUCHER","Naël","16/04/2003","M",18.0,50,"leboucher.nael@kaz.bzh","coucou");
$user2 -> init(2,"Théthé","Théo","06/10/2003","M",18.0,50,"théo.poulain@kaz.bzh","j_adore_la_bretagne");

UserDAO::getInstance()->insert($user1);
UserDAO::getInstance()->insert($user2);


echo 'Insertion de 2 utilisateurs :';
var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);





echo 'verif de de la suppression :';
UserDAO::getInstance()->delete($user1);
var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);



echo "verif de la mise à jour d'une ligne de bd :";


$user2 -> init(2,"Besily","Michaël","16/04/2003","M",18.0,50,"théo.poulain@kaz.bzh","j_adore_la_bretagne");
UserDAO::getInstance()->update($user2);

var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);




// Activities

$activity1 = new Activity();
$activity2 = new Activity();

$query = "select * from Activities";


echo 'Suppression de toutes les activités :';
ActivityDAO::getInstance()->deleteAll($activity1);

var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);

echo "verif de l'initation d'une ligne de bd :";
$activity1 -> init(1,"Basket-Ball","18/08/2022",1);
$activity2 -> init(2,"FootBall","18/08/2022",1);

ActivityDAO::getInstance()->insert($activity1);
ActivityDAO::getInstance()->insert($activity2);


echo 'Insertion de 2 Activités :';
var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);


echo 'verif de de la suppression :';
ActivityDAO::getInstance()->delete($activity1);
var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);



echo "verif de la mise à jour d'une ligne de bd :";


$activity2 -> init(2,"Ultimate","20/08/2022",1);
ActivityDAO::getInstance()->update($activity2);

var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);





// Activity -> Re-insert

$activity1 -> init(1,"Basket-Ball","18/08/2022",1);
ActivityDAO::getInstance()->insert($activity1);


//Data

$data1 = new Data();
$data2 = new Data();

$query = "select * from Data";


echo 'Suppression de toutes les données :';
ActivityEntryDAO::getInstance()->deleteAll($data1);

var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);

echo "verif de l'initation d'une ligne de bd :";
$data1 -> init(1,"13:00:00","00:10:00",10,75,110,150,-2.776605,47.644795,18, 1);
$data2 -> init(2,"15:00:00","00:15:00",15,80,103,143, -2.776605,47.646870,15, 2);

ActivityEntryDAO::getInstance()->insert($data1);
ActivityEntryDAO::getInstance()->insert($data2);


echo 'Insertion de 2 Activités :';
var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);



echo 'verif de de la suppression :';
ActivityEntryDAO::getInstance()->delete($data1);
var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);



echo "verif de la mise à jour d'une ligne de bd :";


$data2 -> init(2,"18:00:00","00:20:00",15,80,103,143, -2.776605,47.646870,15, 2);
ActivityEntryDAO::getInstance()->update($data2);

var_dump($SQLiteConnect->query($query)->fetchAll());
var_dump($res);




?>