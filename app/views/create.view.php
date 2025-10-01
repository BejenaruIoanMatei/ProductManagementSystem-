
<?php require base_path('app/views/partials/head.html') ?>

<body>

<?php require base_path('app/views/partials/nav.php') ?>


    <main>
        <h1>Add a New Product</h1>

        <form action="/products" method="POST" enctype="multipart/form-data">
            <label>
                Name: <br>
                <input type="text" name="name" required>
            </label>
            <?php if (isset($errors['name'])) : ?>
                <p class="error"><?= $errors['name'] ?></p>
            <?php endif ?>
            <br><br>
            

            <label>
                Description: <br>
                <textarea name="description" rows="4" required></textarea>
            </label>
            <?php if (isset($errors['description'])) : ?>
                <p class="error"><?= $errors['description'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                Price: <br>
                <input type="number" name="price" step="0.01" required>
            </label>
            <?php if (isset($errors['price'])) : ?>
                <p class="error"><?= $errors['price'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                Image: <br>
                <input type="file" name="image" accept="image/*" required>
            </label>
            <?php if (isset($errors['image'])) : ?>
                <p class="error"><?= $errors['image'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                Availability Date: <br>
                <input type="date" name="availability_date" required>
            </label>
            <?php if (isset($errors['availability_date'])) : ?>
                <p class="error"><?= $errors['availability_date'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                <input type="number" name="in_stock" value="1" required>
                In Stock
            </label>
            <?php if (isset($errors['in_stock'])) : ?>
                <p class="error"><?= $errors['in_stock'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                Created At: <br>
                <input type="date" name="created_at" required>
            </label>
            <?php if (isset($errors['created_at'])) : ?>
                <p class="error"><?= $errors['created_at'] ?></p>
            <?php endif ?>
            <br><br>

            <button type="submit">Save Product</button>
        </form>
    </main>
</body>
</html>
