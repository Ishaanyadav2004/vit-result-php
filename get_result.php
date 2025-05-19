<?php
include 'database.php';

if (isset($_GET['prn'])) {
    $prn = $_GET['prn'];

    $sql = "SELECT * FROM results WHERE prn_no = '$prn'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        function calculateResult($mse, $ese) {
            if ($mse === null || $ese === null) return ["total" => "N/A", "grade" => "N/A"];
            $total = (0.3 * $mse) + (0.7 * $ese);
            $grade = 'F';
            if ($total >= 85) $grade = 'A+';
            else if ($total >= 75) $grade = 'A';
            else if ($total >= 65) $grade = 'B+';
            else if ($total >= 55) $grade = 'B';
            else if ($total >= 40) $grade = 'C';
            return ["total" => number_format($total, 2), "grade" => $grade];
        }

        $cn = calculateResult($row['computer_networks_mse'], $row['computer_networks_ese']);
        $toc = calculateResult($row['theory_of_computation_mse'], $row['theory_of_computation_ese']);
        $ads = calculateResult($row['advanced_data_structures_mse'], $row['advanced_data_structures_ese']);
        $os = calculateResult($row['operating_systems_mse'], $row['operating_systems_ese']);

        echo "<div class='result-card'>";
        echo "<h2>{$row['student_name']}</h2>";
        echo "<p>PRN: {$row['prn_no']}</p>";
        echo "<div class='subject-results'>";
        echo "<div class='subject'><h3>Computer Networks</h3><p>Total: {$cn['total']}</p><p>Grade: {$cn['grade']}</p></div>";
        echo "<div class='subject'><h3>Theory of Computation</h3><p>Total: {$toc['total']}</p><p>Grade: {$toc['grade']}</p></div>";
        echo "<div class='subject'><h3>Advanced Data Structures</h3><p>Total: {$ads['total']}</p><p>Grade: {$ads['grade']}</p></div>";
        echo "<div class='subject'><h3>Operating Systems</h3><p>Total: {$os['total']}</p><p>Grade: {$os['grade']}</p></div>";
        echo "</div>";
        echo "</div>";

    } else {
        echo "<p class='error-message'>Result not found for this PRN</p>";
    }
}
$conn->close();
?>