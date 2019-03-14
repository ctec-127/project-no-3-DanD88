<?php // Filename: search-records.php
// allows a search to be input and shows the result or a error message
$pageTitle = "Search Records";
require 'inc/layout/header.inc.php';
require 'inc/db/mysqli_connect.inc.php';
//require 'inc/functions/functions.inc.php';
require 'inc/app/config.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-4">

        <!-- enter data for new data fields
        #gpa
        #financial_aid
        #degree_program
        -->

        <?php 
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if(!empty($_POST['search'])){
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM $db_table WHERE " . '"' . $search . '"' . " IN (first_name, last_name, student_id, email, phone, degree_program) ORDER BY last_name ASC";
                    //$sql = "SELECT * FROM $db_table WHERE \"$search\"  IN (first_name, last_name, student_id, email, financial_aid, phone, degree_program)";
                    
                    // $sql = "SELECT * FROM" . " $db_table " . "WHERE (last_name LIKE \"%$search%\" OR first_name LIKE \"%$search%\" OR student_id LIKE \"%$search%\" OR gpa LIKE \"%$search%\")";
                    $result = $db->query($sql);
                    // var_dump($search);


                    if ($result->num_rows == 0) {
                        echo "<p class=\"display-4 mt-4 text-center\">No results found for \"<strong>{$_POST['search']}</strong>\"</p>";
                        echo '<img class="mx-auto d-block mt-4" src="img/frown.png" alt="A sad face">';
                        echo "<p class=\"display-4 mt-4 text-center\">Please try again.</p>";
                        // echo "<h2 class=\"mt-4\">There are currently no records to display for <strong>last names</strong> starting with <strong>$filter</strong></h2>";
                    } else {
                        echo "<h2 class=\"mt-4 text-center\">$result->num_rows record(s) found for \"" . $_POST['search'] . '"</h2>';
                        display_record_table($result);
                    }
                } else {
                    echo "<p class=\"display-4 mt-4 text-center\">I can't search if you don't give<br>me something to search for.</p>";
                    echo '<img class="mx-auto d-block mt-4" src="img/nosmile.png" alt="A face with no smile">';
                }
            }
        ?>
        </div>
    </div>
</div>

<?php require 'inc/layout/footer.inc.php';?>

