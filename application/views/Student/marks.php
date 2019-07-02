<?php include 'Parts/Header.php'; ?>
<div class="container">
    <h2>Marks</h2>
    <table class="table">
        <thead class="thead-light">
            <tr>
                
                <th>Quiz Id</th>
               <th>Quiz</th>
                <th>Marks</th>
                
                
            </tr>
        </thead>

        <?php
        
        if (($details->num_rows()) > 0) {
            foreach ($details->result() as $row) {
                ?>  
                <tr>  
                    <td><?php echo $row->id; ?></td>  
                    <td><?php echo $row->quizName; ?></td>  
                    <td><?php echo $row->marks; ?></td> 
                    
                </tr>  
                <?php
                
            }
        } else {
            ?>  
            <tr>  
                <td colspan="5">No Quiz Results for You</td>  
            </tr>  
    <?php
}
?>  

    </table>
    <br><br>

</div>
<?php include 'Parts/Footer.php'; ?>