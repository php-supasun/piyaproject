<?php     
    include 'connection.php';
    session_start();?>
<!DOCTYPE html>
<html>
    <head>        
        <meta charset="UTF-8">
        <title>ITSourceCode.Com</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            if (!isset($_SESSION['username'])) : ?>
            <form method="post" action="login-action.php" class="container">
                <div class="col-md-5" style="margin: 200px auto 0 auto;">
                    <h5>Login</h5>
                    <div class="form-group">
                        <label>Username:</label><br>
                        <input type="text" name="username" class="form-control"/><br>
                    </div>
                    <div class="form-group">
                        <label>Password:</label><br>
                        <input type="password" name="password" class="form-control"/><br>
                    </div>
                    <input type="submit" value="Login" name="login" class="btn btn-primary"/>
                    Not a member yet? Click
                    <a href="registration.php">here</a> to register.
                </div>
            </form>
            
            <?php elseif (isset($_SESSION['username'])) : ?>
                <!-- <form action="profile.php" method="POST">
                    <input type="hidden" name="user" value="<?php echo $_SESSION['username'] ?>">
                    <input type="submit" name="profile" value="View Profile">
                </form> -->
                <a href="profile.php?user=<?php echo $_SESSION['username'] ?>"><?php echo $_SESSION['username']; ?></a>
                |
                <a href="logout.php">Logout</a>
        <?php endif; ?>
    </body>
</html>