<?php

// Keep database credentials in a separate file
// 1. Easy to exclude this file from source code managers
// 2. Unique credentials on development and production servers
// 3. Unique credentials if working with multiple developers

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  define("DB_SERVER", "localhost");
  define("DB_USER", "webuser");
  define("DB_PASS", "secretpassword");
  define("DB_NAME", "chain_gang");
} elseif ($_SERVER['SERVER_NAME'] == 'web250.noidofbuenavista.click') {
  define("DB_SERVER", "localhost");
  define("DB_USER", "uy1xi26fgd3by");
  define("DB_PASS", "i(-5iS=0dKs=ODL+");
  define("DB_NAME", "dbwc34ugbdmnho");
}

?>
