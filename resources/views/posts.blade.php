<!DOCTYPE html>

<title>My Blog App</title>
<link rel="stylesheet" href="app.css">

<body>
    <?php foreach ($posts as $post) : ?>
        <?= $post; ?>
    <?php endforeach; ?>
</body>