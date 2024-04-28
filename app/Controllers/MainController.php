<?php 

namespace App\Controllers;

/**
 * @class MainController
 *
 * Ce controller est chargé d'afficher la page d'index
 */
class MainController {

    public function show_view() {
        include_once __DIR__ . "/../../views/main.php";
    }
}

?>
