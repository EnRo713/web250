<?php

class Bird {
  public static $instance_count = 0;
  public static $egg_num = 0;

  public $habitat;
  public $food;
  public $nesting = "tree";
  public $conservation;
  public $song = "chirp";
  public $flying = "yes";
  

  public static function create() {
    static::$instance_count++;
    return new Bird();
  }

  public function can_fly() {
    $flying_string = ($this->flying == "yes") ? "can fly" : "is stuck on the ground";
    return $flying_string;
  }
}

class YellowBelliedFlyCatcher extends Bird {
  public $name = "yellow-bellied flycatcher";
  public $diet = "mostly insects.";
  public $song = "flat chilk";
  public static $eggnum = "3-4, sometimes 5.";
}

class Kiwi extends Bird {
  public $name = "kiwi";
  public $diet = "omnivorous";
  public $flying = "no";
}

// Create instances
$bird = new Bird;
$fly_catcher = new YellowBelliedFlyCatcher;
$kiwi = new Kiwi;
$kiwi->flying = "no";

?>
