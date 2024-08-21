<?php

require 'bai4control.php';

$numbers = [];
$results = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $numbers = array_map('intval', explode(',', $_POST['numbers']));

    
    $results = [
        'sum' => sumArray($numbers),
        'max' => maxArray($numbers),
        'min' => minArray($numbers),
        'sortedAscending' => sortArrayAscending($numbers),
        'sortedDescending' => sortArrayDescending($numbers),
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions Example</title>
    <link rel="stylesheet" href="bai4.css">
</head>

<body>

    <h1>Array Functions Example</h1>

    <form method="post" action="">
        <label for="numbers">Enter numbers separated by commas:</label>
        <input type="text" id="numbers" name="numbers" placeholder="e.g., 3,5,2,8,1" required>
        <input type="submit" value="Process Array">
    </form>

    <?php if ($results !== null): ?>
    <table>
        <tr>
            <th>Operation</th>
            <th>Result</th>
        </tr>
        <tr>
            <td>Original Array</td>
            <td><?php echo implode(', ', $numbers); ?></td>
        </tr>
        <tr>
            <td>Sum of Array</td>
            <td><?php echo $results['sum']; ?></td>
        </tr>
        <tr>
            <td>Maximum Value</td>
            <td><?php echo $results['max']; ?></td>
        </tr>
        <tr>
            <td>Minimum Value</td>
            <td><?php echo $results['min']; ?></td>
        </tr>
        <tr>
            <td>Sorted Array (Ascending)</td>
            <td><?php echo implode(', ', $results['sortedAscending']); ?></td>
        </tr>
        <tr>
            <td>Sorted Array (Descending)</td>
            <td><?php echo implode(', ', $results['sortedDescending']); ?></td>
        </tr>
    </table>
    <?php endif; ?>

</body>

</html>