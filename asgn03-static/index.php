<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>asgn02 Inheritance</title>
  </head>

  <body>
    <hr>
    <h1>Inheritance Examples</h1>

    <?php 
      include 'Bird.php';

      echo '<p>The generic song of any bird is "' . $bird->song . '".</p>';
      echo '<p>The song of the ' . $fly_catcher->name . ' on breeding grounds is "' . $fly_catcher->song . '".</p>';
      echo "<p>The " . $fly_catcher->name . " " . $fly_catcher->can_fly() . ".</p>";
      echo "<p>The " . $kiwi->name . " " . $kiwi->can_fly() . ".</p>";
      echo "<hr>";
      
      echo "<h1>Static Examples</h1>";
      // Display instance_count before using create() method
      echo "<h2>Before using the create method</h2>";
      echo '<p>Bird count: ' . Bird::$instance_count . '</p>';
      echo '<p>Flycatcher count: ' . YellowBelliedFlyCatcher::$instance_count . '</p>';
      echo '<p>Kiwi count: ' . Kiwi::$instance_count . '</p>';
      
      // Create new instances using create() method
      $bird1 = Bird::create();
      $fly_catcher1 = YellowBelliedFlyCatcher::create();
      $kiwi1 = Kiwi::create();
      
      // Display instance_count after using create() method
      echo "<h2>After using the create method</h2>";
      echo '<p>Bird count: ' . Bird::$instance_count . '</p>';
      echo '<p>Flycatcher count: ' . YellowBelliedFlyCatcher::$instance_count . '</p>';
      echo '<p>Kiwi count: ' . Kiwi::$instance_count . '</p>';
      
      echo "<br>";
      echo "<hr>";
    ?>

  </body>
</html>
