<?php include 'Parts/Header.php'; ?>
<div class="container">
    <?php
    if ($this->session->flashdata('msg')) {
        echo "<h3>" . $this->session->flashdata('msg') . "</h3>";
        echo '<hr>';
    }
    ?>
    <h1>My Profile</h1>
    <hr>
    <?php 
    $row = $details->row(0);
    $fname = $row->firstName;
    $lname = $row->lastName;
    $batch = $row->batch;
    $email = $row->email;
    
    ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('Student/saveProfile'); ?>
    <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">
    </div>
    <div class="form-group"  id="batch">
        <label for="exampleInputEmail1">Batch</label>
        <select class="form-control"  name="batch">
            <option selected disabled selected hidden>Select Your Batch</option>
            <option <?php if($batch=="2014/CST"){echo "selected=\"true\""; } ?>>2014/CST</option>
            <option <?php if($batch=="2014/IIT"){echo "selected=\"true\""; } ?>>2014/IIT</option>
            <option <?php if($batch=="2015/CST"){echo "selected=\"true\""; } ?>>2015/CST</option>
            <option <?php if($batch=="2015/IIT"){echo "selected=\"true\""; } ?>>2015/IIT</option>
            <option <?php if($batch=="2016/CST"){echo "selected=\"true\""; } ?>>2016/CST</option>
            <option <?php if($batch=="2016/IIT"){echo "selected=\"true\""; } ?>>2016/IIT</option>
            <option <?php if($batch=="2017/CST"){echo "selected=\"true\""; } ?>>2017/CST</option>
            <option <?php if($batch=="2017/IIT"){echo "selected=\"true\""; } ?>>2017/IIT</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" disabled="TRUE" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
        <small id="emailHelp" class="form-text text-muted">You can't change your email</small>
    </div>

    <button type="submit" class="btn btn-primary">Save Changes</button>
    <button type="reset" class="btn btn-danger">Reset</button>
    <br><br>
   
    <?php echo form_close(); ?>
</div>
<?php include 'Parts/Footer.php'; ?>
