<?php

require_once('../../private/initialize.php');
require_login();

// Find all members
$members = Member::find_all();

$page_title = 'Admin Page';
include(SHARED_PATH . '/admin_header.php');

?>

<div id="content">
  <div class="members listing">
    <h1>View</h1>

    <ul>
      <li><a href="<?= url_for('admin/users/index.php'); ?>">Users</a></li>
      <li><a href="<?= url_for('members/members.php'); ?>">Birds</a></li>
    </ul>

</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
