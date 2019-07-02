<?php include 'Parts/Header.php'; ?>
<div class="container">
    <h2>Questions</h2>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>Answer 1</th>
                <th>Answer 2</th>
                <th>Answer 3</th>
                <th>Answer 4</th>
                <th>Answer 5</th>
                <th>Correct Answer</th>
                <th>Subject Code</th>
            </tr>
        </thead>

        <?php
        
        if ($details->num_rows() > 0) {
            foreach ($details->result() as $row) {
                ?>  
                <tr>  
                    <td><?php echo $row->no; ?></td>  
                    <td><?php echo $row->question; ?></td>  
                    <td><?php echo $row->a1; ?></td>  
                    <td><?php echo $row->a2; ?></td>  
                    <td><?php echo $row->a3; ?></td>  
                    <td><?php echo $row->a4; ?></td>  
                    <td><?php echo $row->a5; ?></td>  
                    <td><?php echo $row->correctAnswer; ?></td>  
                    <td><?php echo $row->subjectCode; ?></td>  
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
    <br><br>

    <button class="btn btn-primary" onClick="window.location.href = '<?php echo base_url();?>index.php/Lecturer/showAddQuestion'">Add new Question</button>
</div>
<?php include 'Parts/Footer.php'; ?>