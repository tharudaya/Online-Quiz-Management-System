<?php include 'Parts/Header.php'; ?>
<div class="container">
    <h2>Quizzes</h2>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Quiz</th>
               <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Time Duration</th>
                <th>Action</th>
                
            </tr>
        </thead>

        <?php
        
        if ($q_details->num_rows() > 0) {
            foreach ($q_details->result() as $row) {
                ?>  
                <tr>  
                    <td><?php echo $row->id; ?></td>  
                    <td><?php echo $row->quizName; ?></td>  
                    <td><?php echo $row->code; ?></td> 
                    <td><?php echo $row->subjectName; ?></td>  
                    <td><?php echo $row->time; ?></td> 
                    <td><?php
                            echo form_open('Student/attempt');?>
                                <button type="submit" class="btn btn-primary">Attempt</button>
                                <input type="hidden" value="<?php echo $row->id; ?>" name="quiz_id">
                            <?php
                            echo form_close();
                        
                ?></td>
                </tr>  
                <?php
                
            }
        } else {
            ?>  
            <tr>  
                <td colspan="5">No Quizzes for You</td>  
            </tr>  
    <?php
}
?>  

    </table>
    <br><br>

</div>
<?php include 'Parts/Footer.php'; ?>