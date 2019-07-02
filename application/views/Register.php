<?php include 'Parts/Header.php'; ?>

<div class="container">
    <?php
    if ($this->session->flashdata('msg')) {
        echo "<h3>" . $this->session->flashdata('msg') . "</h3>";
        echo '<hr>';
    }
    ?>

    <h2>Register</h2>
    <hr>

    <?php echo validation_errors(); ?>
    <?php echo form_open('Register/registerUser'); ?>
    <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="First Name" name="fname">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Last Name" name="lname">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Role</label>
        <select class="form-control" id="role" name="role" onchange="populate(this.id)">
            <option selected disabled selected hidden>Select Your Role</option>
            <option>Lecturer</option>
            <option>Student</option>
        </select>
    </div>
    <div class="form-group" style="display:none" id="batch">
        <label for="exampleInputEmail1">Batch</label>
        <select class="form-control"  name="batch">
            <option selected disabled selected hidden>Select Your Batch</option>
            <option>2014/CST</option>
            <option>2014/IIT</option>
            <option>2015/CST</option>
            <option>2015/IIT</option>
            <option>2016/CST</option>
            <option>2016/IIT</option>
            <option>2017/CST</option>
            <option>2017/IIT</option>
        </select>
    </div>
    <div class="form-group" style="display:none" id="faculty">
        <label for="exampleInputEmail1">Faculty</label>
        <select class="form-control"  name="faculty">
            <option selected disabled selected hidden>Select Your Faculty</option>
            <option>AGR</option>
            <option>MGT</option>
            <option>SCT</option>
            <option>TEC</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control"  placeholder="Password" name="password">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" placeholder="Type Password Again" name="cpassword">
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
    <?php echo form_close(); ?>
</div>
<script>
    function populate(s1) {
        var s1 = document.getElementById(s1);
        var batch = document.getElementById('batch');
        var faculty = document.getElementById('faculty');
      var fname = document.getElementById('fname');
        if (s1.value == "Lecturer") {
            
            faculty.style.display = "block";
            batch.style.display = "none";
        } else if (s1.value == "Student") {
            batch.style.display = "block";
            faculty.style.display = "none";
            
        }

    }
</script>
<?php include 'Parts/Footer.php'; ?>