<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Create User</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">

    <style>
       
        .card-container {
            max-width: 400px;
        }
        .form-control-custom {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Create User</h1>
                        <div id="body">
                            <?php
                            if (isset($error)) {
                                echo '<p style="color:red;">' . $error . '</p>';
                            } else {
                                echo validation_errors();
                            }
                            ?>
                            <?php
                            $attributes = array('name' => 'form', 'id' => 'form', 'class' => 'form');
                            echo form_open($this->uri->uri_string(), $attributes);
                            ?>

                            <div class="form-group mb-4">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="male" <?php echo set_select('gender', 'male'); ?>>Male</option>
                                    <option value="female" <?php echo set_select('gender', 'female'); ?>>Female</option>
                                    <option value="other" <?php echo set_select('gender', 'other'); ?>>Other</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" value="<?php echo set_value('mobile'); ?>" required>
                            </div>

                            <div class="mb-4 d-flex justify-content-between align-items-center">
                                <input type="submit" name="submit" value="Submit" class="btn btn-success col-4" />
                                <a href="<?php echo base_url('usercontroller/index'); ?>" class="btn btn-primary col-4 ">Back to Users</a>
                            </div>

                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>