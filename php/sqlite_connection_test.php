<?php
require_once 'UserDAO.php';
require_once 'User.php';


$userDAO = UserDAO::getInstance();
$utilisateurs = new User();
$utilisateurs -> init("nom","prenom");
$userDAO = UserDAO::getInstance()->insert($utilisateurs);
?>