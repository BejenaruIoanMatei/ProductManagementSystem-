<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
</head>
<body>

<?php foreach ($product as $fields): ?>
    <?php foreach ($fields as $key => $value): ?>
        <?php if ($key === 'id') continue; ?> 

        <?= htmlspecialchars($key) ?> - <?= htmlspecialchars($value) ?> <br>
    <?php endforeach; ?>

    <img src="/<?= htmlspecialchars($fields['image']) ?>" 
         alt="<?= htmlspecialchars($fields['name']) ?>" 
         height="200">
    <hr>
<?php endforeach; ?>

<a href="/" style="color: #27D3F5;">Go back...</a>

</body>
</html>
