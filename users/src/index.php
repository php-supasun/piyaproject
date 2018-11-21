<?php     
    include 'connection.php';
    session_start();?>
<!DOCTYPE html>
<html>
    <head>        
        <meta charset="UTF-8">
        <title>ITSourceCode.Com</title>    
    </head>    
    <body>        
        <?php            
            if (!isset($_SESSION['username'])) : ?>
            <h5>Login</h5>        
            <form method="post" action="login-action.php">            
                <label>Username:</label><br>            
                <input type="text" name="username" /><br>            
                <label>Password:</label><br>            
                <input type="password" name="password" /><br>            
                <input type="submit" value="Login" name="login"/>       
            </form>Not a member yet? Click <a href="registration.php">here</a> to register.
            <?php elseif (isset($_SESSION['username'])) : ?>
                <form action="profile.php" method="POST">
                    <input type="hidden" name="user" value="<?php echo $_SESSION['username'] ?>">
                    <input type="submit" name="profile" value="View Profile">
                </form>
                |
                <a href="logout.php">Logout</a>            
        <?php endif; ?>
    </body>
</html> 