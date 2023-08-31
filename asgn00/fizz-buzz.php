<?php

for ($i = 1; $i <= 100; $i++) {
  echo ($i % 3 == 0 ? 'Fizz' : '') . ($i % 5 == 0 ? 'Buzz' : '') ?: $i;
  echo '<br>';
}
