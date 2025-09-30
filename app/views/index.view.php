<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
</head>
<body>

<?php require base_path('app/views/partials/nav.php') ?>
<?php require base_path('app/views/partials/banner.php') ?>

<?php foreach ($products as $product): ?>
    <?php foreach ($product as $key => $value): ?>
        <?php if ($key === 'id') continue; ?> 
        <?php if ($key === 'name') : ?>
            <a href="/product?id=<?= $product['id'] ?>">Link to Product</a>
            <br>
        <?php endif ?>

        <?= htmlspecialchars($key) ?> - <?= htmlspecialchars($value) ?> <br>
    <?php endforeach; ?>

    <img src="/<?= htmlspecialchars($product['image']) ?>" 
         alt="<?= htmlspecialchars($product['name']) ?>" 
         height="200">
    <hr>
<?php endforeach; ?>


</body>
</html>
