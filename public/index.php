<?php
include '../includes/config.php';
include '../includes/functions.php';

$articles = getArticles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to My Personal Blog</h1>
    <?php foreach ($articles as $article): ?>
        <h2><?php echo htmlspecialchars($article['title']); ?></h2>
        <p><?php echo htmlspecialchars($article['content']); ?></p>
        <p><em>Published on: <?php echo htmlspecialchars($article['date']); ?></em></p>
    <?php endforeach; ?>
</body>
</html>