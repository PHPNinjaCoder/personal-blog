<?php
session_start();
include '../includes/config.php';
include '../includes/functions.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$articles = getArticles();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        deleteArticle($_POST['filename']);
        header('Location: dashboard.php');
        exit;
    } elseif (isset($_POST['add'])) {
        saveArticle([
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'date' => date('Y-m-d')
        ]);
        header('Location: dashboard.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>Add Article</h2>
    <form method="POST">
        <input type="text" name="title" required placeholder="Title">
        <textarea name="content" required placeholder="Content"></textarea>
        <button type="submit" name="add">Add Article</button>
    </form>

    <h2>Existing Articles</h2>
    <ul>
        <?php foreach ($articles as $filename => $article): ?>
            <li>
                <?php echo htmlspecialchars($article['title']); ?>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="filename" value="<?php echo basename($filename); ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>