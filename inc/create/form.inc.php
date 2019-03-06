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

    <!-- 
        Add input fields for gpa, financial aid, and degree program 
    # gpa: field for a number (3.5)
    # financial aid: radio buttons with yes or no and values of 1 or 0
    # degree program: a select tag with 5 options
    -->

    <label class="col-form-label" for="gpa">GPA </label>
    <input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo (isset($gpa) ? $gpa: ''); ?>">
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

    <!--makes degree_program sticky -->
    <?php
    if (isset($_POST['degree_program'])){
    $degree_program = $_POST['degree_program'];
    } else {
        $degree_program = "";
    }
    ?>
   
    <label for="degree_program" class="col-form-label">Degree Program</label>
    <select name="degree_program" id="degree" class="form-control">
        <option value="select" <?php if($degree_program == "select") echo ' selected=""';?> >--Select a Degree Program--</option>
        <option value="Web_Development" <?php if($degree_program == "Web_Development") echo ' selected="Web_Development"';?> >Web Development</option>
        <option value="Environmental_Science" <?php if($degree_program == "Environmental_Science") echo ' selected="Environmental_Science"';?> >Environmental Science</option>
        <option value="Engineering" <?php if($degree_program == "Engineering") echo ' selected="Engineering"';?> >Engineering</option>
        <option value="Graphic_Design" <?php if($degree_program == "Graphic_Design") echo ' selected="Graphic_Design"';?> >Graphic Design</option>
        <option value="Computer_Science" <?php if($degree_program == "Computer_Science") echo ' selected="Computer_Science"';?> >Computer Science</option>
    </select>
    <br><br> 
    
    <br><br> 


    <?php if ($update == true): ?>
    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn btn-primary" type="submit" >Save Record</button>
<?php endif ?>

   <!-- <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
    <button class="btn btn-primary" type="submit">Save Record</button> -->
</form>