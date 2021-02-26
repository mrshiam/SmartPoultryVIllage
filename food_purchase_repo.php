<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>
<?php require_login(); ?>

    <div class="page-container">
        <?php if($session->is_logged_in()) {
            $id = $session->user_id
            ?>
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <?php $user = User::find_by_id($id)?>
                            <h4>
                                <i class="fa fa-university" aria-hidden="true" style="margin-right: 5px;"></i>Farm Name:   <?php echo $user->farm_name ?>
                            </h4>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="content">
                                        <a class="js-acc-btn" href="#"><?php echo $user->full_name ?></a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info">
                                            <h5 class="name">
                                                <a href="#"><?php echo $user->full_name ?></a>
                                            </h5>
                                            <span class="email"><?php echo $user->email_address ?></span>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="user_details.php?id=<?php echo $id ?>">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="logout.php">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        <?php } ?>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Food Purchase Detail Table</h3>
                            <?php echo display_session_message(); ?>
                            <?php

                            $current_page = $_GET['page'] ?? 1;
                            $per_page = 5;
                            $total_count = FoodPurchase::count_all();

                            $pagination = new Pagination($current_page, $per_page, $total_count);

                            $sql = "SELECT food_name,food_purchase_detail.id,food_amount,food_price,food_purchase_detail.food_unit_price,purchase_date,retailer_name FROM `food_purchase_detail` 
                                    INNER JOIN
                                    food_item ON food_item.id = food_purchase_detail.food_id ";
                            $sql .= "LIMIT {$per_page} ";
                            $sql .= "OFFSET {$pagination->offset()}";
                            $foods = Database::$database->query($sql);


                            ?>

                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                    <tr>
                                        <th>Food Name</th>
                                        <th>Purchased Food Amount</th>
                                        <th>Purchased Food Price</th>
                                        <th>Food Unit Price</th>
                                        <th>Purchased Date</th>
                                        <th>Retailer Name</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($foods as $food=>$value){
                                    ?>

                                    <tr class="tr-shadow">

                                        <td><?php echo $value['food_name'] ?></td>
                                        <td>
                                            <?php echo $value['food_amount'] ?>
                                        </td>
                                        <td><?php echo $value['food_price'] ?></td>
                                        <td><?php echo $value['food_unit_price'] ?></td>
                                        <td>
                                            <?php echo $value['purchase_date'] ?>
                                        </td>
                                        <td><?php echo $value['retailer_name'] ?></td>
                                        <td>
                                            <div class="table-data-feature">

                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <a class = "action" href="food_purchase_update.php?id=<?php echo $value['id']?>"> <i class="zmdi zmdi-edit"></i></a>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <a class = "delete" data-confirm = "Are you want to delete this  item?" href="food_purchase_delete.php?id=<?php echo $value['id']?>"><i class="zmdi zmdi-delete"></i></a>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <?php } ?>


                                    <script>
                                        var deleteLinks = document.querySelectorAll('.delete');

                                        for (var i = 0; i < deleteLinks.length; i++) {
                                            deleteLinks[i].addEventListener('click', function(event) {
                                                event.preventDefault();

                                                var choice = confirm(this.getAttribute('data-confirm'));

                                                if (choice) {
                                                    window.location.href = this.getAttribute('href');
                                                }
                                            });
                                        }


                                    </script>

                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->
                        <div class="text-center">
                            <button onclick="window.print();" class="btn btn-outline-primary"><i class="fas fa-print" style="margin-right: 5px;"></i>Print</button>
                        </div>
                        </div>
                    <?php
                    $url =('food_purchase_repo.php');
                    echo $pagination->page_links($url);
                    ?>
                </div>
            </div>
        </div>

    </div>


<?php include_once 'includes/dashboard/footer.php' ?>