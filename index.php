<?php
include_once 'oop.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collatz Conjecture</title>
</head>
<body>
    <h2>Collatz Conjecture</h2>
    <form action="index.php" method="GET">
        <label for="start">Starting Number:</label>
        <input type="number" name="start" id="start" required value="<?php if (isset($_GET['start'])) echo $_GET['start']; ?>"><br><br>
        
        <label for="last">Ending Number:</label>
        <input type="number" name="last" id="last" required value="<?php if (isset($_GET['last'])) echo $_GET['last']; ?>"><br><br>
        
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
