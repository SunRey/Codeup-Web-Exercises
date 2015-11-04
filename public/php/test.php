<?php 
    fwrite(STDOUT, 'What is your first name? ');
    $firstName = fgets(STDIN);
    fwrite(STDOUT, "Hello $firstName\n");
?>