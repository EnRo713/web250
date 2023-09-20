<?php

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($args=[]) {
    $this->commonName = $args['commonName'] ?? NULL;
    $this->latinName = $args['latinName'] ?? NULL;
  }
}

$flycatcher = new Bird(['commonName'=>'Acadian Flycatcher', 'latinName'=>'Empidonax virescens']);
echo "Common name: " . $flycatcher->commonName . "<br>";
echo "Latin name: " . $flycatcher->latinName . "<br>";
echo "<hr>";

$wren = new Bird(['commonName'=>'Carolina Wren', 'latinName'=>'Thryothorus ludovicianus']);
echo "Common name: " . $wren->commonName . "<br>";
echo "Latin name: " . $wren->latinName . "<br>";
