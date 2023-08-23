<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Login</h2>

                        <?php echo validation_errors(); ?>

                        <?php echo form_open('login/login_user'); ?>

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" value="<?php echo set_value('username'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </div>

                        <p class="text-center mt-3">Don't have an account? <a href="<?php echo base_url(); ?>register">Sign up here</a></p>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>