<?php
function getArticles() {
    $files = glob(ARTICLES_DIR . '*.json');
    $articles = [];
    foreach ($files as $file) {
        $articles[] = json_decode(file_get_contents($file), true);
    }
    return $articles;
}

function saveArticle($data) {
    $filename = ARTICLES_DIR . uniqid() . '.json';
    file_put_contents($filename, json_encode($data));
}

function deleteArticle($filename) {
    unlink(ARTICLES_DIR . $filename);
}

function authenticate($username, $password) {
    return $username === ADMIN_USERNAME && $password === ADMIN_PASSWORD;
}
?>