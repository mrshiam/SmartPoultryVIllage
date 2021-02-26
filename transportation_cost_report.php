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
                            <h3 class="title-5 m-b-35">Transportation Cost Report Table</h3>
                            <?php echo display_session_message(); ?>

                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                <tr>
                                    <th>Trasnportation ID</th>
                                    <th>Trasnport Name</th>
                                    <th>Batch Name</th>
                                    <th>Transport Fare</th>
                                    <th>Transport Used Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $current_page = $_GET['page'] ?? 1;
                                $per_page = 5;
                                $total_count = Transportation::count_all();

                                $pagination = new Pagination($current_page, $per_page, $total_count);
                                $sql = "SELECT * FROM transpotation ";
                                $sql .= "LIMIT {$per_page} ";
                                $sql .= "OFFSET {$pagination->offset()}";
                                $transports = Database::$database->query($sql);
                                foreach ($transports as $transport=>$value) {
                                    ?>
                                    <tr class="tr-shadow">

                                        <td><?php echo $value['id'] ?></td>
                                        <td>
                                            <?php echo $value['transport_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $value['batch_name'] ?>
                                        </td>
                                        <td><?php echo $value['transport_cost'] ?></td>
                                        <td>
                                            <?php echo $value['used_date'] ?>
                                        </td>

                                        <td>
                                            <div class="table-data-feature">

                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <a class = "action" href="transport_cost_update.php?id=<?php echo $value['id']?>"> <i class="zmdi zmdi-edit"></i></a>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <a class = "delete" data-confirm = "Are you want to delete this  item?" href="transport_cost_delete.php?id=<?php echo $value['id']?>"><i class="zmdi zmdi-delete"></i></a>
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
                    $url =('transportation_cost_report.php');
                    echo $pagination->page_links($url);
                    ?>
                </div>
            </div>
        </div>
    </div>


<?php include_once 'includes/dashboard/footer.php' ?>