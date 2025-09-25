<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Create</title>
</head>
<body>
    <form action="/session" method="POST">
        <div>
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" autocomplete="email">
            <?php if (isset($errors['email'])) : ?>
                <p style="color: red;"><?= $errors['email'] ?></p>
            <?php endif ?>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" autocomplete="password">
            <?php if (isset($errors['password'])) : ?>
                <p style="color: red;"><?= $errors['password'] ?></p>
            <?php endif ?>
        </div>

        <div>
            <button type="submit">Log In</button>
        </div>
    </form>
</body>
</html>