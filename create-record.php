<?php // Filename: create-record.php
// allows a new record to be created. Information goes through content.inc.php to check if all fields are set.
$pageTitle = "Create Record";
require_once 'inc/layout/header.inc.php'; 
?>
	<div class="jumbotron bg-info">
			<h1 class="font-weight-bold display-4 ">Create a New Record</h1>
	</div>
<div class="container">
	<div class="row mt-5">
		<div class="col-lg-12">
	
			<?php require_once __DIR__ .'/inc/create/content.inc.php'; ?>
			<?php require_once __DIR__ .'/inc/shared/form.inc.php' ?>
		</div>
		</div>
</div>

<?php require_once 'inc/layout/footer.inc.php'; ?>