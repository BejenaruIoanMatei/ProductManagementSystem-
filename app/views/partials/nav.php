<nav>
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <?php if(($_SESSION['user'] ?? false) and ($_SERVER['REQUEST_URI'] !== '/products/create')) : ?>
            <li>
                <a href="/products/create">Create</a>
            </li>
        <?php endif ?>
        <?php if (! ($_SESSION['user'] ?? false)) : ?>
            <li>
                <a href="/login/">Log In</a>
            </li>
        <?php endif ?>
    </ul>
</nav>