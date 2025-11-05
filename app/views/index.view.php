<?php require base_path('app/views/partials/head.html') ?>

<body>
    
    <?php require base_path('app/views/partials/nav.php') ?>
    <?php require base_path('app/views/partials/banner.php') ?>

    <form action="/" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search product..."
            value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit">Search</button>
    </form>
    <div class="products-home">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <a href="/product?id=<?= $product['id'] ?>" class="product-link">
                    <img src="/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                </a>
                <div class="product-info">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <?php foreach ($product as $key => $value): ?>
                        <?php if ($key === 'id' or $key === 'image' or $key === 'created_at' or $key === 'name')
                            continue ?>
                            <p><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($value) ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="page-info">
        <?php
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        ?>

        Showing <?= $page ?> of <?= $pages ?>
    </div>

    <div class="pagination">
        <a href="?page=1">First</a>

        <?php
        if (isset($_GET['page']) and $_GET['page'] > 1) {
            ?>
            <a href="?page=<?= $_GET['page'] - 1 ?>">Previous</a>
            <?php
        } else {
            ?>
            <a>Previous</a>
            <?php
        }
        ?>
        <div class="page-numbers">
            <?php
            for ($counter = 1; $counter <= $pages; $counter++) {
                $activeClass = ($counter == $page) ? 'active' : '';
                ?>
                <a href="?page=<?= $counter ?>" class="<?= $activeClass ?>"><?= $counter ?></a>
                <?php
            }
            ?>
        </div>

        <?php
        if (!isset($_GET['page'])) {
            ?>
            <a href="?page=2">Next</a>
            <?php
        } else {
            if ($_GET['page'] >= $pages) {
                ?>
                <a>Next</a>
                <?php
            } else {
                ?>
                <a href="?page=<?= $_GET['page'] + 1 ?>">Next</a>
                <?php
            }
        }
        ?>
        <a href="?page=<?= $pages ?>">Last</a>
    </div>
</body>

</html>