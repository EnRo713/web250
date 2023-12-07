<?php

require_once('../../private/initialize.php');
require_login();

$page_title = 'Edit Bird';

if ($session->user_level === 'A') {
  include(SHARED_PATH . '/admin_header.php');
} elseif ($session->user_level === 'M') {
  include(SHARED_PATH . '/member_header.php');
}

if(!isset($_GET['id'])) {
  redirect_to(url_for('birds/birds.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if($bird == false) {
  redirect_to(url_for('birds/birds.php'));
}

if(is_post_request()) {
  $args = $_POST['bird'];
  $bird->merge_attributes($args);
  $result = $bird->save();

  if($result === true) {
    $_SESSION['message'] = 'The bird was updated successfully.';
    redirect_to(url_for('birds/show.php?id=' . $id));
  }
}

?>

<a class="back-link" href="<?= url_for('birds/birds.php'); ?>">&laquo; Back to List</a>

<h1>Edit Bird</h1>

<?= display_errors($bird->errors); ?>

<form action="<?= url_for('birds/edit.php?id=' . h(u($id))); ?>" method="post">
  <?php include('form_fields.php'); ?>
  <input type="submit" value="Edit Bird">
</form>

<?php 

if ($session->user_level === 'A') {
  include(SHARED_PATH . '/admin_footer.php');
} elseif ($session->user_level === 'M') {
  include(SHARED_PATH . '/member_footer.php');
}

?>
