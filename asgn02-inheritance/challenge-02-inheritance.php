<?php

class Guitar {
  var $brand;
  var $model;
  var $color;
  var $string_type;
  var $is_fixed_bridge = true;
  var $is_acoustic = false;
  var $is_set_neck = false;
  var $is_bolt_on = false;

  // Class method
  function name() {
    $details = $this->generateDetails();
    return $this->brand . " " . $this->model;
  }
  
  function description() {
    $details = $this->generateDetails();
    return "This is an electric guitar.<br>" . $details;
  }

  function generateDetails() {
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
}

class Acoustic extends Guitar {
  var $is_acoustic = true;

  // Override parent class method
  function description() {
    return "This is an acoustic guitar.";
  }
}

class Steel extends Acoustic {
  var $string_type = "Steel";

  function playMetal() {
    return "This guitar is great for playing metal music.";
  }
}

class Nylon extends Acoustic {
  var $string_type = "Nylon";

  function playClassical() {
    return "This guitar is perfect for classical music.";
  }
}

class Electric extends Guitar {
  var $string_type = "Nickel";

  function playRock() {
    return "This guitar is ideal for playing rock music.";
  }
}

class FloatingBridge extends Electric {
  var $is_fixed_bridge = false;
  var $is_bolt_on = true;

  function playFusion() {
    return "This guitar suits fusion music styles.";
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
$electric1->color = 'White';
$electric1->string_type = 'Nickel';
$electric1->is_fixed_bridge = false;
$electric1->is_acoustic = false;
$electric1->is_set_neck = true;
$electric1->is_bolt_on = false;

$electric2 = new FloatingBridge;
$electric2->brand = 'Fender';
$electric2->model = 'Stratocaster';
$electric2->color = 'Red';
$electric2->string_type = 'Nickel';
$electric2->is_fixed_bridge = false;
$electric2->is_acoustic = false;
$electric2->is_set_neck = false;
$electric2->is_bolt_on = true;

$classical = new Nylon;
$classical->brand = 'Alvarez';
$classical->model = 'Classical';
$classical->color = 'Natural Finish';
$classical->string_type = 'Nylon';
$classical->is_fixed_bridge = true;
$classical->is_acoustic = true;
$classical->is_set_neck = true;
$classical->is_bolt_on = false;

$electric3 = new Electric;
$electric3->brand = 'Gibson';
$electric3->model = 'Les Paul';
$electric3->color = 'Silver';
$electric3->string_type = 'Nickel';
$electric3->is_fixed_bridge = true;
$electric3->is_acoustic = false;
$electric3->is_set_neck = true;
$electric3->is_bolt_on = false;

$electric4 = new FloatingBridge;
$electric4->brand = 'Jackson';
$electric4->model = 'Warrior';
$electric4->color = 'Black Nickel';
$electric4->string_type = 'Nickel';
$electric4->is_fixed_bridge = false;
$electric4->is_acoustic = false;
$electric4->is_set_neck = false;
$electric4->is_bolt_on = true;

$acoustic = new Acoustic;
$acoustic->brand = 'Yamaha';
$acoustic->model = 'FG800';
$acoustic->color = 'Natural';
$acoustic->string_type = 'Steel';
$acoustic->is_fixed_bridge = true;
$acoustic->is_acoustic = true;
$acoustic->is_set_neck = true;
$acoustic->is_bolt_on = false;

// Display guitar names and descriptions
$guitars = [$electric1, $electric2, $classical, $electric3, $electric4, $acoustic];

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
