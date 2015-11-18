 <?php

    // Set the default timezone
    date_default_timezone_set('America/Chicago');

    // Get Day of Week as number
    // 1 (for Monday) through 7 (for Sunday)
    $dayOfWeek = date('N');

    switch($dayOfWeek) {
        case 1:
            echo "Ben sez: \"it's\" Monday!\n";
            break;
        case 2:
            echo "Tuesday it is.\n";
            break;
        case 3:
            echo "Wednesday, HUMPDAY\n";
            break;
        case 4:
            echo "Today is THORSday\n";
            break;
        case 5:
            echo "Next Friday\n";
            break;
        case 6:
            echo "Saturday, the week ends\n";
            break;
        case 7:
            echo "Sunday is really the start of the week...\n";
            break;
    }