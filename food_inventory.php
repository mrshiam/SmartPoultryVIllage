<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>


<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <h3> Food Inventory</h3>
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
                                <th>Food Name</th>
                                <th>Total Amount Of Food Purchased</th>
                                <th>Total Amount Of Food Given</th>
                                <th>Total Amount Of Food Left</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT food_item.food_name,q1.TotalFood,q2.GivenFood,(q1.TotalFood-q2.GivenFood) AS 'TotalAmount' FROM food_item 
                                LEFT JOIN 
                                (SELECT food_id,SUM(food_amount) AS 'TotalFood' FROM `food_purchase_detail` GROUP BY food_id) AS q1
                                ON q1.food_id = food_item.id
                                LEFT JOIN
                                (SELECT food_id,SUM(gfood_amount) AS 'GivenFood' FROM `food_given` GROUP BY food_id) AS q2
                                ON q2.food_id = food_item.id";
                                $foodinventorys = Database::$database->query($sql);
                                foreach ($foodinventorys as $foodinventory=>$value){
                            ?>

                                <tr class="tr-shadow">
                                    <td><?php echo $value['food_name'] ?></td>
                                    <td><?php echo $value['TotalFood'] ?></td>
                                    <td><?php echo $value['GivenFood'] ?></td>
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
