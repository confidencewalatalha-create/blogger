<?php
// Database credentials
$servername = "localhost";
$username = "ui7alfebhmgan";
$password = "zkkdt4wihpq5";
$dbname = "dbczhecosyd4oz";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
    // If accessed directly in the browser, show styled error
    if (basename($_SERVER["PHP_SELF"]) == "db.php") {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <title>Database Connection</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8d7da;
                    color: #721c24;
                    padding: 40px;
                    text-align: center;
                }
                .box {
                    max-width: 600px;
                    margin: auto;
                    background: #fff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    border: 2px solid #f5c6cb;
                }
                h1 {
                    font-size: 24px;
                    margin-bottom: 10px;
                }
                p {
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <div class='box'>
                <h1>❌ Database Connection Failed</h1>
                <p>" . $conn->connect_error . "</p>
            </div>
        </body>
        </html>";
    }
    // Stop execution if database not connected
    die();
} else {
    // If accessed directly in the browser, show styled success message
    if (basename($_SERVER["PHP_SELF"]) == "db.php") {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <title>Database Connection</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #d4edda;
                    color: #155724;
                    padding: 40px;
                    text-align: center;
                }
                .box {
                    max-width: 600px;
                    margin: auto;
                    background: #fff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    border: 2px solid #c3e6cb;
                }
                h1 {
                    font-size: 24px;
                    margin-bottom: 10px;
                }
                p {
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <div class='box'>
                <h1>✅ Database Connected Successfully</h1>
                <p>You can now perform queries using <code>\$conn</code>.</p>
            </div>
        </body>
        </html>";
    }
}
?>
 
