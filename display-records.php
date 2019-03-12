<?php // Filename: display-records.php

// displays the data for the students table.   

$pageTitle = "Record Management";
require 'inc/layout/header.inc.php'; 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        <?php require_once "inc/display/content.inc.php"; ?>
        </div>
    </div> <!-- end row -->
</div> <!-- end container -->
<?php require 'inc/layout/footer.inc.php'; ?>