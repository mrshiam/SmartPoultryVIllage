<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/top_bar.php'; ?>
<?php include_once 'includes/nav_bar.php' ?>
<section>
    <div class="row">
        <div class="col-lg-4"></div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header text-center img_card">
                        <img src="images/chicken.png" alt="">
                        <h3><u>Login Form</u></h3>
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" class="">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-success btn-sm">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="col-lg-4"></div>
    </div>
</section>






























<?php include_once 'includes/footer.php'; ?>
