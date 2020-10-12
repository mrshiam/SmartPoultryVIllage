<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>


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
        $_SESSION['message'] = 'The Employee Salary was updated successfully.';

    } else {
        // show errors
    }

} else {

    // display the form

}

?>

<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">

                </div>
            </div>
        </div>
    </header>
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
                                </div>
                                <hr>
                                <?php
                                if(!isset($employee)) {
                                    redirect_to(url_for('employee_salary_repo.php'));
                                }
                                ?>
                                <form action="employee_salary_update.php?id=<?php echo $id?>" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Name of The Employee</label>
                                        <input id="cc-pament" name="employee[employee_name]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $employee->employee_name ?>">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Employee Address</label>
                                        <input id="cc-name" name="employee[employee_address]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter Employee Address"
                                               autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $employee->employee_address ?>">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Amount</label>
                                        <input id="cc-number" name="employee[salary_amount]" type="tel" class="form-control cc-number identified visa" value="<?php echo $employee->salary_amount ?>" data-val="true"
                                               data-val-required="Please enter Money Amount" data-val-cc-number="Transportation Coast"
                                               autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Date</label>
                                                <input id="cc-exp" name="employee[given_date]" type="date" class="form-control cc-exp" value="<?php echo $employee->given_date ?>" data-val="true" data-val-required="Please enter Date"
                                                       data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                       autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                            <span id="payment-button-amount">Update Employee Salary</span>
                                            <span id="payment-button-sending" style="display:none;">Submiting....</span>
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
