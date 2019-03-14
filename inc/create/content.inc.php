<?php // Filename: connect.inc.php
require __DIR__ . "/../db/mysqli_connect.inc.php";
require __DIR__ . "/../app/config.inc.php";
$error_bucket = [];
    // if not selected then the value of the buttons is empty++
    $yes = '';
    $no = '';
    // $financial_aid = '';
    // $db_val = '';
    $db_value = 0;
// http://php.net/manual/en/mysqli.real-escape-string.php
if($_SERVER['REQUEST_METHOD']=="POST"){
    // First insure that all required fields are filled in
    if (empty($_POST['first'])) {
        array_push($error_bucket,"<p>A first name is required.</p>");
    } else {
        # New way
        $first = $db->real_escape_string(strip_tags($_POST['first']));
    }
    if (empty($_POST['last'])) {
        array_push($error_bucket,"<p>A last name is required.</p>");
    } else {
        #$last = $_POST['last'];
        $last = $db->real_escape_string(strip_tags($_POST['last']));
    }
    if (empty($_POST['sid'])) {
        array_push($error_bucket,"<p>A student ID is required.</p>");
    } else {
        #$id = $_POST['id'];
        $sid = $db->real_escape_string(strip_tags($_POST['sid']));
    }
    if (empty($_POST['email'])) {
        array_push($error_bucket,"<p>An email address is required.</p>");
    } else {
        #$email = $_POST['email'];
        $email = $db->real_escape_string(strip_tags($_POST['email']));
    }
    if (empty($_POST['phone'])) {
        array_push($error_bucket,"<p>A phone number is required.</p>");
    } else {
        #$phone = $_POST['phone'];
        $phone = $db->real_escape_string(strip_tags($_POST['phone']));
    }
    // new code
    if (empty($_POST['gpa'])) {
        array_push($error_bucket,"<p>GPA is required.</p>");
    } else {
        #$gpa = $_POST['gpa'];
        $gpa = $db->real_escape_string(strip_tags($_POST['gpa']));
    }
    // Code to make the radio buttons functional

    if (empty($_POST['financial_aid'])) {
        array_push($error_bucket,"<p>Financial Aid is required.</p>");
    } else {
        // create financial aid
        $financial_aid = $_POST['financial_aid'];
        }
        
        //checks for radio button value
        if ($financial_aid == "yes"){
            $yes = 'checked';
            $db_value = 1;
        } 

        if ($financial_aid == "no"){
            $no = 'checked';
            $db_value = 0;
        }   

        # update financial aid
        $financial_aid = $db->real_escape_string($db_val);
        if ($financial_aid == 1) {
            $yes = 'checked';
        } if ($financial_aid == 0) {
            $no = 'checked';
        }
    
    if (empty($_POST['degree_program'])) {
        array_push($error_bucket,"<p>A Degree Program is required.</p>");
    } else {
        #$degree_program = $_POST['degree_program'];
        $degree_program = $db->real_escape_string($_POST['degree_program']);
    }
    // Degree_Program
    // Add new data fields for gpa, financial_aid and degree_program
    // Start the code for the following form sections.
    # gpa field (a number)
    #financial_aid field (radio button that has labels yes and no and values of 1 and 0 respectively)
    # degree_program field (select tag with 5 options)
    // put the new fields in to the errors statement with sql and values
    // If we have no errors than we can try and insert the data
    var_dump($financial_aid);
    // Add data for error bucket
    if (count($error_bucket) == 0) {
        // Time for some SQL
        $sql = "INSERT INTO $db_table (first_name, last_name, student_id, email, phone, gpa, financial_aid, degree_program) ";
        $sql .= "VALUES ('$first','$last',$sid,'$email','$phone','$gpa','$financial_aid','$degree_program')";
        // comment in for debug of SQL
        // echo $sql;
        $result = $db->query($sql);
        if (!$result) {
            echo '<div class="alert alert-danger" role="alert">
            I am sorry, but I could not save that record for you. ' .  
            $db->error . '.</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">
            I saved that new record for you!
            </div>';
            unset($first);
            unset($last);
            unset($sid);
            unset($email);
            unset($phone);
            unset($gpa);
            unset($financial_aid);
            unset($degree_program);
        }
    } else {
        display_error_bucket($error_bucket);
    }
}
?>