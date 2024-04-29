<?php 

namespace App\Controllers;

/**
 * @class MainController
 *
 * Ce controller est chargé de la partie logique de l'affichage de la page d'index
 */
class MainController {

    public function show_view() {
        include_once __DIR__ . "/../../views/main.php";
    }
}

?>
