<?php
require_once('includes/init.php');

// Log out the admin
$session->logout();

redirect_to(url_for('index.php'));

?>
