<?php

/* 
// Affichage de toutes les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

// On inclut l'autoloader de composer pour éviter d'avoir à include_once une classe dès qu'on en a besoin 
include_once __DIR__ . "/../vendor/autoload.php";

// À défaut d'utiliser un vrai système de route, on utilise ici un principe de "fichier 
// carrefour", qui, en fonction de la valeur du paramètre page effectue une certaine action
//
// Ici, les controllers retournent les vue présente dans le dossier views

$page = $_GET["page"] ?? "index";

switch($page) {
	case "index":
		$main = new \App\Controllers\MainController();
		$main -> show_view();
		break;

	case "debug":
		dump("test");
		break;

	default:
		include_once "../views/404.php";
		http_response_code(404);
}

