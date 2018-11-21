<?php
    include 'connection.php';

    if (isset($_POST['delete'])) {
        $username = $_POST['username'];
        $id = $_POST['id'];
        $sql = "DELETE FROM images WHERE id=$id";
        $statement = $mysqli->query($sql);

        header("location: profile.php?user=$username");
        exit();
    }
    else {
        header("location: index.php");
        exit();
    }