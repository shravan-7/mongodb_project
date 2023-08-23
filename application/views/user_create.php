<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <!-- Include the Flatly Bootswatch CSS -->
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/flatly/bootstrap.min.css">

    <style>
        /* Center content vertically and horizontally */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div id="container">
        <h1 class="text-center">Create User</h1>

        <div id="body" style="max-width: 300px;">
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

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select" required>
                    <option value="male" <?php echo set_select('gender', 'male'); ?>>Male</option>
                    <option value="female" <?php echo set_select('gender', 'female'); ?>>Female</option>
                    <option value="other" <?php echo set_select('gender', 'other'); ?>>Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="text" name="mobile" class="form-control" value="<?php echo set_value('mobile'); ?>" required>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <input type="submit" name="submit" value="Submit" class="btn btn-success" style="margin-right: 10px;" />
                <a href="/usercontroller" class="btn btn-primary">Back to Users</a>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</body>

</html>