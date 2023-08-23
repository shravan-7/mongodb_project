<htm>

    <head>
        <title>User</title>
        <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">USER</a>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>">HOME
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>about">ABOUT</a>
                        </li>


                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>login">LOGIN</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>register">REGISTER</a></li>



                        <!-- <li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>users/logout">Logout</a></li> -->

                    </ul>



                </div>
            </div>
        </nav>
        <div class="container">
            <!-- flash messages -->
            <!-- <?php if ($this->session->flashdata('user_registered')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
        <?php endif; ?>



        <?php if ($this->session->flashdata('login_failed')) : ?>
            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('user_loggedin')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('user_loggedout')) : ?>
            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
        <?php endif; ?> -->