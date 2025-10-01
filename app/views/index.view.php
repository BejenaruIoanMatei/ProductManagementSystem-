
<?php require base_path('app/views/partials/head.html') ?>

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
