<!DOCTYPE html>

<title>My Blog App</title>
<link rel="stylesheet" href="app.css">

<body>
   <h1><?= $post->title; ?></h1>
   <p><?= $post->body; ?></p>

   <a href="/">Go Back</a>
</body>