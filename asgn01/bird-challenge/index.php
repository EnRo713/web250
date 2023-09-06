<?php

class Bird {
  var $commonName;
  var $food = "bugs";
  var $nestPlacement = "tree";
  var $conservationLevel;
  
  function song($type) {
    return $type;
  }
  
  function canFly() {
    return "This bird can fly";
  }
}

$bird1 = new Bird;
$bird1->commonName = 'Eastern Towhee';
$bird1->food = 'seeds, fruits, insects, spiders';
$bird1->nestPlacement = 'Ground';
$bird1->conservationLevel = 'Low';

$bird2 = new Bird;
$bird2->commonName = 'Indigo Bunting';
$bird2->food = 'small seeds, berries, buds, and insects';
$bird2->nestPlacement = 'roadsides, and railroad rights-of-way, fields and on the edges of woods';
$bird2->conservationLevel = 'Low';

echo "Bird 1:<br />";
echo "Common Name: " . $bird1->commonName . "<br />";
echo "Food: " . $bird1->food . "<br />";
echo "Nest Placement: " . $bird1->nestPlacement . "<br />";
echo "Conservation Level: " . $bird1->conservationLevel . "<br />";
echo "Song: " . $bird1->song("drink-your-tea!") . "<br />";
echo $bird1->canFly() . "<br />";

echo "<br />Bird 2:<br />";
echo "Common Name: " . $bird2->commonName . "<br />";
echo "Food: " . $bird2->food . "<br />";
echo "Nest Placement: " . $bird2->nestPlacement . "<br />";
echo "Conservation Level: " . $bird2->conservationLevel . "<br />";
echo "Song: " . $bird2->song("whatwhat!!") . "<br />";
echo $bird2->canFly() . "<br />";

?>
