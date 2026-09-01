<?php
if (isset($_GET['num'])) {
    $number = (int)$_GET['num'];
    if ($number > 0) {
        echo "The number $number is positive.";
        if ($number % 2 === 0) {
            echo " It is also an even number.";
        } else {
            echo " It is also an odd number.";
        }
    } elseif ($number < 0) {
        echo "The number $number is negative.";
    } else {
        echo "The number is zero.";
    }
}
?>