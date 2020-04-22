<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    header("Location: transportation_cost_report.php");
}
$id = $_GET['id'];
$transport = Transportation::find_by_id($id);
if($transport == false) {
    header("Location: transportation_cost_report.php");
}

if(is_post_request()) {

    // Delete bicycle
    $result = $transport->delete();
    $_SESSION['message'] = 'The bicycle was deleted successfully.';
    header("Location: transportation_cost_report.php");

} else {
    // Display form
}

?>

    ?>


    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form action = 'transport_cost_delete.php?id=<?php echo $id?>' method="post" name="delete_form" novalidate="novalidate"></form>
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