<?php

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($commonName, $latinName) {
    $this->commonName = $commonName;
    $this->latinName = $latinName;
  }

}

// Old way ↓
// $robin->commonName = "American Robin";
$robin = new Bird("American Robin", "Turdus migratorius");
echo "Common name: " . $robin->commonName . "<br>";
echo "Latin name: " . $robin->latinName . "<br>";
echo "<hr>";

$towhee = new Bird("Eastern Towhee", "Pipilo erythrophthalmus");
echo "Common name: " . $towhee->commonName . "<br>";
echo "Latin name: " . $towhee->latinName . "<br>";
