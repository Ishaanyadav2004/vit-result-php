<?php
include 'database.php';

// Function to calculate total and grade (moved outside the main logic)
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

if (!isset($_GET['prn']) || empty($_GET['prn'])) {
    echo "<p class='error-message'>PRN is missing.</p>";
    exit;
}

$prn = $conn->real_escape_string($_GET['prn']);

$sql = "SELECT * FROM results WHERE prn_no = '$prn'";
$result = $conn->query($sql);

if ($result === false) {
    echo "<p class='error-message'>Error executing query: " . $conn->error . "</p>";
    $conn->close();
    exit;
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Safely access array elements with null coalescing operator (PHP 7+)
    $student_name = $row['student_name'] ?? 'N/A';
    $prn_no = $row['prn_no'] ?? 'N/A';
    $cn_mse = $row['computer_networks_mse'] ?? null;
    $cn_ese = $row['computer_networks_ese'] ?? null;
    $toc_mse = $row['theory_of_computation_mse'] ?? null;
    $toc_ese = $row['theory_of_computation_ese'] ?? null;
    $ads_mse = $row['advanced_data_structures_mse'] ?? null;
    $ads_ese = $row['advanced_data_structures_ese'] ?? null;
    $os_mse = $row['operating_systems_mse'] ?? null;
    $os_ese = $row['operating_systems_ese'] ?? null;


    $cn = calculateResult($cn_mse, $cn_ese);
    $toc = calculateResult($toc_mse, $toc_ese);
    $ads = calculateResult($ads_mse, $ads_ese);
    $os = calculateResult($os_mse, $os_ese);

    // --- HTML Output (Consider separating this into a different file) ---
    echo "<div class='result-card'>";
    echo "<h2>{$student_name}</h2>";
    echo "<p>PRN: {$prn_no}</p>";
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

$conn->close();
?>