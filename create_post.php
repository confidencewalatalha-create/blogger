<?php
include 'db.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST["title"]);
    $content = $conn->real_escape_string($_POST["content"]);
    $category = $conn->real_escape_string($_POST["category"]);
    $author = "Admin"; // Change if you have login system
 
    $sql = "INSERT INTO posts (title, content, category, author, created_at)
            VALUES ('$title', '$content', '$category', '$author', NOW())";
 
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Post published successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Blog Post</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 40px;
        }
 
        .container {
            background: #fff;
            max-width: 700px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
 
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
 
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
 
        textarea {
            height: 200px;
            resize: vertical;
        }
 
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            margin: auto;
        }
 
        button:hover {
            background-color: #45a049;
        }
 
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #555;
        }
 
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
 
<div class="container">
    <h2>📝 Create a New Blog Post</h2>
 
    <form method="post" action="">
        <label for="title">Post Title:</label>
        <input type="text" name="title" id="title" required>
 
        <label for="content">Post Content:</label>
        <textarea name="content" id="content" required></textarea>
 
        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="">-- Select Category --</option>
            <option value="Technology">Technology</option>
            <option value="Lifestyle">Lifestyle</option>
            <option value="Business">Business</option>
            <option value="Travel">Travel</option>
        </select>
 
        <button type="submit">Publish Post</button>
    </form>
 
    <a class="back-link" href="index.php">← Back to Home</a>
</div>
 
</body>
</html>
