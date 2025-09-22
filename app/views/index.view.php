<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
</head>
<body>

<?php foreach ($products as $product): ?>
    <?php foreach ($product as $key => $value): ?>
        <?php if ($key === 'id') continue; ?> 

        <?= htmlspecialchars($key) ?> - <?= htmlspecialchars($value) ?> <br>
    <?php endforeach; ?>

    <img src="/<?= htmlspecialchars($product['image']) ?>" 
         alt="<?= htmlspecialchars($product['name']) ?>" 
         height="200">
    <hr>
<?php endforeach; ?>


</body>
</html>
