<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>

<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <h3> Customer Details Table</h3>
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

                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Name Of Customer</th>
                                <th>Address of the Customer</th>
                                <th>Phone Number of Customer</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $current_page = $_GET['page'] ?? 1;
                            $per_page = 2;
                            $total_count = Customer::count_all();

                            $pagination = new Pagination($current_page, $per_page, $total_count);

                            $sql = "SELECT * FROM customer_details ";
                            $sql .= "LIMIT {$per_page} ";
                            $sql .= "OFFSET {$pagination->offset()}";
                            $customers = Database::$database->query($sql);
                            foreach ($customers as $customer=>$value) {
                                ?>
                                <tr class="tr-shadow">

                                    <td><?php echo $value['id'] ?></td>
                                    <td>
                                        <?php echo $value['customer_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $value['customer_address'] ?>
                                    </td>
                                    <td><?php echo $value['customer_phone'] ?></td>

                                    <td>
                                        <div class="table-data-feature">

                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a class = "action" href="customer_details_update.php?id=<?php echo $value['id']?>"> <i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a class = "delete" data-confirm = "Are you want to delete this  item?" href="customer_details_delete.php?id=<?php echo $value['id']?>"><i class="zmdi zmdi-delete"></i></a>
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
                $url =('customer_details_repo.php');
                echo $pagination->page_links($url);
                ?>
            </div>
        </div>
    </div>
</div>


<?php include_once 'includes/dashboard/footer.php' ?>
