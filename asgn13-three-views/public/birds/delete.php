<?php

require_once('../../private/initialize.php');
require_login();

$page_title = 'Delete Bird';

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
  $result = $bird->delete();
  $_SESSION['message'] = 'The bird was deleted successfully.';
  redirect_to(url_for('birds/birds.php'));
}

?>

<a class="back-link" href="<?= url_for('birds/birds.php'); ?>">&laquo; Back to List</a>

<h1>Delete Bird</h1>
<p>Are you sure you want to delete this bird?</p>
<p class="item"><?php echo h($bird->common_name); ?></p>

<form action="<?php echo url_for('birds/delete.php?id=' . h(u($id))); ?>" method="post">
  <div id="operations">
    <input type="submit" name="commit" value="Delete Bird" />
  </div>
</form>

<?php 

if ($session->user_level === 'A') {
  include(SHARED_PATH . '/admin_footer.php');
} elseif ($session->user_level === 'M') {
  include(SHARED_PATH . '/member_footer.php');
}

?>
