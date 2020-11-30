<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_login(); ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('employee_salary_repo.php'));
}
$id = $_GET['id'];
$employee = Employee::find_by_id($id);
if($employee == false) {
    redirect_to(url_for('employee_salary_repo.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['employee'];
    $employee->merge_attributes($args);
    $result = $employee->save();

    if($result === true) {
        $session->message('Employee Salary Updated successfully.');
        redirect_to(url_for('employee_salary_repo.php'));

    } else {
        // show errors
    }

} else {

    // display the form

}

?>

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
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Employee Salary</h3>
                                    <?php echo display_errors($employee->errors); ?>
                                </div>
                                <hr>
                                <?php
                                if(!isset($employee)) {
                                    redirect_to(url_for('employee_salary_repo.php'));
                                }
                                ?>
                                <form action="employee_salary_update.php?id=<?php echo $id?>" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="employee_name" class="control-label mb-1">Name of The Employee</label>
                                        <input id="employee_name" name="employee[employee_name]" type="text" class="form-control" value="<?php echo $employee->employee_name ?>">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="employee_address" class="control-label mb-1">Employee Address</label>
                                        <input id="employee_address" name="employee[employee_address]" type="text" class="form-control" value="<?php echo $employee->employee_address ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_phone" class="control-label mb-1">Phone</label>
                                        <input id="employee_phone" name="employee[employee_phone]" type="tel" class="form-control" value="<?php echo $employee->employee_phone ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="salary_amount" class="control-label mb-1">Amount</label>
                                        <input id="salary_amount" name="employee[salary_amount]" type="tel" class="form-control" value="<?php echo $employee->salary_amount ?>" >
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="given_date" class="control-label mb-1">Date</label>
                                                <input id="given_date" name="employee[given_date]" type="date" class="form-control" value="<?php echo $employee->given_date ?>"placeholder="MM / YY" >
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Update Employee Salary</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'includes/dashboard/footer.php' ?>
