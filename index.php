<?php
include 'db.php';
$posts = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>My Blogger</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
 
        header {
            background: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
 
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }
 
        .post {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }
 
        .post h2 {
            margin-top: 0;
            color: #007bff;
        }
 
        .post p {
            color: #444;
        }
 
        .meta {
            font-size: 13px;
            color: #777;
            margin-bottom: 10px;
        }
 
        a.read-more {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
 
        a.read-more:hover {
            text-decoration: underline;
        }
 
        .create-btn {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 10px 20px;
            margin-bottom: 30px;
            text-decoration: none;
            border-radius: 5px;
        }
 
        .create-btn:hover {
            background: #218838;
        }
 
        .search-box {
            text-align: center;
            margin-bottom: 20px;
        }
 
        .search-box input[type="text"] {
            padding: 10px;
            width: 70%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
 
        .search-box button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            margin-left: 5px;
            cursor: pointer;
        }
 
        .search-box button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
 
<header>
    <h1>📝 My Blogger</h1>
    <p>Share your thoughts with the world</p>
</header>
 
<div class="container">
 
    <div class="search-box">
        <form method="GET">
            <input type="text" name="search" placeholder="Search blog posts..." value="<?php echo $_GET['search'] ?? ''; ?>">
            <button type="submit">Search</button>
        </form>
    </div>
 
    <a class="create-btn" href="create.php">➕ Create New Post</a>
 
    <?php
    // Search functionality
    if (isset($_GET['search'])) {
        $search = $conn->real_escape_string($_GET['search']);
        $posts = $conn->query("SELECT * FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%' ORDER BY created_at DESC");
    }
 
    if ($posts->num_rows == 0) {
        echo "<p>No blog posts found.</p>";
    } else {
        while ($post = $posts->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<h2>" . $post['title'] . "</h2>";
            echo "<div class='meta'>Category: " . $post['category'] . " | Published: " . $post['created_at'] . "</div>";
            echo "<p>" . substr(strip_tags($post['content']), 0, 180) . "...</p>";
            echo "<a class='read-more' href='post.php?id=" . $post['id'] . "'>Read More →</a>";
            echo "</div>";
        }
    }
    ?>
 
</div>
 
</body>
</html>
 
