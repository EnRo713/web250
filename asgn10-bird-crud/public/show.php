<?php require_once('../../../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$bird = Bird::find_by_id($id);

/*
  Use the bicycles/staff/edit.php file as a guide 
  so your file mimics the same functionality.
*/

?>

