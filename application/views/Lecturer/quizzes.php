<?php include 'Parts/Header.php'; ?>
<div class="container">
    <h2>Quizzes</h2>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Quiz</th>
               
                <th>Subject</th>
                <th>Time Duration</th>
                
            </tr>
        </thead>

        <?php
        
        if ($q_details->num_rows() > 0) {
            foreach ($q_details->result() as $row) {
                ?>  
                <tr>  
                    <td><?php echo $row->id; ?></td>  
                    <td><?php echo $row->quizName; ?></td>  
                    
                    <td><?php echo $row->subject; ?></td>  
                    <td><?php echo $row->time; ?></td>  
                </tr>  
                <?php
                
            }
        } else {
            ?>  
            <tr>  
                <td colspan="5">No Quizzes in the Database</td>  
            </tr>  
    <?php
}
?>  

    </table>
    <br><br>
<?php echo validation_errors(); ?>
    <?php echo form_open('Lecturer/showAddQuiz'); ?>
    
    <div class="form-group" id="batch">
        <label for="exampleInputEmail1">Subject of the Quiz</label>
        <select class="form-control"  name="subjectCode">


            <?php
            if ($s_details->num_rows() > 0) {
                ?>
                <option selected disabled selected hidden>Select the Subject</option>
                <?php
                foreach ($s_details->result() as $row) {
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
   

    <button type="submit" class="btn btn-primary">Add new Quiz</button>
<?php echo form_close(); ?>
   
</div>
<?php include 'Parts/Footer.php'; ?>