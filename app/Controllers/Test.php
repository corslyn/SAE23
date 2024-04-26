<?php 

namespace App\Controllers;

class Test {

    private $test;
    
    public function __construct() {
        $this -> test = uniqid();
    }

    public function show_id() {
        return $this -> test;
    }
}

?>