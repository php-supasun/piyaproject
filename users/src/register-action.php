<?php
    include 'connection.php';
    if (isset($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
        $name = htmlspecialchars($_POST['name']);

        if (empty($name) || empty($username) || empty($password)) {
            header("location: registration.php?error=empty");
            exit();
        } else {
            if ($password !== $confirmPassword) {
                header("location: registration.php?error=match");
                exit();
            } else {
                if (strlen($password) < 8) {
                    header("location: registration.php?error=password");
                    exit();
                } else {
                    if (strlen($username) < 5) {
                        header("location: registration.php?error=username");
                        exit();
                    } else {
                        $sql = "SELECT * FROM users WHERE username='$username'";
                        $statement = $mysqli->query($sql);
                        $row_count = $statement->num_rows;
                        if ($row_count > 0) {
                            header("location: registration.php?error=exist");
                            exit();
                        } else {
                            $hash_password = password_hash($password, PASSWORD_DEFAULT);
                            $sql = "INSERT INTO users (username, password, full_name) VALUES ('$username', '$hash_password', '$name')";
                            $statement = $mysqli->query($sql);
                            header("location: index.php");
                            exit();
                        }
                    }
                }
            }
        }
    }