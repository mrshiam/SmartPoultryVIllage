<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>

    <div class="page-container">
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <h3> Purchase Report</h3>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">data table</h3>
                            <?php

                            $current_page = $_GET['page'] ?? 1;
                            $per_page = 2;
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