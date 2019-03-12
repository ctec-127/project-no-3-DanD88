<?php // Filename: update-record.php
// allows a new record to be created. Information goes through content.inc.php to check if all fields are set.
$pageTitle = "Update Record";
require 'inc/layout/header.inc.php'; 
?>

<div class="container">
	<div class="row mt-5">
		<div class="col-lg-12">
			<h1>Update a Record</h1>
			<?php require __DIR__ .'/inc/create/content.inc.php'; ?>
			<?php require __DIR__ .'/inc/create/form.inc.php'; ?>
		</div>
    </div>
</div>

 

	// $first_name = "";
	// $last_name = "";

	<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM db_table WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$first = $n['first_name'];
			$last = $n['last_name'];
			$id = $n['student_id'];
			$phone = $n['phone'];
			$email = $n['email'];
			$financial_aid = $n['financial_aid'];
			$degree_program = $n['degree_program']; 
		}
	}
?>



	<!-- if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$result = $db->query("SELECT * FROM db_table WHERE id= $id");

		 // Add data for error bucket
		 
			$sql = "INSERT INTO $db_table (first_name,last_name,student_id,email,phone,gpa,financial_aid,degree_program) ";
			//$sql .= "VALUES ('$first','$last',$id,'$email','$phone','$gpa','$financial_aid','$degree_program')";

			//  $sql = "SELECT * FROM $db_table WHERE " . '"' . $id . '"' . " IN (first_name, last_name, student_id, email, phone, degree_program)";
			// // comment in for debug of SQL
			 //echo $sql;

		 }
	
?> -->

<?php require 'inc/layout/footer.inc.php'; ?>