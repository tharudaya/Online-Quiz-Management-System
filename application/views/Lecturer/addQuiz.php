<?php include 'Parts/Header.php'; ?>
<div class="container">
    <h2>Add a Quiz</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('Lecturer/addQuiz'); ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Quiz Name</label>
        <input type="text" class="form-control" placeholder="Type the Quiz Name" name="quizName">
    </div>

    <input type="hidden"  class="form-control"  name="subjectCode" value="<?php echo $subject ?>">

    <div class="form-group">
        <label for="exampleInputEmail1">Time Duration(in minutes)</label>
        <input type="number" class="form-control" aria-describedby="emailHelp" name="time">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Select Questions</label>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Check</th>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer 1</th>
                    <th>Answer 2</th>
                    <th>Answer 3</th>
                    <th>Answer 4</th>
                    <th>Answer 5</th>
                    <th>Correct Answer</th>
                    
                </tr>
            </thead>

            <?php
            if ($details->num_rows() > 0) {
                foreach ($details->result() as $row) {
                    ?>  
                    <tr>  
                        <td><input type="checkbox" id="coding" name="q[]" value="<?php echo $row->no; ?>"></td>  
                        <td><?php echo $row->no; ?></td>  
                        <td><?php echo $row->question; ?></td>  
                        <td><?php echo $row->a1; ?></td>  
                        <td><?php echo $row->a2; ?></td>  
                        <td><?php echo $row->a3; ?></td>  
                        <td><?php echo $row->a4; ?></td>  
                        <td><?php echo $row->a5; ?></td>  
                        <td><?php echo $row->correctAnswer; ?></td>  
                        
                    </tr>  
                    <?php
                }
            } else {
                ?>  
                <tr>  
                    <td colspan="9">No Questions in the Database</td>  
                </tr>  
    <?php
}
?>  

        </table>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
<?php echo form_close(); ?>
</div>
    <?php include 'Parts/Footer.php'; ?>