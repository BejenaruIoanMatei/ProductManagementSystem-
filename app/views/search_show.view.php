<?php require base_path('app/views/partials/head.html') ?>


<body>
    <?php require base_path('app/views/partials/nav.php') ?>   
    <?php require base_path('app/views/partials/banner.php') ?>

    <?php foreach ($product as $key => $value) : ?>
        <?php if ($key === 'id')
            continue ?>
        <?= htmlspecialchars($key) ?> - <?= htmlspecialchars($value) ?>
        <br>
    <?php endforeach ?>

    <img src="/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($fields['name']) ?>" height="200">
    <hr>

    <a href="/" style="color: #27D3F5;">Go back...</a>

    <form action="/product" class="mt-6" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
        <button style="color: red; margin-top: 1em;">Delete</button>
    </form>

    <footer style="margin-top: 1em;">
        <a href="product/edit?id=<?= $product['id'] ?>">Edit</a>
    </footer>

</body>

</html>