<?php    
    include 'connection.php';
    session_start();

    // if (empty($_SESSION['username'])) {
    //     header("location: index.php");
    //     exit();
    // }
    if (isset($_POST['edit'])) {        
        $user = $_POST['user'];        
        $get_user = $mysqli->query("SELECT * FROM users WHERE username = '$user'");       
        $user_data = $get_user->fetch_assoc();    
    } else { 
        header("Location: index.php");
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title><?php echo $user_data['username'] ?>’s Profile Settings</title>    
    </head>
    <body>        
        <a href="index.php">Home</a>

        <form action="profile.php" method="POST">
            <input type="hidden" name="user" value="<?php echo $user_data['username'] ?>">
            <input type="submit" name="profile" value="Back to Profile">
        </form>
     
        <h3>Update Profile Information</h3>        
        <form method="POST" action="update-profile-action.php" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?php echo $user_data['username']; ?>">
            <label>Name:</label><br>            
            <input type="text" name="fullname" value="<?php echo $user_data['full_name'] ?>" /><br>
            <label>Age:</label><br>            
            <input type="text" name="age" value="<?php echo $user_data['age'] ?>" /><br>          
            <label>Gender:</label><br>            
            <input type="text" name="gender" value="<?php echo $user_data['gender'] ?>" /><br>            
            <label>Address:</label><br>            
            <input type="text" name="address" value="<?php echo $user_data['address'] ?>" /><br><br>
            <label>test:</label><br>            
            <input type="text" name="test" value="<?php echo $user_data['test'] ?>" /><br><br>
            <label>Image:</label><br> 
            <input type="file" name="image" id="fileToUpload"><br><br>

            <input type="submit" name="update_profile" value="Update Profile" />        
        </form>    
    </body>
</html> 