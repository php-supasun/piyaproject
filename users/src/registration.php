<?php
    include 'connection.php';
?>
    <?php include 'layouts/header.php'; ?>
    <body>
        <form method="post" action="register-action.php" class="container">
            <div class="col-md-5" style="margin: 200px auto 0 auto;">
                <h5>Registration</h5>
                <div class="form-group">
                    <label>Username:</label><br>
                    <input type="text" name="username" class="form-control" autocomplete="off"/>
                    <small id="emailHelp" class="form-text text-muted">Username must contain at least 5 characters.</small>
                </div>

                <div class="form-group">
                    <label>Password:</label><br>
                    <input type="password" name="password" class="form-control"/>
                    <small id="emailHelp" class="form-text text-muted">Password must contain at least 6 characters.</small>
                </div>

                <div class="form-group">
                    <label>Confirm Password:</label><br>
                    <input type="password" name="confirmPassword" class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Full Name:</label><br>
                    <input type="text" name="name" class="form-control" autocomplete="off"/>
                </div>

                <input type="submit" value="Register" class="btn btn-primary"/>
                Already a member? Click <a href="index.php">here</a> to login.
            </div>
        </form>
    <script src="js/script.js"></script>
    </body>
</html>