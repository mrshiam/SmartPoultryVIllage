<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/top_bar.php'; ?>
<?php include_once 'includes/nav_bar.php' ?>
<?php require_once('includes/init.php'); ?>
<?php require_login(); ?>

    <div class="container-fluid">
        <div class="row formRow">
            <div class="col-2"></div>
                <div class="col-8" style="height: 360px;">

                    <div class="table-responsive">
                        <table class="table">

                            <?php
                            $id = $session->user_id;
                            $users = User::find_by_id($id);
                            ?>
                            <thead>

                            <tr>
                                <th scope="col">Farm Name</th>
                                <th scope="col">User Full Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td><?php echo $users->farm_name ?></td>
                                <td><?php echo $users->full_name ?></td>
                                <td><?php echo $users->email_address ?></td>
                                <td><?php echo $users->phone_number ?></td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <a class = "action" href="user_details_update.php?id=<?php echo $users->id ?>"> <i class="icofont-ui-edit"></i></a>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>


<?php include_once 'includes/footer.php'; ?>