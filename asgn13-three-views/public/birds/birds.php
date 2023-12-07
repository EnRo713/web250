<?php

  require_once('../../private/initialize.php');
  $page_title = 'Bird List';

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

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

  <?php if ($session->is_logged_in()) : ?>
    <a href="<?= url_for('/birds/new.php'); ?>">Add Bird</a>
  <?php endif; ?>

    <table border="1">
      <tr>
        <th>Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Conservation</th>
        <th>Backyard Tips</th>
        <th>&nbsp;</th>
        <?php if ($session->is_logged_in()) : ?>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        <?php endif; ?>

      </tr>

<?php
  $birds = Bird::find_all();
  foreach($birds as $bird) { 
?>

      <tr>
        <td><?= h($bird->common_name); ?></td>
        <td><?= h($bird->habitat); ?></td>
        <td><?= h($bird->food); ?></td>
        <td><?= h($bird->conservation()); ?></td>
        <td><?= h($bird->backyard_tips); ?></td>
        <td><a href="detail.php?id=<?= $bird->id; ?>">View</a></td>
        <?php if ($session->is_logged_in()) : ?>
          <td><a href="<?= url_for('birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
          <td><a href="<?= url_for('birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>
        <?php endif; ?>
      </tr>
      <?php } ?>

    </table>

<?php 

  if ($session->user_level === 'A') {
    include(SHARED_PATH . '/admin_footer.php');
  } elseif ($session->user_level === 'M') {
    include(SHARED_PATH . '/member_footer.php');
  } else {
    include(SHARED_PATH . '/public_footer.php');
  }

?>
