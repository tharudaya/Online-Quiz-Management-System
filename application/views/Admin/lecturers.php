<?php include 'Parts/Header.php'; ?>
<div class="container">
    <h2>Lecturers</h2>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Faculty</th>
                <th>Control</th>
            </tr>
        </thead>

        <?php
        $i = 1;
        if ($details->num_rows() > 0) {
            foreach ($details->result() as $row) {
                ?>  
                <tr>  
                    <td><?php echo $i ?></td>  
                    <td><?php echo $row->email; ?></td>  
                    <td><?php echo $row->firstName; ?></td>  
                    <td><?php echo $row->lastName; ?></td>  
                    <td><?php echo $row->faculty; ?></td>  
                    <td><?php if ($row->activated == 0) {
                            echo form_open('Admin/activateL');?>
                                <button type="submit" class="btn btn-primary">Activate</button>
                                <input type="hidden" value="<?php echo $row->email; ?>" name="email">
                            <?php
                            echo form_close();
                        } else {

                            echo form_open('Admin/deactivateL');
                            ?>
                            <button type="submit" class="btn btn-danger">Deactivate</button>
                            <input type="hidden" value="<?php echo $row->email; ?>" name="email">
                            <?php
                            echo form_close();
                        }
                ?></td>   
                </tr>  
                <?php
                $i++;
            }
        } else {
            ?>  
            <tr>  
                <td colspan="6">No Lecturers in the Database</td>  
            </tr>  
            <?php
        }
        ?>  

    </table>
</div>
<?php include 'Parts/Footer.php'; ?>