<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>

<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <h3> Chicken Purchase Report</h3>
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
                                <th>Purchase ID</th>
                                <th>Chicken Batch Name</th>
                                <th>Number of Chicken Purchased</th>
                                <th>Chicken Inventory</th>
                                <th>Chicken Total Price</th>
                                <th>Per Piece Chicken Price</th>
                                <th>Purchased Date</th>
                                <th>Retailer Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $chickens = Chicken::find_all();
                            foreach ($chickens as $chicken) {
                                ?>
                                <tr class="tr-shadow">

                                    <td><?php echo $chicken->id ?></td>
                                    <td>
                                        <?php echo $chicken->batch_name ?>
                                    </td>
                                    <td>
                                        <?php echo $chicken->chicken_number ?>
                                    </td>
                                    <td><?php echo $chicken->chicken_inventory ?></td>
                                    <td>
                                        <?php echo $chicken->chicken_price ?>
                                    </td>
                                    <td>
                                        <?php echo $chicken->per_price ?>
                                    </td>
                                    <td>
                                        <?php echo $chicken->purchase_date ?>
                                    </td>
                                    <td><?php echo $chicken->retailer_name ?></td>
                                    <td>
                                        <div class="table-data-feature">

                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a class = "action" href=""> <i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a class = "delete" data-confirm = "Are you want to delete this  item?" href=""><i class="zmdi zmdi-delete"></i></a>
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
            </div>
        </div>
    </div>
</div>


<?php include_once 'includes/dashboard/footer.php' ?>
