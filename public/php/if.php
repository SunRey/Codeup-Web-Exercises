 <?php
  echo "hello World\n";
  $a = 5;
  $b = 10;
  $c = '10';

// Shorten the next 2 statements into an if/else
  if ($a < $b) {
    echo "$a is less than $b\n";
  } else if ($a > $b) {
    echo "$b is greater than $a\n";
  }

// Shorten the next 2 statements into an if/else
  if ($b >= $c) {
    echo "$b is greater than OR equal to $c\n";
  } else if ($b <= $c) {
    echo "$b is less than OR equal to $c\n";
  }

// combine the next 4 conditionals into
// one if/else/elseif block that checks in order for:
// identical, equal, not identical, not equal
  if ($b === $c) {
    echo "$b is identical to $c\n";
  } else if ($b == $c) {
    echo "$b is equal to $c\n";
  } else if ($b !== $c) {
    echo "$b is not identical to $c\n";
  } else if ($b != $c) {
    echo "$b is not equal to $c\n";
  }

?>