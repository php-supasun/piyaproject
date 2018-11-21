<?php    
include 'connection.php';    
$target = "name/".basename($_FILES['image']['name']);  



if (isset($_POST['update_profile'])) {     
    
    $user = $_GET['user'];        
    $fullname = $_POST['fullname'];        
    $age = $_POST['age'];        
    $gender = $_POST['gender'];        
    $address = $_POST['address'];
    $test = $_POST['test'];
    $Image = addslashes(file_get_contents($_FILES['image']['tmp_name']));            
    $update_profile = $mysqli->query("UPDATE users SET full_name = '$fullname', gender = '$gender', age = $age, address = '$address', test = '$test', Image='$Image' WHERE username = '$user'");        
    if ($update_profile) {            
        header("Location: profile.php?user=$user");        
    } else {            
        echo $mysqli->error;
    }    }?>