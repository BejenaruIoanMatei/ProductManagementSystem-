<?php require base_path('app/views/partials/head.html') ?>


<body>
    <?php require base_path('app/views/partials/nav.php') ?>
    <?php require base_path('app/views/partials/banner.php') ?>

    <div class="product-show">
        <div class="product-card">
            <img src="/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['image']) ?>">

            <div class="product-details">
                <h1><?= htmlspecialchars($product['name']) ?></h1>
                <?php foreach ($product as $key => $value): ?>
                    <?php if (in_array($key, ['id', 'name', 'image']))
                        continue; ?>
                    <p><strong><?= htmlspecialchars(ucfirst($key)) ?>:</strong> <?= htmlspecialchars($value) ?></p>
                <?php endforeach; ?>

                <div class="actions">
                    <a href="/" class="back-btn">Back</a>
                    <a href="product/edit?id=<?= $product['id'] ?>" class="edit-btn">Edit</a>

                    <form action="/product" method="POST" class="delete-form">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
                        <button class="delete-btn">Delete</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

</body>

</html>