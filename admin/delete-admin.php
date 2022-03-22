<?php 

require_once('../utilities/functions.php');

 
$admin_id = $_GET['id'];


deleteAdmin($admin_id);

$_SESSION['delete'] = "<div class='alert-s'>Admin wurde erfolgreich gelöscht</div>";;

header("Location:".SITEURL.'/admin/manage-admin.php');