<?php
    $usernamelg = $POST('username');
    $passwordlg = $POST('password');

   

   $createTable = "CREATE TABLE User (
       id BIGINT NOT NULL,
       username varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
       name VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
       auth_key VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
       status tinyint(1) NOT NULL DEFAULT '1',
       pswdFailedAttempts int DEFAULT NULL,
  password_text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  password_hash varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  password_reset_toke varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  email varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  verification_token varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  createdUser varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  updatedUser varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  createdTime datetime NOT NULL,
  updatedTime datetime NOT NULL
   )";

   $dbQueryForLogin = "SELECT password_text,username 
                        FROM User 
                        WHERE username = usernamelg";
    
    $dbQueryForList = "SELECT id,name,username,email
                        FROM User
                        WHERE verification_token = token";

    $servername = "localhost";
    $username = "username";
    $password = "password";

// Create connection
    $conn = mysqli_connect($servername, $username, $password);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// Create database
$createDB = "CREATE DATABASE Exam";
        if (mysqli_query($conn, $createDB)) {
            echo "Database created successfully";
            if (mysqli_query($conn, $createTable)) {
                echo "Table User created successfully";
                    if($row['username'] == $usernamelg && $row['password'] ==$passwordlg){
                        echo "Login Success!"
                    } else {
                        echo "Login Failed!"
                    }
              } else {
                echo "Error creating table: " . mysqli_error($conn);
              }
        } else {
            echo "Error creating database: " . mysqli_error($conn);
        }

        mysqli_close($conn);
?>