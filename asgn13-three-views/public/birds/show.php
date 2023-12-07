<?php

require_once('../../private/initialize.php');
require_login();

$id = $_GET['id'] ?? '1'; // PHP > 7.0
$bird = Bird::find_by_id($id);

$page_title = 'Show Bird: ' . h($bird->common_name);

if ($session->user_level === 'A') {
  include(SHARED_PATH . '/admin_header.php');
} elseif ($session->user_level === 'M') {
  include(SHARED_PATH . '/member_header.php');
}

?>

  <a class="back-link" href="<?= url_for('birds/birds.php'); ?>">&laquo; Back to List</a>

  <h2>Bird: <?= h($bird->common_name); ?></h2>

  <div class="attributes">
    <dl>
      <dt>Common Name</dt>
      <dd><?= h($bird->common_name); ?></dd>
    </dl>
    <dl>
      <dt>Habitat</dt>
      <dd><?= h($bird->habitat); ?></dd>
    </dl>
    <dl>
      <dt>Food</dt>
      <dd><?= h($bird->food); ?></dd>
    </dl>
    <dl>
      <dt>Conservation ID</dt>
      <dd><?= h($bird->conservation()); ?></dd>
    </dl>
    <dl>
      <dt>Backyard Tips</dt>
      <dd><?= h($bird->backyard_tips); ?></dd>
    </dl>
  </div>
