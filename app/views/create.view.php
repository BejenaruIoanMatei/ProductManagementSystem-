<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <main>
        <h1>Add a New Product</h1>

        <form action="/products" method="POST" enctype="multipart/form-data">
            <!-- Name -->
            <label>
                Name: <br>
                <input type="text" name="name" required>
            </label>
            <br><br>

            <!-- Description -->
            <label>
                Description: <br>
                <textarea name="description" rows="4"></textarea>
            </label>
            <br><br>

            <!-- Price -->
            <label>
                Price: <br>
                <input type="number" name="price" step="0.01" required>
            </label>
            <br><br>

            <!-- Image -->
            <label>
                Image: <br>
                <input type="file" name="image" accept="image/*">
            </label>
            <br><br>

            <!-- Availability date -->
            <label>
                Availability Date: <br>
                <input type="date" name="availability_date">
            </label>
            <br><br>

            <!-- In Stock -->
            <label>
                <input type="number" name="in_stock" value="1">
                In Stock
            </label>
            <br><br>

            <label>
                Created At: <br>
                <input type="date" name="created_at">
            </label>
            <br><br>

            <button type="submit">Save Product</button>
        </form>
    </main>
</body>
</html>
