<?php
if (isset($_GET['total'])) {
    $price = (float)$_GET['total'];
    $discount = 0;

    if ($price >= 200) {
        $discount = 0.20;
    } elseif ($price >= 100) {
        $discount = 0.15;
    } elseif ($price >= 50) {
        $discount = 0.10;
    }

    $discountAmount = $price * $discount;
    $finalPrice = $price - $discountAmount;

    echo "Original Price: P" .$price . "<br>";
    echo "Discount Amount: P" .$discountAmount. " (" . ($discount * 100) . "% off)<br>";
    echo "Final Price: P" .$finalPrice;
}
?>