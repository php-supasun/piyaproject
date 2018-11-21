<?php
    include 'connection.php';
    if (isset($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
        $name = htmlspecialchars($_POST['name']);

        if (empty($name) || empty($username) || empty($password)) {
            echo "<script>alert('Please insert data');location='registration.php'</script>";
            exit();
        } else {
            if ($password !== $confirmPassword) {
                echo "<script>alert('Password not matched');location='registration.php'</script>";
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE username='$username'";
                $statement = $mysqli->query($sql);
                $row_count = $statement->num_rows;
                if ($row_count > 0) {
                    echo "<script>alert('User already exist');location='registration.php'</script>";
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