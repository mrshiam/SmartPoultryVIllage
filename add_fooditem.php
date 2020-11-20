<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php include_once 'includes/init.php' ?>


    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">

                    </div>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add Food Item</h3>

                                        <?php
                                        if(isset($errors) && (!$errors)) {

                                        }else{
                                            echo display_errors($errors);
                                        }
                                        ?>
                                    </div>

                                    <hr>
                                    <form action="food_input.php" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="food_name" class="control-label mb-1">Food Label Name</label>
                                            <input id="food_name" name="food[food_name]" type="text" class="form-control" value="">
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="food_unit_price" class="control-label mb-1">Food Unit Price</label>
                                                    <input id="food_unit_price" name="food[food_unit_price]" type="text" class="form-control" placeholder="tk" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="adding_date" class="control-label mb-1">Adding Date</label>
                                                    <input id="adding_date" name="food[adding_date]" type="date" class="form-control" value="" placeholder="MM / YY">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="add-button">Add Item</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'includes/dashboard/footer.php' ?>