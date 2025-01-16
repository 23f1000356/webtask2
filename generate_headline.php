<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect if the user is not logged in
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_id = $_POST['article_id'];
    $article_text = $_POST['article_text']; // You can use an NLP model to generate the headline

    // Simple headline generation logic (this is just an example, you should use actual logic)
    $headline = "Breaking News: " . substr($article_text, 0, 50) . "...";

    // Insert the generated headline into the database
    $sql = "INSERT INTO headlines (article_id, headline) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$article_id, $headline]);

    echo "Headline generated: " . $headline;
}
?>

<!-- Headline generation form HTML -->
<form method="POST">
    <input type="hidden" name="article_id" value="1"> <!-- Example article ID -->
    <textarea name="article_text" placeholder="Enter your article here..." required></textarea><br>
    <button type="submit">Generate Headline</button>
</form>
