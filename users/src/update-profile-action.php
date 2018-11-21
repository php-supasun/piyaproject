<?php
    include 'connection.php';
    session_start();
    $target = "name/".basename($_FILES['image']['name']);

    if (isset($_POST['update_profile'])) {
        $id = htmlspecialchars($_POST['id']);
        $user = htmlspecialchars($_POST['username']);
        $fullname = htmlspecialchars($_POST['fullname']);
        $age = htmlspecialchars($_POST['age']);
        $gender = htmlspecialchars($_POST['gender']);
        $address = htmlspecialchars($_POST['address']);
        $test = htmlspecialchars($_POST['test']);

        $user_sql = "UPDATE users SET full_name = '$fullname', gender = '$gender', age = $age, address = '$address', test = '$test' WHERE username = '$user'";
        if (!empty($_FILES['image']['name'])) {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $imageName = $_FILES['image']['name'];
            $image_sql = "INSERT INTO images (user_id, image, image_name) VALUES ($id, '$image', '$imageName')";
            $update_image = $mysqli->query($image_sql);
        }

        $update_user = $mysqli->query($user_sql);
        if ($update_user) {
            header("location: profile.php?user=$user");
            exit();
        } else {
            echo $mysqli->error;
        }
    }