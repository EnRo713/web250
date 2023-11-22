<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeGgBYpAAAAAAbaliB8aYuIk-NUS7m7ihmgTzen" async defer></script>
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('../public/index.php'); ?>">WNC Birds</a> Staff Area
      </h1>
    </header>

    <navigation>
      <ul>
        <?php if($session->is_logged_in()) { ?>
        <li>User: <?php echo $session->username; ?></li>
        <li><a href="<?php echo url_for('/members/index.php'); ?>">Menu</a></li>
        <li><a href="<?php echo url_for('/logout.php'); ?>">Logout</a></li>
        <?php } ?>
      </ul>
    </navigation>

<?php echo display_session_message(); ?>
