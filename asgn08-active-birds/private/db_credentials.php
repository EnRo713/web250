<?php

// Keep database credentials in a separate file
// 1. Easy to exclude this file from source code managers
// 2. Unique credentials on development and production servers
// 3. Unique credentials if working with multiple developers

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  define("DB_SERVER", "localhost");
  define("DB_USER", "sabirdsUser");
  define("DB_PASS", "cassowary");
  define("DB_NAME", "sabirds");
} elseif ($_SERVER['SERVER_NAME'] == 'web250.noidofbuenavista.click') {
  define("DB_SERVER", "localhost");
  define("DB_USER", "um87bmeeqisao");
  define("DB_PASS", ")<d1]3l#f>*1");
  define("DB_NAME", "dbxqg5etyborxp");
}

?>
