<?php
  class Animal {
    private $species;
    private $name;
    private $weight;
    private $height;

    function set_species($species) {
      $this->species = $species;
    }
    function get_species() {
      return $this->species;
    }
    function set_name($name) {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }
    function set_weight($weight) {
      $this->weight = $weight;
    }
    function get_weight() {
      return $this->weight;
    }
    function set_height($height) {
      $this->height = $height;
    }
    function get_height() {
      return $this->height;
    }
  }
?>
