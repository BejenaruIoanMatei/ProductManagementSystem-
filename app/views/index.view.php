<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
</head>
<body>

<?php foreach ($products as $product) {
    foreach ($product as $key => $value) {
        echo "{$key} - {$value} <br>";
    }
    echo "<hr>";
}?>

</body>
</html>