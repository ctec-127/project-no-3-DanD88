<?php // Filename: function.inc.php

// This page is the main backbone of displaying the database. This is where php and mysql come together with the info to create the table. 
//

function display_message(){
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo '<div class="mt-4 alert alert-success" role="alert">';
        echo $message;
        echo '</div>';
    }
}

// This function displays the letters across the top of the table.
// The purpose is to filter all students by a letter for last name.

function display_letter_filters($filter){  
    echo '<span class="mr-3">Filter by <strong>Last Name</strong></span>';

    $letters = range('A','Z');

    for($i=0 ; $i < count($letters) ; $i++){ 
        if ($filter == $letters[$i]) {
            $class = 'class="text-light font-weight-bold p-1 mr-3 bg-dark"';
        } else {
            $class = 'class="text-secondary p-1 mr-3 bg-light border rounded"';
        }
        echo "<u><a $class href='?filter=$letters[$i]' title='$letters[$i]'>$letters[$i]</a></u>";
    }
    echo '<a class="text-secondary p-2 mr-2 bg-success text-light border rounded" href="?clearfilter" title="Reset Filter">Reset</a>&nbsp;&nbsp;';
}

// add the new data fields for displaying records
// this is where the table and labels are generated. 

function display_record_table($result){
    echo '<div class="table-responsive">';
    echo "<table class=\"table table-striped table-hover table-sm mt-4\">";
    echo '<thead class="thead-dark"><tr><th>Actions</th><th><a href="?sortby=student_id">Student ID</a></th><th><a href="?sortby=first_name">First Name</a></th><th><a href="?sortby=last_name">Last Name</a></th><th><a href="?sortby=email">Email</a></th>
    <th><a href="?sortby=phone">Phone</a></th><th><a href="?sortby=gpa">GPA</a></th>
    <th><a href="?sortby=financial_aid">Financial Aid</a></th><th><a href="?sortby=degree_program">Degree Program</a></th><th><a href="?sortby=graduation_date">Graduation Date</a></th></tr></thead>';

    # $row will be an associative array containing one row of data at a time

    while ($row = $result->fetch_assoc()){
        # display rows and columns of data

        # add rows for new data

        # $row will be an associative array containing one row of data at a time

        // Starts each row from left to right based on the primary key "id". The beginning is echoing buttons for update and delete actions

        echo '<tr>';

        echo "<td><a href=\"update-record.php?id={$row['id']}\">Update</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"delete-record.php?id={$row['id']}\" onclick=\"return confirm('Are you sure?');\">Delete</a></td>";

        //echo "<td><a href=\"update-record.php?id={$row['id']}\" ;\">Update</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"delete-record.php?id={$row['id']}\" onclick=\"return confirm('Are you sure?');\">Delete</a></td>";
        // Pulls data from mysql data based to fill in the rows based on the id.
        echo "<td>{$row['student_id']}</td>";
        echo "<td><strong>{$row['first_name']}</strong></td>";
        echo "<td><strong>{$row['last_name']}</strong></td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "<td>{$row['gpa']}</td>";
        echo "<td>{$row['financial_aid']}</td>";
        echo "<td>{$row['degree_program']}</td>";
        echo "<td>{$row['graduation_date']}</td>";
        echo '</tr>';
    } // end while
    // closing table tag and div
    echo '</table>';
    echo '</div>';
}

// generates the message for the error bucket when filling out the form for create records.
// Works when a form selection is empty.
function display_error_bucket($error_bucket){
    echo '<p>The following errors were detected:</p>';
    echo '<div class="pt-4 alert alert-warning" role="alert">';
        echo '<ul>';
        foreach ($error_bucket as $text){
            echo '<li>' . $text . '</li>';
        }
        echo '</ul>';
    echo '</div>';
    echo '<p>All of these fields are required. Please fill them in.</p>';
}
//function for highlighting which link has been selected.
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'active';
}
// The end of the heart of the site. 
