<?php
    include 'connection.php';
    session_start();
    $error = '';
    if (isset($_POST['login'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        if (empty($username) || empty($password)) {
            header("location: index.php?error=empty");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $statement = $mysqli->query($sql);
            $row_count = $statement->num_rows;
            if ($row_count < 1) {
                header("location: index.php?error=username");
                exit();
            } else {
                if ($row = $statement->fetch_assoc()) {
                    $hashedPwdCheck = password_verify($password, $row["password"]);
                    if ($hashedPwdCheck == false) {
                        header("location: index.php?error=password");
                        exit();
                    } else {
                        $_SESSION['username'] = $row["username"];
                        header("location: profile.php?user=".$_SESSION['username']);
                        exit();
                    }
                }
            }
        }
    }