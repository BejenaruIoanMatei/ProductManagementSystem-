<?php require base_path('app/views/partials/head.html') ?>


<body>
    <?php require base_path('app/views/partials/nav.php') ?>
    <?php require base_path('app/views/partials/banner.php') ?>

    <div class="product-show">
        <?php foreach ($product as $fields): ?>
            <div class="product-card">
                <img src="/<?= htmlspecialchars($fields['image']) ?>" alt="<?= htmlspecialchars($fields['name']) ?>">

                <div class="product-details">
                    <h1><?= htmlspecialchars($fields['name']) ?></h1>

                    <?php foreach ($fields as $key => $value): ?>
                        <?php if (in_array($key, ['id', 'name', 'image']))
                            continue; ?>
                        <p><strong><?= htmlspecialchars(ucfirst($key)) ?>:</strong> <?= htmlspecialchars($value) ?></p>
                    <?php endforeach; ?>

                    <div class="actions">
                        <a href="/" class="back-btn">Back</a>
                        <a href="product/edit?id=<?= $fields['id'] ?>" class="edit-btn">Edit</a>

                        <form action="/product" method="POST" class="delete-form">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($fields['id']) ?>">
                            <button class="delete-btn">Delete</button>
                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action is permanent",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>


</body>

</html>
