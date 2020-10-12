<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>

<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <h3> Medicine Purchase Report</h3>
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
                                <th>Purchased Medicine Name</th>
                                <th>Purchased Medicine Type</th>
                                <th>Purchased Medicine Unit</th>
                                <th>Purchased Medicine Amount </th>
                                <th>Medicine Price</th>
                                <th>Purchased Date</th>
                                <th>Retailer Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $medicines = Medicine::find_all();
                            foreach ($medicines as $medicine) {
                                ?>
                                <tr class="tr-shadow">

                                    <td><?php echo $medicine->id ?></td>
                                    <td>
                                        <?php echo $medicine->med_name ?>
                                    </td>
                                    <td>
                                        <?php echo $medicine->med_type ?>
                                    </td>
                                    <td><?php echo $medicine->med_unit ?></td>
                                    <td>
                                        <?php echo $medicine->med_amount ?>
                                    </td>
                                    <td><?php echo $medicine->med_price ?></td>
                                    <td><?php echo $medicine->med_pdate ?></td>
                                    <td><?php echo $medicine->med_rname ?></td>
                                    <td>
                                        <div class="table-data-feature">

                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a class = "action" href="med_purchase_update.php?id=<?php echo $medicine->id?>"> <i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a class = "delete" data-confirm = "Are you want to delete this  item?" href="med_purchase_delete.php?id=<?php echo $medicine->id?>"><i class="zmdi zmdi-delete"></i></a>
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
