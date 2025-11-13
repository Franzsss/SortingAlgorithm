<!DOCTYPE html>
<html>
<head>
    <title>PHP Bubble Sort Program</title>
</head>
<body>
    <h2>Array Sorting Using Bubble Sort</h2>

    <form method="post">
        <label>Enter integers (comma-separated):</label><br>
        <input type="text" name="values" placeholder="Example: 8, 3, 5, 1, 9" required><br><br>

        <label>Select order:</label><br>
        <select name="direction">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>

        <button type="submit" name="run">Process</button>
    </form>

    <?php
    function sortBubble($list, $dir) {
        $len = count($list);
        $moves = 0;

        for ($a = 0; $a < $len - 1; $a++) {
            for ($b = 0; $b < $len - $a - 1; $b++) {
                $compare = ($dir == "asc") ? $list[$b] > $list[$b + 1] : $list[$b] < $list[$b + 1];
                if ($compare) {
                    $hold = $list[$b];
                    $list[$b] = $list[$b + 1];
                    $list[$b + 1] = $hold;
                    $moves++;
                }
            }
        }
        return [$list, $moves];
    }

    if (isset($_POST['run'])) {
        $data = explode(',', $_POST['values']);
        $nums = array_map('intval', $data);
        $way = $_POST['direction'];
        $originalList = $nums;

        list($finalList, $swaps) = sortBubble($nums, $way);

        echo "<h3>Results</h3>";
        echo "Original: [" . implode(", ", $originalList) . "]<br>";
        echo "Sorted ($way): [" . implode(", ", $finalList) . "]<br>";
        echo "Swaps Made: $swaps";
    }
    ?>
</body>
</html>
