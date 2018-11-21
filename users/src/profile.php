<?php    
    include 'connection.php';
    session_start();

    if (empty($_SESSION['username']) || $_SESSION['username'] !== $_GET['user']) {
        header("location: index.php");
        exit();
    }
    if (isset($_GET['user'])) {
        $user = $_GET['user'];
        $get_user = $mysqli->query("SELECT * FROM users WHERE username = '$user'");
        if ($get_user->num_rows == 1) {
            $profile_data = $get_user->fetch_assoc();
        }    
    }
?>
<!DOCTYPE html>
<html>
    <head>       
        <meta charset="UTF-8">   
        <title><?php echo $profile_data['username'] ?>’s Profile</title>
        <link rel="stylesheet" href="css/style.css">
    </head> 
    <body>
        <a href="index.php">Home</a>
        | <?php echo $profile_data['username'] ?>
        ’s Profile
        <h3>Personal Information |
            <form action="edit-profile.php" method="POST">
                <input type="hidden" name="user" value="<?php echo $profile_data['username'] ?>">
                <input type="submit" name="edit" value="Edit Profile">
            </form>
        </h3>
        <table id="profile">
            <tr>
                <th>Data</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?php echo $profile_data['full_name'] ?></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><?php echo $profile_data['age'] ?></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><?php echo $profile_data['gender'] ?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><?php echo $profile_data['address'] ?></td>
            </tr>
            <tr>
                <td>test:</td>
                <td><?php echo $profile_data['test'] ?></td>
            </tr>
            <tr>
                <td>image:</td>
                <td>
                    <?php if(!empty($profile_data['Image'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode( $profile_data['Image'] ) ?>" width="50%"/>
                    <?php endif; ?>
                </td>       
            </tr>
        </table>
    </body>
</html>