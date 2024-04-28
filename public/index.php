<?php

/* 
// Affichage de toutes les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

// On inclut l'autoloader de composer pour éviter d'avoir à include_once une classe dès qu'on en a besoin 
include_once __DIR__ . "/../vendor/autoload.php";

// Étant donné qu'on a inclus l'autoloader il nous suffit de use le FQCN, et nous pourrons utiliser
// la classe dans la suite du code 
use \App\Database\Db;

// On utilise le helper dd du packahe de symfony/var-dumper pour "die and dump" des informations
dd(Db::get_instance()); 

