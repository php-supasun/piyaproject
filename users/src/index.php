<?php     
    include 'connection.php';
    session_start();
?>
    <?php include 'layouts/header.php'; ?>
    <body style="background: #e0e0e0;">
        <?php
            if (!isset($_SESSION['username'])) : ?>
            <form method="post" action="login-action.php" class="container">
                <div class="col-md-5" style="margin: 150px auto 0 auto;">
                    <h1>Folder Locked</h1>
                    <br><br>
                    <div class="alert alert-danger" id="alert-error" role="alert"></div>
                    <h5>Login</h5>
                    <div class="form-group">
                        <label>Username:</label><br>
                        <input type="text" name="username" class="form-control" autofocus/>
                    </div>
                    <div class="form-group">
                        <label>Password:</label><br>
                        <input type="password" name="password" class="form-control"/><br>
                    </div>
                    <input type="submit" value="Login" name="login" class="btn btn-warning form-control" style="font-weight: bold;"/>
                    <br><br>
                    Not a member yet? Click
                    <a href="registration.php">here</a> to register.
                </div>
            </form>
            
            <?php elseif (isset($_SESSION['username'])) :
                header("location: profile.php?user=" . $_SESSION['username']); 
                endif;
            ?>

        <script>
            const alertMessage = document.querySelector('#alert-error');

            function alertError() {
                const urlParams = new URLSearchParams(window.location.search);
                const error = urlParams.get('error');
                if (error === 'empty') {
                    alertMessage.innerHTML = 'Please input username and password';
                    alertMessage.style.display = 'block';
                }
                else if (error === 'username') {
                    alertMessage.innerHTML = 'Username incorrect!';
                    alertMessage.style.display = 'block';
                }
                else if (error === 'password') {
                    alertMessage.innerHTML = 'Password incorrect!';
                    alertMessage.style.display = 'block';
                }
                else {
                    alertMessage.style.display = 'none';
                }
                console.log(error);
            }
            alertError();
        </script>
    </body>
</html>