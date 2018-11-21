<?php
    include 'connection.php';
    session_start();
    if (isset($_POST['login'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        if (empty($username) || empty($password)) {
            echo "<script>alert('Please insert data');location='index.php'</script>";
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $statement = $mysqli->query($sql);
            $row_count = $statement->num_rows;
            if ($row_count < 1) {
                echo "<script>alert('Invalid username');location='index.php'</script>";
                exit();
            } else {
                if ($row = $statement->fetch_assoc()) {
                    $hashedPwdCheck = password_verify($password, $row["password"]);
                    // $hashedPwd = md5($password);
                    if ($hashedPwdCheck == false) {
                        echo "<script>alert('Password is incorrect!');location='index.php'</script>";
                        exit();
                    } else {
                        $_SESSION['id'] = $row["user_id"];
                        $_SESSION['username'] = $row["username"];
                        setcookie('username', $row["username"], time() + (86400 * 30), "/");
                        header("location: index.php");
                        exit();
                    }
                }
            }
        }
    }