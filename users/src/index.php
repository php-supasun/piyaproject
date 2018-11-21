<?php     
    include 'connection.php';
    session_start();
?>
    <?php include 'layouts/header.php'; ?>
    <body>
        <?php
            if (!isset($_SESSION['username'])) : ?>
            <form method="post" action="login-action.php" class="container">
                <div class="col-md-5" style="margin: 200px auto 0 auto;">
                    <h5>Login</h5>
                    <div class="form-group">
                        <label>Username:</label><br>
                        <input type="text" name="username" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Password:</label><br>
                        <input type="password" name="password" class="form-control"/><br>
                    </div>
                    <input type="submit" value="Login" name="login" class="btn btn-primary"/>
                    <br><br>
                    Not a member yet? Click
                    <a href="registration.php">here</a> to register.
                </div>
            </form>
            
            <?php elseif (isset($_SESSION['username'])) :
                header("location: profile.php?user=" . $_SESSION['username']); 
                endif;
            ?>
    </body>
</html>