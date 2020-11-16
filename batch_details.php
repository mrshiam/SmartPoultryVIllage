<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>

<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <h3> Chicken Batch Report</h3>
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

                                <th>Batch Name</th>
                                <th>Purchase Price</th>
                                <th>Food Cost</th>
                                <th>Medicine Cost</th>
                                <th>Transport Cost</th>
                                <th>Mortality</th>
                                <th>Total Expense</th>
                                <th>Total Income</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $current_page = $_GET['page'] ?? 1;
                            $per_page = 10;
                            $total_count = FoodPurchase::count_all();

                            $pagination = new Pagination($current_page, $per_page, $total_count);

                                $sql = "SELECT chicken_purchase.batch_name,q1.Sell,q2.Purchase,q3.FoodCost,q4.MedCost,q5.Mortality,q6.TransportCost,(q2.Purchase+q3.FoodCost+q4.MedCost+q6.TransportCost) AS 'TotalExpence' FROM chicken_purchase 
                                        LEFT JOIN 
                                        (SELECT batch_name,SUM(tamount_money) AS 'Sell' FROM `chicken_sale` GROUP BY batch_name) AS q1 
                                        ON q1.batch_name = chicken_purchase.batch_name
                                        LEFT JOIN 
                                        (SELECT batch_name,chicken_price AS 'Purchase' FROM chicken_purchase GROUP BY batch_name) AS q2
                                        ON q2.batch_name = chicken_purchase.batch_name
                                        LEFT JOIN
                                        (SELECT batch_name,SUM(food_unit_price*gfood_amount) AS 'FoodCost' FROM `food_given` INNER JOIN food_item ON food_given.food_id=food_item.id GROUP BY batch_name) AS q3
                                        ON q3.batch_name = chicken_purchase.batch_name
                                        LEFT JOIN
                                        (SELECT batch_name,SUM(med_unit_price*med_given_amount) AS 'MedCost' FROM med_given INNER JOIN med_item ON med_given.med_id=med_item.id GROUP BY batch_name) AS q4
                                        ON q4.batch_name = chicken_purchase.batch_name
                                        LEFT JOIN 
                                        (SELECT batch_name,SUM(chicken_number) AS 'Mortality' FROM chicken_mortality GROUP BY batch_name) AS q5
                                        ON q5.batch_name = chicken_purchase.batch_name
                                        LEFT JOIN
                                        (SELECT batch_name,SUM(transport_cost) AS 'TransportCost' FROM transpotation GROUP BY batch_name) AS q6
                                        ON q6.batch_name = chicken_purchase.batch_name
                                         ";
                                $sql .= "LIMIT {$per_page} ";
                                $sql .= "OFFSET {$pagination->offset()}";
                                $batch_details = Database::$database->query($sql);
                                foreach ($batch_details as $batch_detail=>$value){

                                ?>
                                <tr class="tr-shadow">

                                    <td>
                                        <?php echo $value['batch_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $value['Purchase'] ?>
                                    </td>
                                    <td><?php echo $value['FoodCost'] ?></td>
                                    <td><?php echo $value['MedCost'] ?></td>
                                    <td><?php echo $value['TransportCost'] ?></td>
                                    <td><?php echo $value['Mortality'] ?></td>
                                    <td><?php echo $value['TotalExpence'] ?></td>
                                    <td><?php echo $value['Sell'] ?></td>

                                </tr>
                                <tr class="spacer"></tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
                <?php
                $url =('batch_details.php');
                echo $pagination->page_links($url);
                ?>
            </div>
        </div>
    </div>
</div>


<?php include_once 'includes/dashboard/footer.php' ?>
