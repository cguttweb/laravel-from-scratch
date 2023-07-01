<!DOCTYPE html>

<title>My Blog App</title>
<link rel="stylesheet" href="app.css">

<body>
    <?php foreach ($posts as $post) : ?>
        <h1>
            <a href="/posts/<?= $post->slug; ?>"><?= $post-> title;?></a>
        </h1>
        <p><?= $post->excerpt ; ?></p>
    <?php endforeach; ?>
</body>