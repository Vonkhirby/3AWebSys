<form method="get" action="">
    <label for="score">Enter Score (0-100):</label>
    <input type="number" id="score" name="score" min="0" max="100" required>
    <button type="submit">Convert</button>
</form>
<?php
if (isset($_GET['score'])) {
    $score = (int)$_GET['score'];
    if ($score >= 90 && $score <= 100) {
        $grade = "A";
        $color = "green";
    } elseif ($score >= 80) {
        $grade = "B";
        $color = "blue";
    } elseif ($score >= 70) {
        $grade = "C";
        $color = "orange";
    } else {
        $grade = "F";
        $color = "red";
    }
    echo "Score: ".$score;
    echo "<p>Grade: <span style='color:$color;'>$grade</span></p>";
}
?>
