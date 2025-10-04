<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Create</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-form {
            background: #fff;
            padding: 25px 30px;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 360px;
        }

        .login-form div {
            margin-bottom: 15px;
        }

        .login-form label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.9rem;
            color: #333;
        }

        .login-form input {
            width: 92.5%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: border-color 0.2s;
        }

        .login-form input:focus {
            border-color: #0077b6;
            outline: none;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #0077b6;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }

        .login-form button:hover {
            background: #005f86;
        }

        .login-form p {
            margin-top: 5px;
            font-size: 0.85rem;
            color: red;
        }
    </style>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <?php require base_path('app/views/partials/nav.php') ?>

    <form class="login-form" action="/session" method="POST">
        <div>
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" autocomplete="email">
            <?php if (isset($errors['email'])): ?>
                <p style="color: red;"><?= $errors['email'] ?></p>
            <?php endif ?>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" autocomplete="password">
            <?php if (isset($errors['password'])): ?>
                <p style="color: red;"><?= $errors['password'] ?></p>
            <?php endif ?>
        </div>

        <?php if (! ($_SESSION['user'] ?? false)) : ?>  
            <div>
                <button type="submit">Log In</button>
            </div>
        <?php endif ?>
    </form>
</body>

</html>