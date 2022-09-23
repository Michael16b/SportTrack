<?php
require_once 'UserDAO.php';
require_once 'User.php';
require_once 'SqliteConnection.php';

$SQLiteConnect = SQLiteConnection::getInstance()->getConnection();


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

?>