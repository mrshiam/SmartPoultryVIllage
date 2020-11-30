<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_login(); ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('med_item.php'));
}
$id = $_GET['id'];
$med = Medicine::find_by_id($id);
if($med == false) {
    redirect_to(url_for('med_item.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['med'];
    $med->merge_attributes($args);
    $result = $med->save();

    if($result === true) {
        $session->message('Medicine Item Updated successfully.');
        redirect_to(url_for('med_item.php'));

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
                            <div class="card-header">Add Item</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Medicine Item</h3>
                                    <?php echo display_errors($med->errors); ?>
                                </div>
                                <hr>
                                <?php
                                if(!isset($med)) {
                                    redirect_to(url_for('med_item.php'));
                                }
                                ?>
                                <form action="med_item_update.php?id=<?php echo $id?>" method="post" novalidate="novalidate">
                                    <div class = row >
                                        <div class = col-6 >
                                            <div class="form-group">
                                                <label for="med_name" class="control-label mb-1">Medicine Name</label>
                                                <input id="med_name" name="med[med_name]" type="text" class="form-control"  value="<?php echo $med->med_name ?>">
                                            </div>
                                        </div>
                                        <div class = col-6 >
                                            <div class="form-group">
                                                <label for="select" class=" form-control-label">Select Med Type</label>
                                                <select name="med[med_type]" id="med_type_selection" onchange="changeValue()" class="form-control">
                                                    <option value="">Please select</option>
                                                    <option value="<?php echo $med->med_type ?>" if(med_type.value ==<?php echo $med->med_type ?>) <?php echo 'selected="selected"'?>><?php echo $med->med_type ?></option>
                                                    <option value="Powder">Powder</option>
                                                    <option value="Liquid">Liquid</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = row >
                                        <div class = col-6 >
                                            <div class="form-group">
                                                <label for="select" class=" form-control-label">Type Unit</label>
                                                <input id="med_unit" name="med[med_unit]"  class="form-control"  value="<?php echo $med->med_unit ?>">
                                            </div>
                                        </div>
                                        <div class = col-6 >
                                            <div class="form-group">
                                                <label for="select" class=" form-control-label">Medicine Unit Price</label>
                                                <input id="med_unit" name="med[med_unit_price]"  class="form-control"  value="<?php echo $med->med_unit_price ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Adding Date</label>
                                                <input id="cc-exp" name="med[adding_date]" type="date" class="form-control " value="<?php echo $med->adding_date ?>"
                                                        placeholder="MM / YY">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Submit</span>

                                        </button>
                                    </div>
                                </form>
                                <script>
                                    function changeValue() {
                                        var u = document.getElementById("med_type_selection");
                                        var u_value = u.options[u.selectedIndex].value;
                                        if(u_value == ""){
                                            document.getElementById('med_unit').value = ''
                                        }
                                        if(u_value == "Powder" ){
                                            document.getElementById('med_unit').value = 'kg'}
                                        if(u_value == "Liquid"){
                                            document.getElementById('med_unit').value = 'lit'
                                        }

                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/dashboard/footer.php' ?>
