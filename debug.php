<?php
// Start of the HTML structure
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Debug Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 40px;
            margin: 0;
        }
 
        .debug-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
 
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
 
        .status {
            padding: 15px;
            font-size: 18px;
            border-radius: 6px;
            margin-top: 15px;
        }
 
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
 
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class='debug-container'>
        <h1>✅ Step 1: PHP is working</h1>";
 
        // Database connection
        $servername = "localhost";
        $username = "ui7alfebhmgan";
        $password = "zkkdt4wihpq5";
        $dbname = "dbczhecosyd4oz";
 
        try {
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                echo "<div class='status error'>❌ Database Connection Failed: " . $conn->connect_error . "</div>";
            } else {
                echo "<div class='status success'>✅ Connected to database successfully!</div>";
            }
        } catch (Exception $e) {
            echo "<div class='status error'>❌ Error: " . $e->getMessage() . "</div>";
        }
 
echo "  </div>
</body>
</html>";
?>
