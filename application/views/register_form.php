<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Create an account</h2>

                        <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

                        <?php echo form_open('register/register_user'); ?>
                        <?php
                            if ($this->session->flashdata('error_message')) {
                                echo '<div id="flash-message" class="alert alert-danger" role="alert">' . $this->session->flashdata('error_message') . '</div>';
                            }
                            ?>
                        <script>
    // Automatically hide the flash message after 5 seconds (5000 milliseconds)
                            setTimeout(function() {
                                var flashMessage = document.getElementById('flash-message');
                                if (flashMessage) {
                                    flashMessage.style.display = 'none';
                                }
                            }, 5000);
                        </script>

                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" value="<?php echo set_value('username'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-block">Register</button>
                        </div>

                        <p class="text-center mt-3">Already have an account? <a href="<?php echo base_url(); ?>login">Login here</a></p>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>