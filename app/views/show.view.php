<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
</head>

    <?php require base_path('app/views/partials/banner.php') ?>
    
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

        <a href="/" style="color: #27D3F5;">Go back...</a>

        <form action="/product" class="mt-6" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= htmlspecialchars($fields['id']) ?>">
            <button style="color: red; margin-top: 1em;">Delete</button>
        </form>

        <footer style="margin-top: 1em;">
            <a href="product/edit?id=<?= $fields['id'] ?>">Edit</a>
        </footer>
    <?php endforeach; ?>


    </body>
</html>
