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

    $result = $med->delete();
    $session->message('The Medicine Item was deleted successfully.');
    redirect_to(url_for('med_item.php'));

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
                        <form action = 'food_item_delete.php?id=<?php echo $id?>' method="post" name="delete_form" novalidate="novalidate"></form>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function(){
            document.forms['delete_form'].submit();
        }

    </script>

<?php include_once 'includes/dashboard/footer.php' ?>