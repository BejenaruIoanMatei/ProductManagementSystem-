
<?php require base_path('app/views/partials/head.html') ?>

<body>
    <?php require base_path('app/views/partials/nav.php') ?>
    <?php require base_path('app/views/partials/banner.php') ?>

    <form action="/" method="GET">
        <input type="text" name="search" placeholder="Search product..." value="<?= htmlspecialchars($_GET['search'] ?? '')?>">
        <button type="submit">Search</button>
    </form>
    <?php foreach ($products as $product): ?>
        <?php foreach ($product as $key => $value): ?>
            <?php if ($key === 'id') 
                continue ?>
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



    <div class="page-info">
        <?php 
            if(!isset($_GET['page-nr']))
            {
                $page = 1;
            }else{
                $page = $_GET['page-nr'];
            }
        ?>

        Showing <?= $page ?> of <?= $pages ?>
    </div>

    <div class="pagination">
        <a href="?page-nr=1">First</a>

        <?php
            if(isset($_GET['page-nr']) and $_GET['page-nr'] > 1)
            {
                ?>
                    <a href="?page-nr=<?= $_GET['page-nr'] - 1?>">Previous</a>
                <?php
            }else{
                ?>
                    <a>Previous</a>
                <?php
            }
        ?>
        <div class="page-numbers">
            <?php 
                for ($counter = 1; $counter <= $pages; $counter ++)
                {
                    ?>
                        <a href="?page-nr=<?= $counter ?>"><?= $counter ?></a>
                    <?php
                }
            ?>
        </div>

        <?php
            if(!isset($_GET['page-nr']))
            {
                ?>
                    <a href="?page-nr=2">Next</a>
                <?php
            }else{
                if($_GET['page-nr'] >= $pages)
                {
                    ?>
                        <a>Next</a>
                    <?php
                }else{
                    ?>
                        <a href="?page-nr=<?= $_GET['page-nr'] + 1 ?>">Next</a>
                    <?php
                }
            }
        ?>
        <a href="?page-nr=<?= $pages ?>">Last</a>
    </div>
</body>
</html>
