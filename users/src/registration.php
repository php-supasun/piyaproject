<?php
    include 'connection.php';
?>
    <?php include 'layouts/header.php'; ?>
    <body style="background: #e0e0e0;">
        <form method="post" action="register-action.php" class="container">
            <div class="col-md-5" style="margin: 150px auto 0 auto;">
                <h1>Folder Locked</h1>
                <br><br>
                <div class="alert alert-danger" id="alert-error" role="alert"></div>

                <h5>Registration</h5>
                <div class="form-group">
                    <label>Username:</label><br>
                    <input type="text" name="username" class="form-control" autocomplete="off" autofocus/>
                    <small id="emailHelp" class="form-text text-muted">Username must contain at least 5 characters.</small>
                </div>

                <div class="form-group">
                    <label>Password:</label><br>
                    <input type="password" name="password" class="form-control"/>
                    <small id="emailHelp" class="form-text text-muted">Password must contain at least 8 characters.</small>
                </div>

                <div class="form-group">
                    <label>Confirm Password:</label><br>
                    <input type="password" name="confirmPassword" class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Full Name:</label><br>
                    <input type="text" name="name" class="form-control" autocomplete="off"/>
                </div>

                <input type="submit" value="Register" class="btn btn-warning form-control" style="font-weight: bold;"/>
                <br><br>
                Already a member? Click <a href="index.php">here</a> to login.
            </div>
        </form>

        <script>
            const alertMessage = document.querySelector('#alert-error');

            function alertError() {
                const urlParams = new URLSearchParams(window.location.search);
                const error = urlParams.get('error');
                if (error === 'empty') {
                    alertMessage.innerHTML = 'Please input information';
                    alertMessage.style.display = 'block';
                }
                else if (error === 'exist') {
                    alertMessage.innerHTML = 'This User Name Already Exists';
                    alertMessage.style.display = 'block';
                }
                else if (error === 'password') {
                    alertMessage.innerHTML = 'Password must contain at least 8 characters';
                    alertMessage.style.display = 'block';
                }
                else if (error === 'username') {
                    alertMessage.innerHTML = 'Username must contain at least 5 characters';
                    alertMessage.style.display = 'block';
                }
                else if (error === 'match') {
                    alertMessage.innerHTML = 'Password not matched!';
                    alertMessage.style.display = 'block';
                }
                else {
                    alertMessage.style.display = 'none';
                }
                console.log(error);
            }
            alertError();
        </script>
        <script src="js/script.js?v1"></script>
    </body>
</html>