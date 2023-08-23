<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4"> <!-- Reduced padding here -->
                            <h2 class="text-uppercase text-center mb-4">Create an account</h2>

                            <form>

                                <div class="form-outline mb-3"> <!-- Reduced margin here -->
                                    <input type="text" id="form3Example1cg" name="name" class="form-control form-control-lg" style="font-size: 14px;" />
                                    <label class="form-label" for="form3Example1cg">Your Name</label>
                                </div>

                                <div class="form-outline mb-3"> <!-- Reduced margin here -->
                                    <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" style="font-size: 14px;" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                </div>
                                <div class="form-outline mb-3"> <!-- Reduced margin here -->
                                    <input type="text" id="form3Example1cg" name="username" class="form-control form-control-lg" style="font-size: 14px;" />
                                    <label class="form-label" for="form3Example1cg">Username</label>
                                </div>


                                <div class="form-outline mb-3"> <!-- Reduced margin here -->
                                    <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" style="font-size: 14px;" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                </div>

                                <div class="form-outline mb-3"> <!-- Reduced margin here -->
                                    <input type="password" id="form3Example4cdg" name="password2" class="form-control form-control-lg" style="font-size: 14px;" />
                                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                </div>



                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" style="font-size: 14px;">Register</button>
                                </div>

                                <p class="text-center text-muted mt-4 mb-0">Have already an account? <a href="<?php echo base_url(); ?>users/login" class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo form_close(); ?>
<style>
    .gradient-custom-3 {
        /* fallback for old browsers */
        background: #84fab0;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
    }

    .gradient-custom-4 {
        /* fallback for old browsers */
        background: #84fab0;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }
</style>