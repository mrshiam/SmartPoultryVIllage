<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>


<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <h3>Medicine Inventory</h3>
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
                                <th>Medicine Name</th>
                                <th>Total Amount Of Medicine Purchased</th>
                                <th>Total Amount Of Medicine Given</th>
                                <th>Total Amount Of Medicine Left</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT med_item.med_name,q1.MedPurchase,q2.MedGiven,(q1.MedPurchase-q2.MedGiven) AS 'TotalAmount' FROM `med_item`
                                    LEFT JOIN
                                    (SELECT med_id,SUM(med_amount) AS 'MedPurchase' FROM med_purchase GROUP BY med_id) AS q1
                                    ON q1.med_id = med_item.id
                                    LEFT JOIN
                                    (SELECT med_id,SUM(med_given_amount) AS 'MedGiven' FROM `med_given` GROUP BY med_id) AS q2
                                    ON q2.med_id = med_item.id
                                    ";
                            $medinventorys = Database::$database->query($sql);
                            foreach ($medinventorys as $medinventory=>$value){
                                ?>

                                <tr class="tr-shadow">
                                    <td><?php echo $value['med_name'] ?></td>
                                    <td><?php echo $value['MedPurchase'] ?></td>
                                    <td><?php echo $value['MedGiven'] ?></td>
                                    <td><?php echo $value['TotalAmount'] ?></td>
                                </tr>
                                <tr class="spacer"></tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once 'includes/dashboard/footer.php' ?>
