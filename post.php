<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php'; 
 
$id = $_GET['id'];
$post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>
 
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $post['title']; ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        .post-container {
            background: white;
            padding: 20px;
            margin: 30px auto;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
 
        .post-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
 
        .post-meta {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }
 
        .post-content {
            font-size: 16px;
            line-height: 1.6;
            color: #444;
        }
 
        .comment-box, .comment {
            margin-top: 30px;
        }
 
        .comment {
            background: #f9f9f9;
            padding: 15px;
            border-left: 3px solid #007bff;
            margin-bottom: 10px;
            border-radius: 5px;
        }
 
        .comment strong {
            color: #333;
        }
 
        textarea, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
 
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
 
        button:hover {
            background: #0056b3;
        }
 
        a.back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
 
        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
 
<div class="post-container">
    <div class="post-title"><?php echo $post['title']; ?></div>
    <div class="post-meta">
        Category: <?php echo $post['category']; ?> | Published: <?php echo $post['created_at']; ?>
    </div>
    <div class="post-content">
        <?php echo nl2br($post['content']); ?>
    </div>
 
    <a class="back-link" href="index.php">← Back to Home</a>
 
    <!-- Comments Section -->
    <div class="comment-box">
        <h3>💬 Comments</h3>
        <?php
        $comments = $conn->query("SELECT * FROM comments WHERE post_id=$id ORDER BY created_at DESC");
        if ($comments->num_rows == 0) {
            echo "<p>No comments yet. Be the first to comment!</p>";
        } else {
            while($c = $comments->fetch_assoc()){
                echo "<div class='comment'><strong>".$c['user_name']."</strong>: ".$c['comment']."</div>";
            }
        }
        ?>
 
        <h3>✍️ Leave a Comment</h3>
        <form method="POST">
            <input type="text" name="user_name" placeholder="Your Name" required><br>
            <textarea name="comment" placeholder="Write your comment here..." rows="4" required></textarea><br>
            <button type="submit" name="add_comment">Post Comment</button>
        </form>
 
        <?php
        if(isset($_POST['add_comment'])){
            $name = $_POST['user_name'];
            $comment = $_POST['comment'];
            $conn->query("INSERT INTO comments (post_id, user_name, comment) VALUES ($id, '$name', '$comment')");
            header("Refresh:0"); // Reload page to show the new comment
        }
        ?>
    </div>
</div>
 
</body>
</html>
 
