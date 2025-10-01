<?php require base_path('app/views/partials/head.html') ?>

<body>
    <main>
        <h1>Add a New Product</h1>

        <form action="/product" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
            <label>
                Name: <br>
                <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>"> 
            </label>
            <?php if (isset($errors['name'])) : ?>
                <p class="error"><?= $errors['name'] ?></p>
            <?php endif ?>
            <br><br>
            

            <label>
                Description: <br>
                <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea>
            </label>
            <?php if (isset($errors['description'])) : ?>
                <p class="error"><?= $errors['description'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                Price: <br>
                <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>">
            </label>
            <?php if (isset($errors['price'])) : ?>
                <p class="error"><?= $errors['price'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                Image: <br>
                <input type="file" name="image" accept="image/*">
                <img src="/<?= htmlspecialchars($product['image']) ?>" alt="Current Image" height="100">
            </label>
            <?php if (isset($errors['image'])) : ?>
                <p class="error"><?= $errors['image'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                Availability Date: <br>
                <input type="date" name="availability_date" value="<?= htmlspecialchars($product['availability_date']) ?>">
            </label>
            <?php if (isset($errors['availability_date'])) : ?>
                <p class="error"><?= $errors['availability_date'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                <input type="number" name="in_stock" value="<?= htmlspecialchars($product['in_stock']) ?>">
                In Stock
            </label>
            <?php if (isset($errors['in_stock'])) : ?>
                <p class="error"><?= $errors['in_stock'] ?></p>
            <?php endif ?>
            <br><br>

            <label>
                Created At: <br>
                <input type="date" name="created_at" value="<?= htmlspecialchars($product['created_at']) ?>">
            </label>
            <?php if (isset($errors['created_at'])) : ?>
                <p class="error"><?= $errors['created_at'] ?></p>
            <?php endif ?>
            <br><br>
            
            <div>
                <a href="/">Cancel</a>
            </div>
            <button type="submit">Update</button>
        </form>
    </main>
</body>
</html>
