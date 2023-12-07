<?php

require_once('../../private/initialize.php');
require_login();

$page_title = 'Create Bird';

if ($session->user_level === 'A') {
  include(SHARED_PATH . '/admin_header.php');
} elseif ($session->user_level === 'M') {
  include(SHARED_PATH . '/member_header.php');
}

if(is_post_request()) {
  $args = $_POST['bird'];
  $bird = new Bird($args);
  $result = $bird->save();

  if($result === true) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'The bird was created successfully.';
    redirect_to(url_for('birds/show.php?id=' . $new_id));
  }
} else {
  $bird = new Bird;
}

?>

<a class="back-link" href="<?= url_for('birds/birds.php'); ?>">&laquo; Back to List</a>

<h1>Create Bird</h1>

<?= display_errors($bird->errors); ?>

<form action="<?= url_for('birds/new.php'); ?>" method="post">
  <?php include('form_fields.php'); ?>
  <input type="submit" value="Create Bird" />
</form>


<?php 

if ($session->user_level === 'A') {
  include(SHARED_PATH . '/admin_footer.php');
} elseif ($session->user_level === 'M') {
  include(SHARED_PATH . '/member_footer.php');
}

?>
