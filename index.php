<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WEB-250</title>
    <link href="css/main.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <h1>WEB-250</h1>
    <?php
      $dir = './'; // Specify the directory path
      // Open a directory, and read its contents
      if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
          while (($file = readdir($dh)) !== false) {
            // Skip . and .. directories, .git, and .gitignore
            if ($file !== '.' && $file !== '..' && $file !== '.git' && $file !== '.gitignore') {
              echo '<li><a href="' . $file . '">' . $file . '</a></li>';
            }
          }
          closedir($dh);
        }
      }
    ?>
  </body>
</html>
