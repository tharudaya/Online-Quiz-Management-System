<?php include 'Parts/Header.php'; ?>
<div class="container">
    <h2>Subjects</h2>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Subject Name</th>
                <th>Batch</th>
            </tr>
        </thead>

        <?php
        $i = 1;
        if ($details->num_rows() > 0) {
            foreach ($details->result() as $row) {
                ?>  
                <tr>  
                    <td><?php echo $i ?></td>  
                    <td><?php echo $row->code; ?></td>  
                    <td><?php echo $row->subjectName; ?></td>  
                    <td><?php echo $row->batch; ?></td>  
                </tr>  
                <?php
                $i++;
            }
        } else {
            ?>  
            <tr>  
                <td colspan="4">No Subjects in the Database</td>  
            </tr>  
    <?php
}
?>  

    </table>
    <br><br>

    <button class="btn btn-primary" onClick="window.location.href = '<?php echo base_url();?>index.php/Lecturer/showAddSubject'">Add new Subject</button>
</div>
<?php include 'Parts/Footer.php'; ?>