<?php include 'Parts/Header.php'; ?>
<div class="container">
    <h2>Add a Subject</h2>
     <?php echo validation_errors(); ?>
    <?php echo form_open('Lecturer/addSubject'); ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Subject Code</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Type Subject Code" name="code">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Subject Name</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Type Subject Name" name="subjectName">
    </div>
    <div class="form-group" id="batch">
        <label for="exampleInputEmail1">Batch</label>
        <select class="form-control"  name="batch">
            <option selected disabled selected hidden>Select the Batch</option>
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
    

    <button type="submit" class="btn btn-primary">Add</button>
    <?php echo form_close(); ?>
</div>
<?php include 'Parts/Footer.php'; ?>