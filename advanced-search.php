<?php // Filename: create-record.php
// allows a new record to be created. Information goes through content.inc.php to check if all fields are set.
$pageTitle = "Advanced Search";
require_once 'inc/layout/header.inc.php'; 
?>

            

<div class="container">
	<div class="row mt-5">
		<div class="col-lg-12">
			<h1>Advanced Search</h1>
            
    
        <?php require 'inc/db/mysqli_connect.inc.php'; ?>
        <?php require 'inc/app/config.inc.php'; ?>
        
            
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <label class="col-form-label" for="first">First Name </label>
        <input class="form-control" type="text" id="first" name="first" value="<?php echo (isset($first) ? $first: '');?>">
        <br>
        <label class="col-form-label" for="last">Last Name </label>
        <input class="form-control" type="text" id="last" name="last" value="<?php echo (isset($last) ? $last: '');?>">
        <br>
        <label class="col-form-label" for="id">Student ID </label>
        <input class="form-control" type="text" id="sid" name="sid" value="<?php echo (isset($sid) ? $sid: '');?>">
        <br>
        <label class="col-form-label" for="email">Email </label>
        <input class="form-control" type="text" id="email" name="email" value="<?php echo (isset($email) ? $email: '');?>">
        <br>
        <label class="col-form-label" for="phone">Phone </label>
        <input class="form-control" type="text" id="phone" name="phone" value="<?php echo (isset($phone) ? $phone: '');?>">
        <br>
    <!-- New code for form -->

    <!-- 
        Add input fields for gpa, financial aid, and degree program 
    # gpa: field for a number (3.5)
    # financial aid: radio buttons with yes or no and values of 1 or 0
    # degree program: a select tag with 5 options
    -->

        <label class="col-form-label" for="gpa">GPA</label>
        <input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo (isset($gpa) ? $gpa: ''); ?>">
        <br>
        <label for="financial-aid" class="col-form-label">Financial Aid</label>
        <br><br>

        <?php
        $yes = "";
        $no = "";
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['financial_aid'])){
                if ($_POST['financial_aid'] == 'yes') {
                    $yes = 'checked';
                }elseif ($_POST['financial_aid'] == 'no') {
                    $no = 'checked';    
            }
                
            } 
                
            }
        ?>
        
        <label for="yes">Yes:</label>
        <input type="radio" name="financial_aid" id="yes" value="yes" <?php echo $yes; ?> >

        <label for="no">No:</label>
        <input type="radio" name="financial_aid" id="no" value="no" <?php echo $no; ?> >
        <br><br>
        <!--makes degree_program sticky -->
        <?php
        if (isset($_POST['degree_program'])){
            $degree_program = $_POST['degree_program'];
        }else { 
            $degree_program = "";
        }
        ?>

        

        <label for="degree_program" class="col-form-label">Degree Program</label>
        <select name="degree_program" id="degree" class="form-control">
            <option value="select" <?=($degree_program == "select") ? ' selected': '';?> >--Select a Degree Program--</option>
            <option value="Web_Development" <?=($degree_program == "Web_Development") ? ' selected': '';?> >Web Development</option>
            <option value="Environmental_Science" <?=($degree_program == "Environmental_Science") ? ' selected': '';?> >Environmental Science</option>
            <option value="Engineering" <?=($degree_program == "Engineering") ? ' selected': '';?> >Engineering</option>
            <option value="Graphic_Design" <?=($degree_program == "Graphic_Design") ? ' selected': '';?> >Graphic Design</option>
            <option value="Computer_Science" <?=($degree_program == "Computer_Science") ? ' selected': '';?> >Computer Science</option>
        </select>
        <br><br> 

        <div class="form-group mb-1">
            <label class="col-form-label pb-2" for="graduation_date">Graduation Date</label>
            <br />
            <input type="date" name="graduation_date" id="graduation_date" value="<?php echo (isset($graduation_date) ? $graduation_date: '');?>">
        </div>
    


        <!--<?php if ($update == true): ?>
        <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
        <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
    <?php else: ?>
        <button class="btn btn-primary" type="submit" >Save Record</button>
    <?php endif ?> -->

    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
            <button class="btn btn-primary" type="submit">Search</button>
        <input type="hidden" name="id" value="<?php echo (isset($id) ? $id : '');?>"> 
    </form>

<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // creates an empty string that all of the sql is getting appended to  
    $fields = "";

    if (!empty($_POST['sid'])) {
        $sid = $_POST['sid'];
        $sidSQL = " AND " . '"' . $_POST["sid"] . '"' . " IN (student_id)";
        $fields .= $sidSQL;
    } else {
        $sidSQL = '';
    }

    if (!empty($_POST['first'])) {
        $first_nameSQL = " AND " . '"' . $_POST["first"] . '"' . " IN (first_name)";
        $fields .= $first_nameSQL;
    } else {
        $first_nameSQL = '';
    }

    if (!empty($_POST['last'])) {
        $last_nameSQL = " AND " . '"' . $_POST["last"] . '"' . " IN (last_name)";
        $fields .= $last_nameSQL;
    } else {
        $last_nameSQL = '';
    }

    if (!empty($_POST['email'])) {
        $emailSQL = " AND " . '"' . $_POST["email"] . '"' . " IN (email)";
        $fields .= $emailSQL;
    } else {
        $emailSQL = '';
    }

    if (!empty($_POST['phone'])) {
        $phoneSQL = " AND " . '"' . $_POST["phone"] . '"' . " IN (phone)";
        $fields .= $phoneSQL;
    } else {
        $phoneSQL = '';
    }

    if (!empty($_POST['gpa'])) {
        $gpaSQL = " AND " . '"' . $_POST["gpa"] . '"' . " IN (gpa)";
        $fields .= $gpaSQL;
    } else {
        $gpaSQL = '';
    }

    if (!empty($_POST['financial_aid'])) {
        $financial_aid = $_POST['financial_aid'];
        ($financial_aid == "yes" ? $financial_aid = '1' : $financial_aid = '0'); 
        $financial_aidSQL = " AND " . '"' . $financial_aid . '"' . " IN (financial_aid)";
        $fields .= $financial_aidSQL;
    } else {
        $financial_aidSQL = '';
    }
    

    if (!empty($_POST['degree_program'] and $_POST['degree_program'] != "select")) {
        $degree_programSQL = " AND " . '"' . $_POST["degree_program"] . '"' . " IN (degree_program)";
        $fields .= $degree_programSQL;
    } else {
        $degree_programSQL = '';
    }

    if (!empty($_POST['graduation_date'])) {
        $graduation_dateSQL = " AND " . '"' . $_POST["graduation_date"] . '"' . " IN (graduation_date)";
        $fields .= $graduation_dateSQL;
        
    } else {
        $graduation_date = '';
    }
    
    // removing AND from beginning of query
    $fields = substr($fields, 4);

    
    $sql = 'SELECT * FROM student_v2 WHERE ' . $fields;
    $result = $db->query($sql);

// Checks to see if the form is empty
    if(!$result) {
        echo "<p class=\"display-4 mt-4 text-center\">I can't search if you don't give<br>me something to search for.</p>";
        echo '<img class="mx-auto d-block mt-4" src="img/nosmile.png" alt="A face with no smile">';
    }  else {
        // checks how many rows are in the results.
        if ($result->num_rows == 0) {
            echo "<p class=\"display-4 mt-4 text-center\">No results found</p>";
            echo '<img class="mx-auto d-block mt-4" src="img/frown.png" alt="A sad face">';
        
            echo "<p class=\"display-4 mt-4 text-center\">Please try again.</p>";
            
        }
        // shows the amount of results found
        else {
            echo "<h2 class=\"mt-4 text-center\">$result->num_rows record(s) found</h2>";
            display_record_table($result);
        }
    }
}

?>
		</div>
    </div>
</div>

<?php require_once 'inc/layout/footer.inc.php'; ?>