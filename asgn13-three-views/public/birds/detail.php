<?php

require_once('../../private/initialize.php');
// Get requested ID
$id = $_GET['id'] ?? false;

if(!$id) {
  redirect_to('birds/birds.php');
}

// Find bird using ID
$bird = Bird::find_by_id($id);

$page_title = 'Detail: ' . $bird->common_name;

if ($session->user_level === 'A') {
  $page_title = 'Admin Bird CRUD Area';
  include(SHARED_PATH . '/admin_header.php');
} elseif ($session->user_level === 'M') {
  $page_title = 'Members Area';
  include(SHARED_PATH . '/member_header.php');
} else {
  include(SHARED_PATH . '/public_header.php');
}

?>

<a class="back-link" href="<?= url_for('birds/birds.php'); ?>">&laquo; Back to List</a>

  <h1>Bird: <?= h($bird->common_name); ?></h1>

      <dl>
        <dt>Name</dt>
        <dd><?= h($bird->common_name); ?></dd>
      </dl>
      <dl>
        <dt>Habittat</dt>
        <dd><?= h($bird->habitat); ?></dd>
      </dl>
      <dl>
        <dt>Food</dt>
        <dd><?= h($bird->food); ?></dd>
      </dl>
      <dl>
        <dt>Conservation Level</dt>
        <dd><?= h($bird->conservation()); ?></dd>
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?= h($bird->backyard_tips); ?></dd>
      </dl>

<?php 

if ($session->user_level === 'A') {
  include(SHARED_PATH . '/admin_footer.php');
} elseif ($session->user_level === 'M') {
  include(SHARED_PATH . '/member_footer.php');
} else {
  include(SHARED_PATH . '/public_footer.php');
}

?>
