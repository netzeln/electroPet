<?php
class Pet {
    private $name;
    private $food;
    private $play;
    private $sleep;

    function __construct($name, $food = 10, $play = 10, $sleep = 10) {
        $this->name = $name;
        $this->food = $food;
        $this->play = $play;
        $this->sleep = $sleep;
    }

    function setName($new_name) {
        $this->name = $new_name;
    }

    function setFood($new_food) {
        $this->food = $new_food;
    }

    function setPlay($new_play) {
        $this->play = $new_play;
    }

    function setSleep($new_sleep) {
        $this->sleep = $new_sleep;
    }

    function getName() {
        return $this->name;
    }

    function getFood() {
        return $this->food;
    }

    function getPlay() {
        return $this->play;
    }

    function getSleep() {
        return $this->sleep;
    }

    function addFood() {
        $this->food = $this->food + 1;
    }

    function addPlay() {
        $this->play = $this->play + 1;
    }

    function addSleep() {
        $this->sleep = $this->sleep + 1;
    }

    function savePet(){
        array_push($_SESSION['list_of_pets'], $this);
    }
    static function getAll(){
        return $_SESSION['list_of_pets'];
    }

    static function endAllLife(){
        $_SESSION['list_of_pets'] = array();
    }
} ?>
