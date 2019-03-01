<?php // Filename: form.inc.php ?>

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first" value="<?php echo (isset($first) ? $first: '');?>">
    <br>
    <label class="col-form-label" for="last">Last Name </label>
    <input class="form-control" type="text" id="last" name="last" value="<?php echo (isset($last) ? $last: '');?>"">
    <br>
    <label class="col-form-label" for="id">Student ID </label>
    <input class="form-control" type="text" id="id" name="id" value="<?php echo (isset($id) ? $id: '');?>"">
    <br>
    <label class="col-form-label" for="email">Email </label>
    <input class="form-control" type="text" id="email" name="email" value="<?php echo (isset($email) ? $email: '');?>"">
    <br>
    <label class="col-form-label" for="phone">Phone </label>
    <input class="form-control" type="text" id="phone" name="phone" value="<?php echo (isset($phone) ? $phone: '');?>"">
    <br>
    <!-- New code for form -->
    <label class="col-form-label" for="gpa">GPA </label>
    <input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo (isset($gpa) ? $gpa: ''); ?>"">
    <br>
    <label for="financial-aid" class="col-form-label">Financial Aid</label>
    <br><br>

    <!-- <?php
    $yes = "";
    $no = "";
    if ($_POST['financial_aid'] == 'yes'){
        $yes = "checked";
    }
    if ($_POST['financial_aid'] == 'no'){
        $no = "checked";
    }    
    ?>  -->
    <input type="radio" name="financial_aid" id="yes" value="yes" <?php echo $yes ?> > Yes
    <input type="radio" name="financial_aid" id="no" value="no" <?php echo $no ?> > No
    <br><br>

    <?php
    if (isset($_POST['degree_program'])){
    $degree_program = $_POST['degree_program'];
    } else {
    // looks like the form wasn't being posted
    $degree_program = "";
    }
    ?>

    <label for="degree_program" class="col-form-label">Degree Program</label>
    <select name="degree_program" id="degree" class="form-control" value="<?php echo (isset($degree_program) ? $degree_program: ''); ?>">
        <option value="select"<?php if($degree_program == "select") echo ' selected="selected"';?> >--Select--</option>
        <option value="Web Development" <?php if($degree_program == "Web Development") echo ' selected="selected"';?>>Web Development</option>
        <option value="Environmental Science" <?php if($degree_program == "Environmental Science") echo ' selected="selected"';?>>Environmental Science</option>
        <option value="Engineering" <?php if($degree_program == "Engineering") echo ' selected="selected"';?>>Engineering</option>
        <option value="Graphic Design" <?php if($degree_program == "Graphic Design") echo ' selected="selected"';?>>Graphic Design</option>
        <option value="Computer Science" <?php if($degree_program == "Computer Science") echo ' selected="selected"';?>>Computer Science</option>
    </select>
    <br><br> 


    <!-- 
        Add input fields for gpa, financial aid, and degree program 
    # gpa: field for a number (3.5)
    # financial aid: radio buttons with yes or no and values of 1 or 0
    # degree program: a select tag with 5 options
    -->

    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
    <button class="btn btn-primary" type="submit">Save Record</button>
</form>