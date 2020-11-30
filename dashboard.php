
<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>
<?php require_login(); ?>



        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
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

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-money"></i>
                                            </div>
                                            <?php $sql = "SELECT (SELECT SUM(salary_amount) AS 'salary' FROM `employee_salary`)+(SELECT SUM(element_price) AS 'outex' FROM `other_expenses`)+(SELECT SUM(TotalExpence) AS 'chickex' FROM (SELECT chicken_purchase.batch_name,q1.Sell,q2.Purchase,q3.FoodCost,q4.MedCost,q5.Mortality,q6.TransportCost,(q2.Purchase+q3.FoodCost+q4.MedCost+q6.TransportCost) AS 'TotalExpence' FROM chicken_purchase 
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
                                                        ON q6.batch_name = chicken_purchase.batch_name) AS q1) AS 'TotalCost' FROM (SELECT SUM(salary_amount) AS 'salary' FROM `employee_salary`) AS q1, (SELECT SUM(element_price) AS 'outex' FROM `other_expenses`) AS q2,(SELECT SUM(TotalExpence) AS 'chickex' FROM (SELECT chicken_purchase.batch_name,q1.Sell,q2.Purchase,q3.FoodCost,q4.MedCost,q5.Mortality,q6.TransportCost,(q2.Purchase+q3.FoodCost+q4.MedCost+q6.TransportCost) AS 'TotalExpence' FROM chicken_purchase 
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
                                                        ON q6.batch_name = chicken_purchase.batch_name) AS q1) AS q3
                                                        ";
                                            $costs = Database::$database->query($sql);
                                            foreach ($costs as $cost=>$value){
                                            ?>
                                            <div class="text">
                                                <h2><?php echo $value['TotalCost']?>৳</h2>
                                                <?php } ?>
                                                <span>Total Cost</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <?php
                                            $sql = "SELECT SUM(tamount_money) AS 'income' FROM `chicken_sale`";
                                            $incomes = Database::$database->query($sql);
                                            foreach ($incomes as $income=>$value){
                                            ?>
                                            <div class="text">
                                                <h2><?php echo $value['income']  ?>৳</h2>
                                                <?php } ?>
                                                <span>Total Earnings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-gift"></i>
                                            </div>
                                            <?php
                                            $sql = "SELECT SUM(chicken_number) AS 'invent' FROM `chicken_purchase`";
                                            $inventorys = Database::$database->query($sql);
                                            foreach ($inventorys as $inventory=>$value){
                                            ?>
                                            <div class="text">
                                                <h2><?php echo $value['invent']  ?></h2>
                                                <?php } ?>
                                                <span>Total Chicken Number</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-dollar"></i>
                                            </div>
                                            <?php
                                            $sql = "SELECT (SELECT SUM(tamount_money) AS 'income' FROM `chicken_sale`)-( SELECT (SELECT SUM(salary_amount) AS 'salary' FROM `employee_salary`)+(SELECT SUM(element_price) AS 'outex' FROM `other_expenses`)+(SELECT SUM(TotalExpence) AS 'chickex' FROM (SELECT chicken_purchase.batch_name,q1.Sell,q2.Purchase,q3.FoodCost,q4.MedCost,q5.Mortality,q6.TransportCost,(q2.Purchase+q3.FoodCost+q4.MedCost+q6.TransportCost) AS 'TotalExpence' FROM chicken_purchase 
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
                                                        ON q6.batch_name = chicken_purchase.batch_name) AS q1) AS 'TotalCost' FROM (SELECT SUM(salary_amount) AS 'salary' FROM `employee_salary`) AS q1, (SELECT SUM(element_price) AS 'outex' FROM `other_expenses`) AS q2,(SELECT SUM(TotalExpence) AS 'chickex' FROM (SELECT chicken_purchase.batch_name,q1.Sell,q2.Purchase,q3.FoodCost,q4.MedCost,q5.Mortality,q6.TransportCost,(q2.Purchase+q3.FoodCost+q4.MedCost+q6.TransportCost) AS 'TotalExpence' FROM chicken_purchase 
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
                                                        ON q6.batch_name = chicken_purchase.batch_name) AS q1) AS q3) AS GrossProfit FROM (SELECT (SELECT SUM(salary_amount) AS 'salary' FROM `employee_salary`)+(SELECT SUM(element_price) AS 'outex' FROM `other_expenses`)+(SELECT SUM(TotalExpence) AS 'chickex' FROM (SELECT chicken_purchase.batch_name,q1.Sell,q2.Purchase,q3.FoodCost,q4.MedCost,q5.Mortality,q6.TransportCost,(q2.Purchase+q3.FoodCost+q4.MedCost+q6.TransportCost) AS 'TotalExpence' FROM chicken_purchase 
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
                                                        ON q6.batch_name = chicken_purchase.batch_name) AS q1) AS 'TotalCost' FROM (SELECT SUM(salary_amount) AS 'salary' FROM `employee_salary`) AS q1, (SELECT SUM(element_price) AS 'outex' FROM `other_expenses`) AS q2,(SELECT SUM(TotalExpence) AS 'chickex' FROM (SELECT chicken_purchase.batch_name,q1.Sell,q2.Purchase,q3.FoodCost,q4.MedCost,q5.Mortality,q6.TransportCost,(q2.Purchase+q3.FoodCost+q4.MedCost+q6.TransportCost) AS 'TotalExpence' FROM chicken_purchase 
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
                                                        ON q6.batch_name = chicken_purchase.batch_name) AS q1) AS q3) AS s1";
                                            $mortalitys = Database::$database->query($sql);
                                            foreach ($mortalitys as $mortality=>$value){
                                            ?>
                                            <div class="text">
                                                <h2><?php echo $value['GrossProfit']  ?></h2>
                                                <?php } ?>
                                                <span>Gross Profit</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">Chicken Inventory</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>Chicken Mortality</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>Total Chicken</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <?php $sql = "SELECT SUM(Mortal) AS 'Mortal',SUM(Chicken) AS 'Chicken' FROM (SELECT batch_name,SUM(chicken_inventory) AS 'Chicken' FROM `chicken_purchase` GROUP BY batch_name) AS q1 
                                                                    INNER JOIN (SELECT batch_name,SUM(chicken_number) AS 'Mortal' FROM `chicken_mortality` GROUP BY batch_name) AS q2
                                                                    ON q1.batch_name = q2.batch_name
                                                                    ";
                                                    $piecharts = Database::$database->query($sql);
                                                    foreach ($piecharts as $piechart=>$value){
                                                    ?>

                                                    <canvas id="percent-chart" data-optiona="<?php echo $value['Mortal'] ?>" data-optionb="<?php echo $value['Chicken'] ?>"></canvas>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Bar chart</h3>
                                        <?php
                                        $sql = "SELECT ChickenBuyingCost,ChickenSellingTotal,q1.Month FROM (SELECT SUM(chicken_price) AS 'ChickenBuyingCost', DATE_FORMAT(purchase_date, '%M') AS Month FROM chicken_purchase GROUP BY Month) AS q1 
                                                            INNER JOIN (SELECT SUM(tamount_money) AS 'ChickenSellingTotal', DATE_FORMAT(sale_date, '%M') AS Month FROM chicken_sale GROUP BY Month) AS q2 
                                                            ON q1.Month = q2.Month";
                                        $charts = Database::$database->query($sql);
                                        foreach ($charts as $chart=>$value){
                                        ?>
                                        <canvas id="barChart" data-optionx="<?php echo $value['ChickenBuyingCost'] ?>" data-optiony="<?php echo $value['ChickenSellingTotal'] ?>"data-optionz="<?php echo $value['Month'] ?>"></canvas>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 SmartPoultryVillage. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
<?php include_once 'includes/dashboard/footer.php' ?>

   