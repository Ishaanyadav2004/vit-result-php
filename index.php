<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIT Student Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>VIT Semester Result</h1>
        <form id="resultForm" action="result.php" method="get" class="search-form">
            <input type="text" id="prn" name="prn" class="prn-input" placeholder="Enter PRN">
            <button type="submit" class="search-button">Get Result</button>
        </form>
        <div id="result"></div>
    </div>
</body>
</html>