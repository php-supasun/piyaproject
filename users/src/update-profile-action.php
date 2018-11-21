<?php
    include 'connection.php';
    session_start();
    $target = "name/".basename($_FILES['image']['name']);

    if (isset($_POST['update_profile'])) {
        $user = htmlspecialchars($_POST['username']);
        $fullname = htmlspecialchars($_POST['fullname']);
        $age = htmlspecialchars($_POST['age']);
        $gender = htmlspecialchars($_POST['gender']);
        $address = htmlspecialchars($_POST['address']);
        $test = htmlspecialchars($_POST['test']);

        if (empty($_FILES['images']['name'])) {
            $sql = "UPDATE users SET full_name = '$fullname', gender = '$gender', age = $age, address = '$address', test = '$test' WHERE username = '$user'";
        } else {
            $Image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE users SET full_name = '$fullname', gender = '$gender', age = $age, address = '$address', test = '$test', Image='$Image' WHERE username = '$user'";
        }

        $update_profile = $mysqli->query($sql);
        if ($update_profile) {
            header("location: profile.php?user=$user");
            exit();
        } else {
            echo $mysqli->error;
        }
    }