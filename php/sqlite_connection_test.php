<?php
require_once 'UserDAO.php';
require_once 'User.php';


$userDAO = UserDAO::getInstance();
$utilisateurs = new User();
$utilisateurs -> init(1,"LEBOUCHER","Naël","1999-01-01","M",180,50,"leboucher.nael@kaz.bzh","coucou");
$userDAO = UserDAO::getInstance()->insert($utilisateurs);
?>