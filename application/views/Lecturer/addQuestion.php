<?php include 'Parts/Header.php'; ?>
<div class="container">
    <h2>Add a Question</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('Lecturer/addQuestion'); ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Question</label>
        <textarea rows="4" class="form-control" placeholder="Type the Question" name="question"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Answer 1</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Type Answer 1" name="a1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Answer 2</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Type Answer 2" name="a2">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Answer 3</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Type Answer 3" name="a3">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Answer 4</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Type Answer 4" name="a4">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Answer 5</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Type Answer 5" name="a5">
    </div>
    <div class="form-group" id="faculty">
        <label for="exampleInputEmail1">Correct Answer</label>
        <select class="form-control"  name="correctAnswer">
            <option selected disabled selected hidden>Select the correct answer</option>
            <option value="1">Answer 1</option>
            <option value="2">Answer 2</option>
            <option value="3">Answer 3</option>
            <option value="4">Answer 4</option>
            <option value="5">Answer 5</option>
        </select>
    </div>
    <div class="form-group" id="batch">
        <label for="exampleInputEmail1">Subject</label>
        <select class="form-control"  name="subjectCode">


            <?php
            if ($details->num_rows() > 0) {
                ?>
                <option selected disabled selected hidden>Select the Subject</option>
                <?php
                foreach ($details->result() as $row) {
                    ?>      
                <option value="<?php echo $row->code ?>"><?php echo $row->code."   -  ".$row->subjectName; ?></option>
                    <?php
                }
            } else {
                ?>  
                <option selected disabled selected hidden>No subjects in the database</option> 
                <?php
            }
            ?>  





        </select>
    </div>


    <button type="submit" class="btn btn-primary">Add</button>
<?php echo form_close(); ?>
</div>
    <?php include 'Parts/Footer.php'; ?>