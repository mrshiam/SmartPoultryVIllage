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
                        <h3 class="title-5 m-b-35">Medicine Inventory Table</h3>
                        <?php echo display_session_message(); ?>

                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                            <tr>
                                <th>Medicine Name</th>
                                <th>Total Amount Of Medicine Purchased</th>
                                <th>Total Amount Of Medicine Given</th>
                                <th>Total Amount Of Medicine Left</th>
                                <th>Unit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $current_page = $_GET['page'] ?? 1;
                            $per_page = 5;
                            $sql = "SELECT COUNT(*) AS Count FROM (SELECT med_item.med_name,q1.MedPurchase,q2.MedGiven,(q1.MedPurchase-q2.MedGiven) AS 'TotalAmount',med_item.med_unit FROM `med_item`
                                    LEFT JOIN
                                    (SELECT med_id,SUM(med_amount) AS 'MedPurchase' FROM med_purchase GROUP BY med_id) AS q1
                                    ON q1.med_id = med_item.id
                                    LEFT JOIN
                                    (SELECT med_id,SUM(med_given_amount) AS 'MedGiven' FROM `med_given` GROUP BY med_id) AS q2
                                    ON q2.med_id = med_item.id) AS s1";
                            $total_amounts = Database::$database->query($sql);
                            foreach ($total_amounts as $total_amount=>$value) {
                                $total_count = $value['Count'];
                            }
                            $pagination = new Pagination($current_page, $per_page, $total_count);
                            $sql = "SELECT med_item.med_name,q1.MedPurchase,q2.MedGiven,(q1.MedPurchase-q2.MedGiven) AS 'TotalAmount',med_item.med_unit FROM `med_item`
                                    LEFT JOIN
                                    (SELECT med_id,SUM(med_amount) AS 'MedPurchase' FROM med_purchase GROUP BY med_id) AS q1
                                    ON q1.med_id = med_item.id
                                    LEFT JOIN
                                    (SELECT med_id,SUM(med_given_amount) AS 'MedGiven' FROM `med_given` GROUP BY med_id) AS q2
                                    ON q2.med_id = med_item.id
                                    ";
                            $sql .= "LIMIT {$per_page} ";
                            $sql .= "OFFSET {$pagination->offset()}";
                            $medinventorys = Database::$database->query($sql);
                            foreach ($medinventorys as $medinventory=>$value){
                                ?>

                                <tr class="tr-shadow">
                                    <td><?php echo $value['med_name'] ?></td>
                                    <td><?php echo $value['MedPurchase'] ?></td>
                                    <td><?php echo $value['MedGiven'] ?></td>
                                    <td><?php echo $value['TotalAmount'] ?></td>
                                    <td><?php echo $value['med_unit'] ?></td>
                                </tr>
                                <tr class="spacer"></tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    <div class="text-center">
                        <button onclick="window.print();" class="btn btn-outline-primary"><i class="fas fa-print" style="margin-right: 5px;"></i>Print</button>
                    </div>
                </div>
                <?php
                $url =('med_inventory.php');
                echo $pagination->page_links($url);
                ?>
            </div>
        </div>
    </div>
</div>


<?php include_once 'includes/dashboard/footer.php' ?>
