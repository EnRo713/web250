<?php

class Guitar {
  public $brand;
  public $model;
  protected $color;
  protected $string_type;
  protected $is_fixed_bridge = true;
  protected $is_acoustic = false;
  protected $is_set_neck = false;
  protected $is_bolt_on = false;

  // Class method
  public function name() {
    $details = $this->generateDetails();
    return $this->brand . " " . $this->model;
  }

  public function description() {
    $details = $this->generateDetails();
    return "This is an electric guitar.<br>" . $details;
  }

  protected function generateDetails() {
    $details = "Color: " . $this->color . ", with " . $this->string_type . " strings";

    if ($this->is_acoustic) {
      $details .= " Acoustic";
    } else {
      $details .= " Electric";
      if ($this->is_fixed_bridge) {
        $details .= " with Fixed Bridge";
      } else {
        $details .= " with Floating Bridge";
      }
    }

    return $details;
  }

  // Setter for color
  public function setColor($color) {
    $this->color = $color;
  }

  // Getter for color
  public function getColor() {
    return $this->color;
  }
}

class Acoustic extends Guitar {
  protected $is_acoustic = true;

  // Override parent class method
  public function description() {
    return "This is an acoustic guitar.";
  }
}

class Steel extends Acoustic {
  protected $string_type = "Steel";

  public function playMetal() {
    return "This guitar is great for playing metal music.";
  }
}

class Nylon extends Acoustic {
  protected $string_type = "Nylon";

  public function playClassical() {
    return "This guitar is perfect for classical music.";
  }
}

class Electric extends Guitar {
  protected $string_type = "Nickel";

  public function playRock() {
    return "This guitar is ideal for playing rock music.";
  }
}

class FloatingBridge extends Electric {
  protected $is_fixed_bridge = false;
  protected $is_bolt_on = true;
  protected $string_type = "Nickel"; // Initialize the property with a default value

  public function playFusion() {
    return "This guitar suits fusion music styles.";
  }

  // Setter for string_type
  public function setStringType($string_type) {
    $this->string_type = $string_type;
  }
  // Getter
  public function getStringType() {
    return $this->string_type;
  }

  // Setter for is_fixed_bridge
  public function setIsFixedBridge($is_fixed_bridge) {
    $this->is_fixed_bridge = $is_fixed_bridge;
  }
  // Getter
  public function getIsFixedBridge() {
    return $this->is_fixed_bridge;
  }

  // Setter for is_bolt_on
  public function setIsBoltOn($is_bolt_on) {
    $this->is_bolt_on = $is_bolt_on;
  }
  // Getter
  public function getIsBoltOn() {
    return $this->is_bolt_on;
  }

  // Setter for is_acoustic
  public function setIsAcoustic($is_acoustic) {
    $this->is_acoustic = $is_acoustic;
  }
  // Getter
  public function getIsAcoustic() {
    return $this->is_acoustic;
  }

  // Setter for is_set_neck
  public function setIsSetNeck($value) {
    $this->is_set_neck = $value;
  }
  // Getter
  public function getIsSetNeck() {
    return $this->is_set_neck;
  }
}

// Create instances to test
function inspect_class($class_name) {
  $output = '';

  $output .= $class_name;
  $parent_class = get_parent_class($class_name);
  if ($parent_class != '') {
      $output .= " extends {$parent_class}";
  }
  $output .= "\n";

  $class_vars = get_class_vars($class_name);
  ksort($class_vars);
  $output .= "properties: \n";
  foreach ($class_vars as $k => $v) {
      $output .= "- {$k}: {$v}\n";
  }

  $class_methods = get_class_methods($class_name);
  sort($class_methods);
  $output .= "methods: \n";
  foreach ($class_methods as $k) {
      $output .= "- {$k}\n";
  }

  return $output;
}

$class_names = ['Guitar', 'Acoustic', 'Steel', 'Nylon', 'Electric', 'FloatingBridge'];
foreach ($class_names as $class_name) {
  echo nl2br(inspect_class($class_name));
  echo '<br>';
}
echo "<hr>";

// Test the new guitar instances
$electric1 = new FloatingBridge;
$electric1->brand = 'Jackson';
$electric1->model = 'Randy Rhoads Flying V';
$electric1->setColor('White'); // Set color using setter
$electric1->setStringType('Nickel'); // Set string_type using setter
$electric1->setIsFixedBridge(false); // Set is_fixed_bridge using setter
$electric1->setIsAcoustic(false); // Set is_acoustic using setter
$electric1->setIsSetNeck(true); // Set is_set_neck using setter
$electric1->setIsBoltOn(false); // Set is_bolt_on using setter

$classical = new Nylon;
$classical->brand = 'Alvarez';
$classical->model = 'Classical';
$classical->setColor('Natural Finish');
// $classical->setStringType('Nylon');   <-- Not needed because value is inherited
// $classical->setIsFixedBridge(true);
$electric1->setIsAcoustic(true);
$electric1->setIsSetNeck(true);
// $classical->setIsBoltOn(false);

$electric3 = new Electric;
$electric3->brand = 'Gibson';
$electric3->model = 'Les Paul';
$electric3->setColor('Silver');
// $electric3->setStringType('Nickel');
// $electric3->setIsFixedBridge(true);
$electric1->setIsAcoustic(false);
$electric1->setIsSetNeck(true);
// $electric3->setIsBoltOn(false);

// Display guitar names and descriptions
$guitars = [$electric1, $classical, $electric3];

foreach ($guitars as $guitar) {
  echo 'Guitar Name: ' . $guitar->name() . "<br>";
  echo 'Description: ' . $guitar->description() . "<br>";
  if ($guitar instanceof Steel) {
    echo $guitar->playMetal() . "<br>";
  } elseif ($guitar instanceof Nylon) {
    echo $guitar->playClassical() . "<br>";
  } elseif ($guitar instanceof Electric) {
    echo $guitar->playRock() . "<br>";
  } elseif ($guitar instanceof FloatingBridge) {
    echo $guitar->playFusion() . "<br>";
  }
  echo "<hr>";
}

?>
