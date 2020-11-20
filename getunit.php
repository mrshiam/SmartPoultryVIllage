<?php

require_once('includes/init.php');
$u = intval($_GET['u']);
$sql = "SELECT med_unit FROM med_item WHERE id='$u'";
$med_units = Database::$database->query($sql);
foreach ($med_units as $med_unit=>$value){

?>
<label for="select" class=" form-control-label">Type Unit</label>
    <input id="med_unit" name="med[med_unit]"  class="form-control cc-number identified visa"  value="<?php echo $value['med_unit']?>" readonly>
<?php }
?>